<?php

namespace Database\Factories;

use App\Models\Foto;
use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

class FotoFactory extends Factory
{
    protected $model = Foto::class;

    public function definition()
    {
        // Ambil ID album yang ada dari tabel 'album'
        $albumIds = Album::pluck('id_album')->toArray();

        $images = [
            'image/albumFoto/0HjHRfdLz8ESdXnA7ytZZLYSf4K0VjG32cbdwcYm.png',
            'image/albumFoto/FFsxBkYFT0SJQ2OCFJTAhnYQW0F5lrNVSbDgtjb4.jpg',
            'image/albumFoto/NC4ranv4xI2ImqMEScyNHg0lhw857LY593NzyQPq.jpg',
            'image/albumFoto/Ku5AHZLTgSHmy92aC967RskxY4uTNnpwtXyA1RKx.jpg',
            'image/albumFoto/PtzkZzEfXRZcUIYAlfc73TuHBYTX4tPa4ggAZdbA.png',
            'image/albumFoto/aKhyyLYBTcCIcitNnPHdvHnvZ87v6e2VR6hm7Kdc.jpg'
        ];
    

        return [
            'id_album' => $this->faker->randomElement($albumIds),
            'tautan_foto' => $this->faker->randomElement($images),
        ];
    }
}
