<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BerbinarpUserStatus;

class BerbinarpStatus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['name' => 'pending'],
            ['name' => 'active'],
            ['name' => 'suspended'],
            ['name' => 'banned'],
            ['name' => 'inactive'],
        ];
        BerbinarpUserStatus::insert($statuses);
    }
}
