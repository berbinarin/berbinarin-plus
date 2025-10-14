<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'BerbinarPlus',
            'username' => 'berbinarplus',
            'email' => 'berbinarplus@gmail.com',
            'password' => bcrypt('berbinar123'),
        ])->assignRole('berbinarplus');

        User::create([
            'name' => 'BerbinarAdmin',
            'username' => 'berbinaradmin',
            'email' => 'berbinaradmin@gmail.com',
            'password' => bcrypt('berbinar123'),
        ])->assignRole('berbinaradmin');
    }
}
