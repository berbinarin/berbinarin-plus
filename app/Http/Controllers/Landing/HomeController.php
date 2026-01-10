<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berbinarp_Class;
use App\Models\EnrollmentUser;
use App\Models\User_Progres;
use App\Models\Berbinarp_User;
use App\Models\Course_Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function homepage()
    {
        $userId = Auth::guard('berbinar')->id();

        // Get enrolled classes with progress (only active classes: enrolled, completed, expired)
        $enrolledClasses = EnrollmentUser::with(['course.sections'])
            ->where('user_id', $userId)
            ->whereIn('status_kelas', ['enrolled', 'completed', 'expired'])
            ->get()
            ->map(function ($enrollment) use ($userId) {
                $course = $enrollment->course;
                $totalSections = $course->sections->count();

                // Calculate progress
                $completedSections = User_Progres::where('user_id', $userId)
                    ->whereIn('course_section_id', $course->sections->pluck('id'))
                    ->where('status_materi', 'completed')
                    ->count();

                $progressPercentage = $totalSections > 0
                    ? round(($completedSections / $totalSections) * 100)
                    : 0;

                // Determine status
                $status = $progressPercentage >= 100 ? 'Success' : 'Ongoing';

                return [
                    'course' => $course,
                    'progress_percentage' => $progressPercentage,
                    'completed_sections' => $completedSections,
                    'total_sections' => $totalSections,
                    'status' => $status,
                ];
            });

        // Calculate overall progress for banner
        $overallProgress = $enrolledClasses->avg('progress_percentage') ?? 0;
        $overallProgress = round($overallProgress);

        // Get class recommendations (exclude only active enrolled classes, pending_payment still shows)
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
