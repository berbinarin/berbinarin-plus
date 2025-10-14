<?php

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::middleware('role:berbinarplus')->group(function () {
        Route::get('/berbinar-class', [DashboardController::class, 'berbinarclass'])->name('berbinarclass');
    });

    Route::middleware('role:berbinaradmin')->group(function () {
        Route::get('/berbinar-admin', [DashboardController::class, 'admin'])->name('admin');
    });
});
