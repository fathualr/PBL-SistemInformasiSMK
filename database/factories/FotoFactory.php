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

        return [
            'id_album' => $this->faker->randomElement($albumIds),
            'tautan_foto' => 'image/albumAlbumFoto/H2FsHTG0nLkHbVaAF2khnWPthPWPvztthySPbAYP.jpg',
        ];
    }
}
