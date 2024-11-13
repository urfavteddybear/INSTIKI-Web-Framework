<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // insert data menggunakan query builder
        // DB::table('barangs')->insert([
        //     'kode' => 'B001',
        //     'nama' => 'Buku Tulis',
        //     'harga' => 5500,
        //     'is_aktif' => '1',
        // ]);
        // // menggunakan model eloquent
        // Barang::create([
        //     'kode' => 'B002',
        //     'nama' => 'Pensil',
        //     'harga' => 3000,
        //     'is_aktif' => '1',
        // ]);


        //Membuat data dummy barang menggunakan factory barang
        Barang::factory()->count(100)->create();
    }
}
