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
        $userId = Auth::id();

        // Get enrolled classes with progress
        $enrolledClasses = EnrollmentUser::with(['course.sections'])
            ->where('user_id', $userId)
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

        // Get class recommendations (classes not enrolled by user)
        $enrolledCourseIds = $enrolledClasses->pluck('course.id');
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
        $user = Berbinarp_User::with(['enrollments.course'])->find(Auth::id());
        return view('landing.profile.index', compact('user'));
    }
}
