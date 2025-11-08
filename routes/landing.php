<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\TestingController;


Route::get('/', [TestingController::class, 'landing'])->name('home.index');

Route::get('/home', [TestingController::class, 'homepage'])->name('homepage.index');

Route::get('/others', [TestingController::class, 'others'])->name('others.index');

Route::get('/preview', [TestingController::class, 'preview'])->name('preview.index');

Route::get('/pretest', [TestingController::class, 'pretest'])->name('pretest.index');

Route::get('/pretest/question', [TestingController::class, 'pretestQuestion'])->name('pretest.question');

Route::get('/pretest/question/2', [TestingController::class, 'pretestQuestion2'])->name('pretest.question.2');

Route::get('/posttest', [TestingController::class, 'posttest'])->name('posttest.index');

Route::get('/posttest/question', [TestingController::class, 'posttestQuestion'])->name('posttest.question');

Route::get('/posttest/question/2', [TestingController::class, 'posttestQuestion2'])->name('posttest.question.2');

Route::get('/materials', [TestingController::class, 'materials'])->name('materials.index');

Route::get('/certificates', [TestingController::class, 'certificates'])->name('certificates.index');
