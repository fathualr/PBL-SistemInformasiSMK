<?php

namespace Database\Factories;

use App\Models\Ekstrakulikuler;
use Illuminate\Database\Eloquent\Factories\Factory;

class EkstrakulikulerFactory extends Factory
{
    protected $model = Ekstrakulikuler::class;

    public function definition()
    {

        $images = [
            'image/albumAlbumFoto/aKhyyLYBTcCIcitNnPHdvHnvZ87v6e2VR6hm7Kdc.jpg',
            'image/albumAlbumFoto/3ODYS7TYzAANe6vcMrfUgBXCkXyMKetYoUWxQgGl.jpg',
            'image/albumAlbumFoto/H2FsHTG0nLkHbVaAF2khnWPthPWPvztthySPbAYP.jpg'
        ];

        return [
            'id_guru' => $this->faker->numberBetween(1, 5),
            'nama_ekstrakurikuler' => $this->faker->words(3, true),
            'deskripsi_ekstrakurikuler' => implode("\n\n", $this->faker->paragraphs(5)),
            'tempat_ekstrakurikuler' => $this->faker->address,
            'jadwal_ekstrakurikuler' => $this->faker->dateTimeThisYear(),
            'gambar_profil_ekstrakurikuler' =>$this->faker->randomElement($images),
        ];
    }
}
