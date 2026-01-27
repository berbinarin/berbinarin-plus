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

    Route::get('berbinar-plus/success', [RegisteredUserController::class, 'success'])->name('berbinar-plus.success');

    // Tambah kelas baru untuk user yang sudah terdaftar
    Route::middleware('auth:berbinar')->group(function () {
        Route::get('berbinar-plus/daftar-kelas', [RegisteredUserController::class, 'registerClass'])->name('berbinar-plus.register-class');
        Route::post('berbinar-plus/enroll-class', [RegisteredUserController::class, 'enrollClassStore'])->name('berbinar-plus.enroll-class.store');
    });
    // });

    // Logout admin
    Route::middleware('auth:web')->group(function () {
        Route::post('logout-admin', [AuthenticatedController::class, 'logoutAdmin'])
            ->name('logout-admin');
    });
    // Logout user biasa
    Route::middleware('auth:berbinar')->group(function () {
        Route::post('logout', [AuthenticatedController::class, 'logoutUser'])
            ->name('logout');
    });
});
