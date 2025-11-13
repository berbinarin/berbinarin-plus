<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BerbinarpUserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('berbinarp_users_status')->insert([
            ['name' => 'proses'],
            ['name' => 'terdaftar'],
            ['name' => 'nonaktif'],
        ]);
    }
}
