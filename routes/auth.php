<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\TestingController;
use App\Http\Controllers\Auth\AuthenticatedController;
use Illuminate\Auth\Middleware\Authenticate;

Route::name('auth.')->group(function () {
    // Route::middleware('guest')->group(function () {
    // Login admin
    Route::get('login', [AuthenticatedController::class, 'login'])->name('login');
    Route::post('authenticated', [AuthenticatedController::class, 'authenticated'])->name('authenticated');

    // Login user biasa
    Route::get('berbinar-plus/login', [AuthenticatedController::class, 'berbinarPlusLogin'])->name('berbinar-plus.login');
    Route::post('berbinar-plus/user-login', [AuthenticatedController::class, 'authenticateUser'])->name('berbinar-plus.user-login');

    Route::get('berbinar-plus/daftar', [RegisteredUserController::class, 'berbinarPlusRegister'])->name('berbinar-plus.regis');
    Route::post('berbinar-plus/store', [RegisteredUserController::class, 'store'])->name('berbinar-plus.store');
    // });

    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthenticatedController::class, 'destroy'])
            ->name('logout');
    });
});
