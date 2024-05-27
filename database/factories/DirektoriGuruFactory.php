<?php

namespace Database\Factories;

use App\Models\DirektoriGuru;
use Illuminate\Database\Eloquent\Factories\Factory;

class DirektoriGuruFactory extends Factory
{
    protected $model = DirektoriGuru::class;
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
            'nama_guru' => $this->faker->name,
            'nik_guru' => $this->faker->unique()->numerify('############'),
            'jabatan_guru' => $this->faker->jobTitle,
            'TTL_guru' => $this->faker->dateTimeBetween('-50 years', '-25 years'),
            'tempat_lahir_guru' => $this->faker->city,
            'jenis_kelamin' => $this->faker->randomElement(['Laki - laki', 'Perempuan']),
            'no_hp_guru' => $this->faker->phoneNumber,
            'alamat_guru' => $this->faker->address,
            'gambar_guru' => $this->faker->imageUrl(100, 100, 'logo'),
            'status_guru' => $this->faker->randomElement(['Aktif', 'Cuti', 'Pensiun', 'Resign']),
            'email_guru' => $this->faker->unique()->safeEmail,
        ];
    }
}
