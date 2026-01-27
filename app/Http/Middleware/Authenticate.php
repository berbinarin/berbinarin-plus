<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Guard yang sedang digunakan.
     */
    protected $usedGuard = null;

    /**
     * Override handle untuk menyimpan guard yang dipakai.
     */
    public function handle($request, \Closure $next, ...$guards)
    {
        $this->usedGuard = $guards[0] ?? null;
        return parent::handle($request, $next, ...$guards);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }
        $guard = $this->usedGuard ?? config('auth.defaults.guard');
        if ($guard === 'berbinar') {
            return route('auth.berbinar-plus.login');
        }
        return route('auth.login');
    }
}
