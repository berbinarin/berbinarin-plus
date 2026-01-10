<?php

namespace App\Observers;

use App\Models\Berbinarp_Class;
use App\Models\Test;

class Course_Observer
{
    /**
     * Handle the Berbinarp_Class "created" event.
     * Berjalan otomatis setelah Admin menambah Kelas baru.
     */
    public function created(Berbinarp_Class $class): void
    {
        // 1. Membuat Pre-Test Otomatis untuk Kelas ini
        Test::create([
            'course_id' => $class->id,
            'type'      => 'pre_test',
            'title'     => 'Pre-Test ' . $class->name,
        ]);

        // 2. Membuat Post-Test Otomatis untuk Kelas ini
        Test::create([
            'course_id' => $class->id,
            'type'      => 'post_test',
            'title'     => 'Post-Test ' . $class->name,
        ]);
    }


    /**
     * Handle the Berbinarp_Class "deleted" event.
     */
    public function deleted(Berbinarp_Class $class): void
    {
        // Menghapus tes terkait agar database tetap bersih
        // Pastikan relasi tests() ada di model Berbinarp_Class jika ingin pakai $class->tests()->delete();
        Test::where('course_id', $class->id)->delete();
    }

    // Fungsi update dan lainnya tetap disesuaikan type hint-nya
    public function updated(Berbinarp_Class $class): void {}
    public function restored(Berbinarp_Class $class): void {}
    public function forceDeleted(Berbinarp_Class $class): void {}
}
