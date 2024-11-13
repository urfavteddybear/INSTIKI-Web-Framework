<?php

namespace Database\Seeders;

use App\Models\Pelanggan_2301010033s;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggan_2301010033s::factory()->count(100)->create();
    }
}

