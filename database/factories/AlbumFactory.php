<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlbumFactory extends Factory
{
    protected $model = Album::class;

    public function definition()
    {

        $images = [
            'image/albumAlbumFoto/3ODYS7TYzAANe6vcMrfUgBXCkXyMKetYoUWxQgGl.jpg',
            'image/albumAlbumFoto/H2FsHTG0nLkHbVaAF2khnWPthPWPvztthySPbAYP.jpg',
            'image/albumAlbumFoto/HdeWEGLMs2A8SDYRFTvU8S2Ivx4eEW1ZByxXupOH.jpg',
            'image/albumAlbumFoto/aKhyyLYBTcCIcitNnPHdvHnvZ87v6e2VR6hm7Kdc.jpg'
        ];
        
        return [
            'nama_album' => $this->faker->sentence(3),
            'tipe_album' => $this->faker->randomElement(['Foto', 'Video']),
            'gambar_album' => $this->faker->randomElement($images),
            'deskripsi_album' => $this->faker->paragraph,
            'tanggal_unggah' => $this->faker->dateTimeThisDecade(),
        ];
    }
}
