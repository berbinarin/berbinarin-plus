<?php

use App\Http\Controllers\Dashboard\BerbinarPlus\ClassController;
use App\Http\Controllers\Dashboard\BerbinarpAdmin\PendaftarController;
use App\Http\Controllers\Dashboard\BerbinarPlus\RegistranController;
use App\Http\Controllers\Dashboard\BerbinarPlus\MaterialController;
use App\Http\Controllers\Dashboard\BerbinarPlus\QuestionController;
use App\Http\Controllers\Dashboard\BerbinarPlus\Questions\PretestQuestionController;
use App\Http\Controllers\Dashboard\BerbinarPlus\Questions\PosttestQuestionController;
use App\Http\Controllers\Dashboard\BerbinarPlus\Tests\TestSubmissionController;
use App\Http\Controllers\Dashboard\BerbinarPlus\Tests\PreTestSubmissionController;
use App\Http\Controllers\Dashboard\BerbinarPlus\Tests\PostTestSubmissionController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Metadata\Test;

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::middleware('role:berbinarplus')->group(function () {

        // Class
        Route::resource('kelas', ClassController::class);

        // Materi
        Route::get('/materi', [MaterialController::class, 'index'])->name('kelas.materi.index');
        Route::get('/materi/create', [MaterialController::class, 'create'])->name('kelas.materi.create');
        Route::get('/materi/edit', [MaterialController::class, 'edit'])->name('kelas.materi.edit');
        Route::get('/materi/show', [MaterialController::class, 'show'])->name('kelas.materi.show');

        // Soal Pretest & Posttest
        Route::get('/soal-pre-test', [PretestQuestionController::class, 'index'])->name('kelas.pre-test.index');
        Route::get('/soal-post-test', [PosttestQuestionController::class, 'index'])->name('kelas.post-test.index');

        // Pendaftar
        // Route::resource('pendaftar', RegistranController::class);
        Route::get('/pendaftar', [RegistranController::class, 'index'])->name('pendaftar.index');
        Route::get('/pendaftar/create', [RegistranController::class, 'create'])->name('pendaftar.create');
        Route::get('/pendaftar/edit', [RegistranController::class, 'edit'])->name('pendaftar.edit');
        Route::get('/pendaftar/show', [RegistranController::class, 'show'])->name('pendaftar.show');
        Route::delete('/pendaftar/destroy', [RegistranController::class, 'destroy'])->name('pendaftar.destroy');

        Route::patch('status/{id}', [RegistranController::class, 'updateStatus'])->name('updateStatus');

        // Pengumpulan Tes
        Route::get('/pendaftar/pengumpulan-tes', [TestSubmissionController::class, 'index'])->name('pendaftar.pengumpulan-tes.index');

        // Pengumpulan Tes: Pre Test
        Route::get('/pre-test', [PreTestSubmissionController::class, 'index'])->name('pengumpulan-tes.pre-test.index');
        Route::get('/pre-test/show', [PreTestSubmissionController::class, 'show'])->name('pengumpulan-tes.pre-test.show');

        // Pengumpulan Tes: Post Test
        Route::get('/post-test', [PostTestSubmissionController::class, 'index'])->name('pengumpulan-tes.post-test.index');
        Route::get('/show', [PostTestSubmissionController::class, 'show'])->name('pengumpulan-tes.post-test.show');
    });

    Route::middleware('role:berbinaradmin')->group(function () {
        Route::get('/berbinar-admin', [DashboardController::class, 'admin'])->name('admin');
    });
});
