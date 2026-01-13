<?php

use App\Http\Controllers\Dashboard\BerbinarPlus\MateriController;
use App\Http\Controllers\Landing\HomeController;
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Landing\MaterialsController;
use App\Http\Controllers\Landing\PretestController;
use App\Http\Controllers\Landing\PreviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\TestingController;



Route::name('landing.')->group(function () {
    // Public landing page
    Route::get('/', [LandingController::class, 'landing'])->name('index');

    // Group: routes that require authentication (user biasa)
    Route::middleware(['auth:berbinar'])->group(function () {
        Route::prefix('home')->name('home.')->group(function () {
            Route::get('/', [HomeController::class, 'homepage'])->name('index');
            Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
            Route::get('/preview/{class_id}', [PreviewController::class, 'preview'])->name('preview');
            Route::get('/materials', [MaterialsController::class, 'materials'])->name('materials'); // expects class_id & section_id as query params
            Route::get('/certificates', [TestingController::class, 'certificates'])->name('certificates');
        });
    });

    // Group: routes that do not require authentication
    Route::get('/others', [TestingController::class, 'others'])->name('others.index');

    // Pretest routes
    Route::prefix('pretest')->name('pretest.')->group(function () {
        Route::get('/{class_id}', [PretestController::class, 'pretest'])->name('index');
        Route::get('/{class_id}/question/{number}', [PretestController::class, 'pretestQuestion'])->name('question');
        Route::post('/{class_id}/submit', [PretestController::class, 'submitPretest'])->name('submit');
        Route::get('/{class_id}-finished', [PretestController::class, 'pretestFinished'])->name('index-finished');
    });

    // Posttest routes
    Route::prefix('posttest')->name('posttest.')->group(function () {
        Route::get('/', [TestingController::class, 'posttest'])->name('index');
        Route::get('/question', [TestingController::class, 'posttestQuestion'])->name('question');
        Route::get('/question/2', [TestingController::class, 'posttestQuestion2'])->name('question.2');
        Route::get('-finished', [TestingController::class, 'posttestFinished'])->name('index-finished');
    });
});


// Route::get('/', [TestingController::class, 'landing'])->name('home.index');

// Route::get('/home', [HomeController::class, 'homepage'])->name('homepage.index');

// Route::get('/others', [TestingController::class, 'others'])->name('others.index');

// Route::get('/profile', [TestingController::class, 'profile'])->name('profile.index');

// Route::get('/preview', [TestingController::class, 'preview'])->name('preview.index');

// Route::get('/pretest', [TestingController::class, 'pretest'])->name('pretest.index');
// Route::get('/pretest/question', [TestingController::class, 'pretestQuestion'])->name('pretest.question');
// Route::get('/pretest/question/2', [TestingController::class, 'pretestQuestion2'])->name('pretest.question.2');
// Route::get('/pretest-finished', [TestingController::class, 'pretestFinished'])->name('pretest.index-finished');

// Route::get('/posttest', [TestingController::class, 'posttest'])->name('posttest.index');
// Route::get('/posttest/question', [TestingController::class, 'posttestQuestion'])->name('posttest.question');
// Route::get('/posttest/question/2', [TestingController::class, 'posttestQuestion2'])->name('posttest.question.2');
// Route::get('/posttest-finished', [TestingController::class, 'posttestFinished'])->name('posttest.index-finished');

// Route::get('/materials', [TestingController::class, 'materials'])->name('materials.index');

// Route::get('/certificates', [TestingController::class, 'certificates'])->name('certificates.index');
