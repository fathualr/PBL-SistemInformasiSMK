<?php

namespace Database\Factories;

use App\Models\Ekstrakulikuler;
use Illuminate\Database\Eloquent\Factories\Factory;

class EkstrakulikulerFactory extends Factory
{
    protected $model = Ekstrakulikuler::class;
    protected static $usedIds = [];

    public function definition()
    {
        $idgurus = ['1', '2', '3', '4', '5'];
        $availableIds = array_diff($idgurus, self::$usedIds);

        // Check if there are available ids
        if (empty($availableIds)) {
            throw new \Exception('No more unique ids available for id_program');
        }

        $selectedId = $this->faker->randomElement($availableIds);
        self::$usedIds[] = $selectedId;

        return [
            'id_guru' => $selectedId,
            'nama_ekstrakurikuler' => $this->faker->words(3, true),
            'deskripsi_ekstrakurikuler' => $this->faker->paragraph,
            'tempat_ekstrakurikuler' => $this->faker->address,
            'jadwal_ekstrakurikuler' => $this->faker->dateTimeThisYear(),
            'gambar_profil_ekstrakurikuler' => 'image/albumAlbumFoto/3ZJGaluEBp5sfks4YHutCaDMMH3cDkOLJWXjaP0j.jpg',
        ];
    }
}
