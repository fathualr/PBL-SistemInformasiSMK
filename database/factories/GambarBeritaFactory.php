<?php

namespace Database\Factories;

use App\Models\GambarBerita;
use Illuminate\Database\Eloquent\Factories\Factory;

class GambarBeritaFactory extends Factory
{
    protected $model = GambarBerita::class;

    public function definition()
    {
        return [
            'tautan_gambar' => 'image/Berita/akrp7SFs98hhiyDU5PHK4plg00zzolpDHy85ZwlD.jpg',
            'berita_id' =>  $this->faker->numberBetween(1, 5), // Assuming you have a factory for the Berita model
        ];
    }
}
