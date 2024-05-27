<?php

namespace Database\Factories;

use App\Models\DirektoriSiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class DirektoriSiswaFactory extends Factory
{
    protected $model = DirektoriSiswa::class;
    protected static $usedIds = [];

    public function definition()
    {
        $idprograms = ['1', '2', '3', '4', '5'];
        $availableIds = array_diff($idprograms, self::$usedIds);

        // Check if there are available ids
        if (empty($availableIds)) {
            throw new \Exception('No more unique ids available for id_program');
        }

        $selectedId = $this->faker->randomElement($availableIds);
        self::$usedIds[] = $selectedId;

        return [
            'id_program' => $selectedId,
            'nama_siswa' => $this->faker->name,
            'nisn_siswa' => $this->faker->unique()->numerify('##############'),
            'jenis_kelamin_siswa' => $this->faker->randomElement(['Laki - Laki', 'Perempuan']),
            'no_hp_siswa' => $this->faker->phoneNumber,
            'TTL_siswa' => $this->faker->dateTimeBetween('-20 years', '-15 years')->format('Y-m-d'),
            'tempat_lahir_siswa' => $this->faker->city,
            'alamat_siswa' => $this->faker->address,
            'kelas_siswa' => $this->faker->randomElement(['X', 'XI', 'XII']),
            'tahun_angkatan_siswa' => $this->faker->numberBetween(2010, 2020),
            'gambar_siswa' => $this->faker->imageUrl(100, 100, 'people'),
        ];
    }
}
