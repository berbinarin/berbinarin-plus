<?php

use App\Http\Controllers\Dashboard\BerbinarPlus\ClassController;
use App\Http\Controllers\Dashboard\BerbinarpAdmin\PendaftarController;
use App\Http\Controllers\Dashboard\BerbinarPlus\RegistranController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::middleware('role:berbinarplus')->group(function () {

        // Class
        Route::resource('kelas', ClassController::class);

        // Pendaftar

        Route::resource('pendaftar', RegistranController::class);
        Route::patch('status/{id}', [RegistranController::class, 'updateStatus'])->name('updateStatus');
    });

    Route::middleware('role:berbinaradmin')->group(function () {
        Route::get('/berbinar-admin', [DashboardController::class, 'admin'])->name('admin');
    });
});
