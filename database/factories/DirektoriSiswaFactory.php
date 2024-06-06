<?php

namespace Database\Factories;

use App\Models\DirektoriSiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class DirektoriSiswaFactory extends Factory
{
    protected $model = DirektoriSiswa::class;

    public function definition()
    {
        return [
            'id_program' => $this->faker->numberBetween(1, 8),
            'nama_siswa' => $this->faker->name,
            'nisn_siswa' => $this->faker->unique()->numerify('##############'),
            'jenis_kelamin_siswa' => $this->faker->randomElement(['Laki - Laki', 'Perempuan']),
            'no_hp_siswa' => $this->faker->phoneNumber,
            'TTL_siswa' => $this->faker->dateTimeBetween('-20 years', '-15 years')->format('Y-m-d'),
            'tempat_lahir_siswa' => $this->faker->city,
            'alamat_siswa' => $this->faker->address,
            'kelas_siswa' => $this->faker->randomElement(['X', 'XI', 'XII']),
            'tahun_angkatan_siswa' => $this->faker->numberBetween(2010, 2020),
            'gambar_siswa' => 'image/gambarSiswa/vnCWNHWttyPtxj9bUpYRQUPEkHX7wwJAhhF5yJFg.png',
        ];
    }
}
