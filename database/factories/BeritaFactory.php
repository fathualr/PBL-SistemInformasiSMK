<?php

namespace Database\Factories;

use App\Models\Berita;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BeritaFactory extends Factory
{
    protected $model = Berita::class;

    public function definition()
    {
        $images = [
            'image/BeritaHeadline/3MaGp12rGdWYXfPOjwjXZNwTv3oUFKcHYmuJ170Z.png',
            'image/BeritaHeadline/bcQOPo7ZTbGszJm4IdT4UnYlfCDvK7LI4a5705zx.jpg',
            'image/BeritaHeadline/Poxs1khJ90rEUgN3vlk9bXjigM6n2ec9QEjqVyej.jpg'
        ];

        return [
            'judul_berita' => $this->faker->sentence,
            'isi_berita' => $this->faker->paragraphs(3, true),
            'gambar_headline' => $this->faker->randomElement($images),
            'tanggal_berita' => Carbon::now(),
        ];
    }
}
