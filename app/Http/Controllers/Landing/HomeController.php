<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Berbinarp_Class;
use App\Models\EnrollmentUser;
use App\Models\User_Progres;
use App\Models\Berbinarp_User;
use App\Models\Certificates;
use App\Models\Course;
use App\Models\Test;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function homepage()
    {
        $userId = Auth::guard('berbinar')->id();

        // Enrolled classes dan progress
        $enrolledClasses = $this->getEnrolledClassesWithProgress($userId);

        // Kalkulasi progress keseluruhan untuk banner 
        $totalCompleted = $enrolledClasses->sum('completed_sections');
        $totalSections = $enrolledClasses->sum('total_sections');
        $overallProgress = $totalSections > 0 ? round(($totalCompleted / $totalSections) * 100) : 0;

        // Dapatkan rekomendasi kelas baru
        $enrolledCourseIds = EnrollmentUser::where('user_id', $userId)
            ->whereIn('status_kelas', ['enrolled', 'completed', 'expired'])
            ->pluck('course_id');

        $recommendations = Berbinarp_Class::with('sections')
            ->whereNotIn('id', $enrolledCourseIds)
            ->limit(10)
            ->get();

        // Notifikasi
        [
            'certificateNotification' => $certificateNotification,
            'materiCompleteNotification' => $materiCompleteNotification,
            'progress50Notification' => $progress50Notification,
            'enrollmentStatusNotification' => $enrollmentStatusNotification,
        ] = $this->getHomepageNotifications($userId, $enrolledClasses);

        return view('landing.homepage.index', compact(
            'enrolledClasses',
            'overallProgress',
            'recommendations',
            'certificateNotification',
            'materiCompleteNotification',
            'progress50Notification',
            'enrollmentStatusNotification'
        ));
    }

    public function getEnrolledClassesWithProgress($userId)
    {
        return EnrollmentUser::with(['course.sections'])
            ->where('user_id', $userId)
            ->whereIn('status_kelas', ['enrolled', 'completed', 'expired'])
            ->get()
            ->map(function ($enrollment) use ($userId) {
                $course = $enrollment->course;
                $totalSections = $course->sections->count();

                $preTest = Test::where('course_id', $course->id)->where('type', 'pre_test')->first();
                $postTest = Test::where('course_id', $course->id)->where('type', 'post_test')->first();

                $totalProgressItems = $totalSections;
                if ($preTest) $totalProgressItems++;
                if ($postTest) $totalProgressItems++;

                $completedSections = User_Progres::where('user_id', $userId)
                    ->whereIn('course_section_id', $course->sections->pluck('id'))
                    ->where('status_materi', 'completed')
                    ->count();

                $completedPreTest = $preTest ? (User_Progres::where('user_id', $userId)
                    ->where('test_id', $preTest->id)
                    ->where('status_materi', 'completed')
                    ->exists() ? 1 : 0) : 0;

                $completedPostTest = $postTest ? (User_Progres::where('user_id', $userId)
                    ->where('test_id', $postTest->id)
                    ->where('status_materi', 'completed')
                    ->exists() ? 1 : 0) : 0;

                $completedTotal = $completedSections + $completedPreTest + $completedPostTest;

                $progressPercentage = $totalProgressItems > 0
                    ? round(($completedTotal / $totalProgressItems) * 100)
                    : 0;

                $status = ($completedSections == $totalSections && $completedPreTest == 1 && $completedPostTest == 1 && $totalProgressItems > 0)
                    ? 'Success' : 'Ongoing';

                $certificate = null;
                $hasCertificate = false;
                if ($status === 'Success') {
                    $certificate = Certificates::where('course_id', $course->id)
                        ->where('user_id', $userId)
                        ->first();
                    $hasCertificate = $certificate && $certificate->certificate_file && file_exists(public_path('storage/' . $certificate->certificate_file));
                }

                return [
                    'course' => $course,
                    'progress_percentage' => $progressPercentage,
                    'completed_sections' => $completedTotal,
                    'total_sections' => $totalProgressItems,
                    'status' => $status,
                    'has_certificate' => $hasCertificate,
                    'certificate' => $certificate,
                ];
            });
    }

    public function getHomepageNotifications($userId, $enrolledClasses)
    {
        $certificateNotification = null;
        $materiCompleteNotification = null;
        $progress50Notification = null;
        $enrollmentStatusNotification = null;

        $recentEnrolled = EnrollmentUser::with('course')
            ->where('user_id', $userId)
            ->where('status_kelas', 'enrolled')
            ->orderByDesc('updated_at')
            ->first();
        if ($recentEnrolled && $recentEnrolled->updated_at && $recentEnrolled->updated_at->gt(now()->subDays(3))) {
            $enrollmentStatusNotification = [
                'course_name' => $recentEnrolled->course ? $recentEnrolled->course->name : '-',
                'class_id' => $recentEnrolled->course_id,
                'updated_at' => $recentEnrolled->updated_at,
            ];
        }
        foreach ($enrolledClasses as $enrolled) {
            if ($enrolled['status'] === 'Success' && $enrolled['has_certificate']) {
                $certificate = Certificates::where('course_id', $enrolled['course']->id)
                    ->where('user_id', $userId)
                    ->orderByDesc('updated_at')
                    ->first();
                if ($certificate) {
                    $certificateNotification = [
                        'course_name' => $enrolled['course']->name,
                        'certificate_id' => $certificate->id,
                        'class_id' => $enrolled['course']->id,
                        'updated_at' => $certificate->updated_at,
                    ];
                    break;
                }
            }
            $totalSections = $enrolled['course']->sections->count();
            $preTest = Test::where('course_id', $enrolled['course']->id)->where('type', 'pre_test')->first();
            $postTest = Test::where('course_id', $enrolled['course']->id)->where('type', 'post_test')->first();
            $completedSectionsQuery = User_Progres::where('user_id', $userId)
                ->whereIn('course_section_id', $enrolled['course']->sections->pluck('id'))
                ->where('status_materi', 'completed');
            $completedSections = $completedSectionsQuery->count();
            $lastMateriCompleted = $completedSectionsQuery->orderByDesc('completed_at')->first();
            if (!$progress50Notification && $enrolled['progress_percentage'] >= 50 && $enrolled['progress_percentage'] < 100) {
                $progress50Notification = [
                    'course_name' => $enrolled['course']->name,
                    'class_id' => $enrolled['course']->id,
                    'progress_percentage' => $enrolled['progress_percentage'],
                    'completed_at' => $lastMateriCompleted ? $lastMateriCompleted->completed_at : null,
                ];
            }
            $completedPreTest = $preTest ? (User_Progres::where('user_id', $userId)->where('test_id', $preTest->id)->where('status_materi', 'completed')->exists() ? 1 : 0) : 0;
            $completedPostTest = $postTest ? (User_Progres::where('user_id', $userId)->where('test_id', $postTest->id)->where('status_materi', 'completed')->exists() ? 1 : 0) : 0;
            if ($totalSections > 0 && $completedSections == $totalSections && ($completedPreTest == 0 || $completedPostTest == 0)) {
                $materiCompleteNotification = [
                    'course_name' => $enrolled['course']->name,
                    'class_id' => $enrolled['course']->id,
                    'completed_at' => $lastMateriCompleted ? $lastMateriCompleted->completed_at : null,
                ];
            }
        }

        return compact(
            'certificateNotification',
            'materiCompleteNotification',
            'progress50Notification',
            'enrollmentStatusNotification'
        );
    }

    public function profile()
    {
        $user = Berbinarp_User::with(['enrollments.course'])->find(Auth::guard('berbinar')->id());
        return view('landing.profile.index', compact('user'));
    }
}
