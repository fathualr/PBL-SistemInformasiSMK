<?php

namespace Database\Factories;

use App\Models\SejarahSekolah;
use Illuminate\Database\Eloquent\Factories\Factory;

class SejarahSekolahFactory extends Factory
{
    protected $model = SejarahSekolah::class;

    public function definition()
    {
        return [
            'judul_sejarah' => $this->faker->sentence,
            'deskripsi_sejarah' => implode("\n\n", $this->faker->paragraphs(5)),
            'tanggal_sejarah' => $this->faker->date('Y-m-d'),
            'gambar_sejarah' => 'image/albumAlbumFoto/H2FsHTG0nLkHbVaAF2khnWPthPWPvztthySPbAYP.jpg',
        ];
    }
}
