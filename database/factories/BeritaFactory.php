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
        return [
            'judul_berita' => $this->faker->sentence,
            'isi_berita' => $this->faker->paragraphs(3, true),
            'gambar_headline' => 'image/gambarBeritaHeadline/nMQNVr4BSiA4PWJOVlb8oqPrmCLlGBLnhiTdELFI.png',
            'tanggal_berita' => Carbon::now(),
        ];
    }
}