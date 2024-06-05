<?php

namespace Database\Factories;

use App\Models\DirektoriGuru;
use Illuminate\Database\Eloquent\Factories\Factory;

class DirektoriGuruFactory extends Factory
{
    protected $model = DirektoriGuru::class;

    public function definition()
    {
        return [
            'id_program' => $this->faker->numberBetween(1, 5),
            'nama_guru' => $this->faker->name,
            'nik_guru' => $this->faker->unique()->numerify('############'),
            'jabatan_guru' => $this->faker->jobTitle,
            'TTL_guru' => $this->faker->dateTimeBetween('-50 years', '-25 years'),
            'tempat_lahir_guru' => $this->faker->city,
            'jenis_kelamin' => $this->faker->randomElement(['Laki - laki', 'Perempuan']),
            'no_hp_guru' => $this->faker->phoneNumber,
            'alamat_guru' => $this->faker->address,
            'gambar_guru' => 'image/gambarGuru/j8RggKktnk9Sq2fC2PvyGXkyxVFPVeCiFDm0xolo.png',
            'status_guru' => $this->faker->randomElement(['Aktif', 'Cuti', 'Pensiun', 'Resign']),
            'email_guru' => $this->faker->unique()->safeEmail,
        ];
    }
}
