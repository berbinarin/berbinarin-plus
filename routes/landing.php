<?php

use App\Http\Controllers\Landing\CertificateController;
use App\Http\Controllers\Landing\HomeController;
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Landing\MaterialsController;
use App\Http\Controllers\Landing\PretestController;
use App\Http\Controllers\Landing\PreviewController;
use App\Http\Controllers\Landing\PosttestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\TestingController;


Route::name('landing.')->group(function () {
    // Landing route
    Route::get('/', [LandingController::class, 'landing'])->name('index');

    Route::middleware(['auth:berbinar'])->group(function () {
        // Home routes
        Route::prefix('home')->name('home.')->group(function () {
            Route::get('/', [HomeController::class, 'homepage'])->name('index');
            Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
            Route::get('/preview/{class_id}', [PreviewController::class, 'preview'])->name('preview');
            Route::get('/materials', [MaterialsController::class, 'materials'])->name('materials');
            Route::get('/certificates', [CertificateController::class, 'certificates'])->name('certificates');
            Route::post('/certificates/update-rating', [CertificateController::class, 'updateRating'])->name('certificates.updateRating');
            Route::get('/certificates/download', [CertificateController::class, 'downloadCertificate'])->name('certificates.download');
            Route::post('/progress/update', [MaterialsController::class, 'updateProgress'])->name('user.progress.update');
        });

        Route::get('/others', [TestingController::class, 'others'])->name('others.index');

        // Pretest routes
        Route::prefix('pretest')->name('pretest.')->group(function () {
            Route::get('/{class_id}', [PretestController::class, 'pretest'])->name('index');
            Route::get('/{class_id}/question/{number}', [PretestController::class, 'pretestQuestion'])->name('question');
            Route::post('/{class_id}/submit', [PretestController::class, 'submitPretest'])->name('submit');
        });

        // Posttest routes
        Route::prefix('posttest')->name('posttest.')->group(function () {
            Route::get('/{class_id}', [PosttestController::class, 'posttest'])->name('index');
            Route::get('/{class_id}/question/{number}', [PosttestController::class, 'posttestQuestion'])->name('question');
            Route::post('/{class_id}/submit', [PosttestController::class, 'submitPosttest'])->name('submit');
        });
    });
});
