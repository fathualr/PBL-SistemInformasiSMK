<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlbumFactory extends Factory
{
    protected $model = Album::class;

    public function definition()
    {
        return [
            'nama_album' => $this->faker->sentence(3),
            'tipe_album' => $this->faker->randomElement(['Foto', 'Video']),
            'gambar_album' => 'image/albumAlbumFoto/H2FsHTG0nLkHbVaAF2khnWPthPWPvztthySPbAYP.jpg',
            'deskripsi_album' => $this->faker->paragraph,
            'tanggal_unggah' => $this->faker->dateTimeThisDecade(),
        ];
    }
}
