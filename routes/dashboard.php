<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\BerbinarPlusClassController;
use App\Http\Controllers\Dashboard\BerbinarPlusUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::middleware('role:berbinarplus')->group(function () {
        // Route::resource('/berbinar-class', BerbinarPlusClassController::class);
        Route::get('/berbinar-class', [BerbinarPlusClassController::class, 'index'])->name('berbinar-class.index');
        Route::get('/berbinar-class/create', [BerbinarPlusClassController::class, 'create'])->name('berbinar-class.create');
        Route::get('/berbinar-class/show', [BerbinarPlusClassController::class, 'show'])->name('berbinar-class.show');
        Route::get('/berbinar-class/edit', [BerbinarPlusClassController::class, 'edit'])->name('berbinar-class.edit');
        Route::delete('/berbinar-class', [BerbinarPlusClassController::class, 'destroy'])->name('berbinar-class.destroy');


        // Route::resource('/berbinar-user', BerbinarPlusUserController::class);
        Route::get('/berbinar-user', [BerbinarPlusUserController::class, 'index'])->name('berbinar-user.index');
        Route::get('/berbinar-user/create', [BerbinarPlusUserController::class, 'create'])->name('berbinar-user.create');
        Route::get('/berbinar-user/show', [BerbinarPlusUserController::class, 'show'])->name('berbinar-user.show');
        Route::get('/berbinar-user/edit', [BerbinarPlusUserController::class, 'edit'])->name('berbinar-user.edit');
        Route::delete('/berbinar-user', [BerbinarPlusUserController::class, 'destroy'])->name('berbinar-user.destroy');
    });

    Route::middleware('role:berbinaradmin')->group(function () {
        Route::get('/berbinar-admin', [DashboardController::class, 'admin'])->name('admin');
    });
});
