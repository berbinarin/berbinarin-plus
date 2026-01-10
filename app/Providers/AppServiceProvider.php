<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Berbinarp_Class;
use App\Observers\Course_Observer;

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
    }
}
