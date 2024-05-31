<?php

namespace Database\Factories;

use App\Models\KategoriBerita;
use Illuminate\Database\Eloquent\Factories\Factory;

class KategoriBeritaFactory extends Factory
{
    protected $model = KategoriBerita::class;
    public function definition(): array
    {
        return [
            'berita_id' => $this->faker->numberBetween(1, 5), // Menghasilkan ID acak antara 1 dan 100
            'nama_kategori' => $this->faker->word,
        ];
    }
}
