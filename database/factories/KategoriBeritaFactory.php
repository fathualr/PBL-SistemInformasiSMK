<?php

namespace Database\Factories;

use App\Models\KategoriBerita;
use Illuminate\Database\Eloquent\Factories\Factory;

class KategoriBeritaFactory extends Factory
{
    protected $model = KategoriBerita::class;

    public function definition(): array
    {
        $newsCategories = [
            'Politics',
            'Business',
            'Technology',
            'Health',
            'Science',
            'Sports',
            'Entertainment',
            'Travel',
            'World',
            'Education'
        ];

        return [
            'berita_id' => $this->faker->numberBetween(1, 20), // Menghasilkan ID acak antara 1 dan 20
            'nama_kategori' => $this->faker->randomElement($newsCategories), // Memilih kategori secara acak dari array
        ];
    }
}
