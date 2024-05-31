<?php

namespace Database\Factories;

use App\Models\DirektoriPegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

class DirektoriPegawaiFactory extends Factory
{
    protected $model = DirektoriPegawai::class;

    public function definition()
    {
        return [
            'nama_pegawai' => $this->faker->name,
            'nik_pegawai' => $this->faker->unique()->numerify('############'),
            'jabatan_pegawai' => $this->faker->jobTitle,
            'TTL_pegawai' => $this->faker->dateTimeBetween('-50 years', '-25 years')->format('Y-m-d'),
            'tempat_lahir_pegawai' => $this->faker->city,
            'jenis_kelamin' => $this->faker->randomElement(['Laki - Laki', 'Perempuan']),
            'no_hp_pegawai' => $this->faker->phoneNumber,
            'alamat_pegawai' => $this->faker->address,
            'status_pegawai' => $this->faker->randomElement(['Aktif', 'Cuti', 'Pensiun', 'Resign']),
            'gambar_pegawai' => $this->faker->imageUrl(100, 100, 'people'),
            'email_pegawai' => $this->faker->unique()->safeEmail,
        ];
    }
}
