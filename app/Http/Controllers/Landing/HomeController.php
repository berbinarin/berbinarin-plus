<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Berbinarp_Class;
use App\Models\EnrollmentUser;
use App\Models\User_Progres;
use App\Models\Berbinarp_User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function homepage()
    {
        $userId = Auth::guard('berbinar')->id();

        # Enrolled classed dan progress
        $enrolledClasses = EnrollmentUser::with(['course.sections'])
            ->where('user_id', $userId)
            ->whereIn('status_kelas', ['enrolled', 'completed', 'expired'])
            ->get()
            ->map(function ($enrollment) use ($userId) {
                $course = $enrollment->course;
                $totalSections = $course->sections->count();

                // Kalkulasi progress
                $completedSections = User_Progres::where('user_id', $userId)
                    ->whereIn('course_section_id', $course->sections->pluck('id'))
                    ->where('status_materi', 'completed')
                    ->count();

                $progressPercentage = $totalSections > 0
                    ? round(($completedSections / $totalSections) * 100)
                    : 0;

                // Tentukan status
                $status = $progressPercentage >= 100 ? 'Success' : 'Ongoing';

                return [
                    'course' => $course,
                    'progress_percentage' => $progressPercentage,
                    'completed_sections' => $completedSections,
                    'total_sections' => $totalSections,
                    'status' => $status,
                ];
            });

        // Kalkulasi progress keseluruhan untuk banner
        $overallProgress = $enrolledClasses->avg('progress_percentage') ?? 0;
        $overallProgress = round($overallProgress);

        // Dapatkan rekomendasi kelas baru
        $enrolledCourseIds = EnrollmentUser::where('user_id', $userId)
            ->whereIn('status_kelas', ['enrolled', 'completed', 'expired'])
            ->pluck('course_id');

        $recommendations = Berbinarp_Class::with('sections')
            ->whereNotIn('id', $enrolledCourseIds)
            ->limit(10)
            ->get();

        return view('landing.homepage.index', compact(
            'enrolledClasses',
            'overallProgress',
            'recommendations'
        ));
    }

    public function profile()
    {
        $user = Berbinarp_User::with(['enrollments.course'])->find(Auth::guard('berbinar')->id());
        return view('landing.profile.index', compact('user'));
    }
}
