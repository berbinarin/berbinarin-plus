<?php

use App\Http\Controllers\Dashboard\BerbinarPlus\ClassController;
use App\Http\Controllers\Dashboard\BerbinarPlus\RegistranController;
use App\Http\Controllers\Dashboard\BerbinarPlus\MateriController;
use App\Http\Controllers\Dashboard\BerbinarPlus\Questions\PretestQuestionController;
use App\Http\Controllers\Dashboard\BerbinarPlus\Questions\PosttestQuestionController;
use App\Http\Controllers\Dashboard\BerbinarPlus\Tests\TestSubmissionController;
use App\Http\Controllers\Dashboard\BerbinarPlus\Tests\PreTestSubmissionController;
use App\Http\Controllers\Dashboard\BerbinarPlus\Tests\PostTestSubmissionController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::middleware('role:berbinarplus')->group(function () {

        // Update user status to active 
        Route::patch('/pendaftar/update-user-status/{id}', [RegistranController::class, 'updateUserStatus'])->name('updateUserStatus');

        // Class
        Route::resource('kelas', ClassController::class);

        // List materi
        Route::get('materi/kelas/{class}', [MateriController::class, 'index'])->name('kelas.materi.index');
        Route::get('kelas/{class}/materi/create', [MateriController::class, 'create'])->name('kelas.materi.create');
        Route::post('kelas/{class}/materi', [MateriController::class, 'store'])->name('kelas.materi.store');
        Route::get('materi/{id}', [MateriController::class, 'show'])->name('kelas.materi.show');
        Route::get('materi/{id}/edit', [MateriController::class, 'edit'])->name('kelas.materi.edit');
        Route::put('materi/{id}', [MateriController::class, 'update'])->name('kelas.materi.update');
        Route::delete('materi/{id}', [MateriController::class, 'destroy'])->name('kelas.materi.destroy');

        // Soal Pretest & Posttest
        Route::get('kelas/{class}/soal-pre-test/{pretest}', [PretestQuestionController::class, 'index'])->name('kelas.pre-test.index');
        Route::post('kelas/{class}/soal-pre-test/{pretest}', [PretestQuestionController::class, 'store'])->name('kelas.pre-test.store');
        Route::get('kelas/{class}/soal-pre-test/{pretest}/show/{question}', [PretestQuestionController::class, 'show'])->name('kelas.pre-test.show');
        Route::put('kelas/{class}/soal-pre-test/{pretest}/update/{question}', [PretestQuestionController::class, 'update'])->name('kelas.pre-test.update');
        Route::delete('kelas/{class}/soal-pre-test/{pretest}/delete/{question}', [PretestQuestionController::class, 'destroy'])->name('kelas.pre-test.destroy');
        Route::get('kelas/{class}/soal-post-test/{posttest}', [PosttestQuestionController::class, 'index'])->name('kelas.post-test.index');
        Route::post('kelas/{class}/soal-post-test/{posttest}', [PosttestQuestionController::class, 'store'])->name('kelas.post-test.store');
        Route::get('kelas/{class}/soal-post-test/{posttest}/show/{question}', [PosttestQuestionController::class, 'show'])->name('kelas.post-test.show');
        Route::put('kelas/{class}/soal-post-test/{posttest}/update/{question}', [PosttestQuestionController::class, 'update'])->name('kelas.post-test.update');
        Route::delete('kelas/{class}/soal-post-test/{posttest}/delete/{question}', [PosttestQuestionController::class, 'destroy'])->name('kelas.post-test.destroy');

        // Pendaftar

        // Route::resource('pendaftar', RegistranController::class);
        Route::get('/pendaftar', [RegistranController::class, 'index'])->name('pendaftar.index');
        Route::get('/pendaftar/create', [RegistranController::class, 'create'])->name('pendaftar.create');
        Route::post('/pendaftar', [RegistranController::class, 'store'])->name('pendaftar.store');
        Route::get('/pendaftar/edit/{id}', [RegistranController::class, 'edit'])->name('pendaftar.edit');
        Route::get('/pendaftar/show/{id}', [RegistranController::class, 'show'])->name('pendaftar.show');
        Route::patch('/pendaftar/update/{id}', [RegistranController::class, 'update'])->name('pendaftar.update');
        Route::delete('/pendaftar/destroy/{id}', [RegistranController::class, 'destroy'])->name('pendaftar.destroy');

        // ACC pembayaran (ubah status_kelas menjadi enrolled)
        Route::patch('/pendaftar/acc-pembayaran/{enrollment_id}', [RegistranController::class, 'accPembayaran'])->name('pendaftar.acc-pembayaran');

        // Pengumpulan Tes
        Route::get('/pendaftar/pengumpulan-tes/{user}/{enrollment}', [TestSubmissionController::class, 'index'])->name('pendaftar.pengumpulan-tes.index');
        Route::post('/pendaftar/pengumpulan-tes/{user}/{enrollment}/certificate', [TestSubmissionController::class, 'uploadCertificate'])->name('pengumpulan-tes.certificate.upload');

        // Pengumpulan Tes: Pre Test
        Route::get('/pendaftar/pre-test', [PreTestSubmissionController::class, 'index'])->name('pendaftar.pengumpulan-tes.pre-test.index');
        Route::get('/pendaftar/pre-test/show', [PreTestSubmissionController::class, 'show'])->name('pendaftar.pengumpulan-tes.pre-test.show');

        // Pengumpulan Tes: Post Test
        Route::get('/post-test', [PostTestSubmissionController::class, 'index'])->name('pendaftar.pengumpulan-tes.post-test.index');
        Route::get('/show', [PostTestSubmissionController::class, 'show'])->name('pendaftar.pengumpulan-tes.post-test.show');
    });
});
