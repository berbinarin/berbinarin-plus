<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\TestingController;


Route::get('/', [TestingController::class, 'landing'])->name('home.index');

Route::get('/pretest', [TestingController::class, 'pretest'])->name('pretest.index');

Route::get('/pretest/question', [TestingController::class, 'pretestQuestion'])->name('pretest.question');

Route::get('/materials', [TestingController::class, 'materials'])->name('materials.index');

Route::get('/certificates', [TestingController::class, 'certificates'])->name('certificates.index');
