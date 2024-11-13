<?php

namespace Database\Factories;

use App\Models\Pelanggan_2301010033s;
use Illuminate\Database\Eloquent\Factories\Factory;

class Pelanggan_2301010033sFactory extends Factory
{
    protected $model = Pelanggan_2301010033s::class;

    public function definition(): array
    {
        return [
            'kode' => $this->faker->unique()->regexify('[A-Za-z0-9]{4}'),
            'nama_pelanggan' => $this->faker->word(),
            'alamat' => $this->faker->word(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'tanggal_lahir' => $this->faker->date('Y-m-d'),
            'is_aktif' => '1',
        ];
    }
}
