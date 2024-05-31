<?php

namespace Database\Factories;

use App\Models\KomentarBerita;
use Illuminate\Database\Eloquent\Factories\Factory;

class KomentarBeritaFactory extends Factory
{
    protected $model = KomentarBerita::class;

    public function definition(): array
    {
        return [
            'id_berita' => $this->faker->numberBetween(1, 5), // Menghasilkan ID acak antara 1 dan 100
            'nama_komentar' => $this->faker->name,
            'teks_komentar' => implode("\n\n", $this->faker->paragraphs(2)),
        ];
    }
}


