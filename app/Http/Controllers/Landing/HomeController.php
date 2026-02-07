<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Berbinarp_User;
use App\Services\Landing\HomePageService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function homepage()
    {
        $userId = Auth::guard('berbinar')->id();
        $service = new HomePageService();

        $enrolledClasses = $service->getEnrolledClassesWithProgress($userId);
        $totalCompleted = $enrolledClasses->sum('completed_sections');
        $totalSections = $enrolledClasses->sum('total_sections');
        $overallProgress = $totalSections > 0 ? round(($totalCompleted / $totalSections) * 100) : 0;

        $recommendations = $service->getRecommendations($userId);

        return view('landing.homepage.index', compact(
            'enrolledClasses',
            'overallProgress',
            'recommendations'
        ));
    }

    // ...existing code...

    public function profile()
    {
        $user = Berbinarp_User::with(['enrollments.course'])->find(Auth::guard('berbinar')->id());
        return view('landing.profile.index', compact('user'));
    }
}
