<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Berbinarp_Class;
use App\Observers\Course_Observer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Services\Landing\HomePageService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Berbinarp_Class::observe(Course_Observer::class);

        View::composer('landing.partials.homepage-navbar', function ($view) {
            $userId = Auth::guard('berbinar')->id();
            $service = new HomePageService();
            $enrolledClasses = $userId ? $service->getEnrolledClassesWithProgress($userId) : collect();
            $notifications = $userId ? $service->getHomepageNotifications($userId, $enrolledClasses) : [
                'certificateNotification' => null,
                'materiCompleteNotification' => null,
                'progress50Notification' => null,
                'enrollmentStatusNotification' => null,
            ];
            $view->with($notifications);
        });
    }
}
