<?php

// database/factories/DirektoriAlumniFactory.php

namespace Database\Factories;

use App\Models\DirektoriAlumni;
use Illuminate\Database\Eloquent\Factories\Factory;

class DirektoriAlumniFactory extends Factory
{
    protected $model = DirektoriAlumni::class;

    public function definition()
    {
        return [
            'nama_alumni' => $this->faker->name,
            'no_hp_alumni' => $this->faker->phoneNumber,
            'email_alumni' => $this->faker->unique()->safeEmail,
            'jenis_kelamin_alumni' => $this->faker->randomElement(['Laki - Laki', 'Perempuan']),
            'TTL_alumni' => $this->faker->dateTimeBetween('-50 years', '-25 years')->format('Y-m-d'),
            'tempat_lahir_alumni' => $this->faker->city,
            'tahun_kelulusan_alumni' => $this->faker->numberBetween(2024, 2034),
            'gambar_alumni' => 'image/gambarAlumni/73BG0LSbI3hfbUDoVcQeBoumMOOaW4c0A4hYHEmg.png',
            'alamat_alumni' => $this->faker->address,
        ];
    }
}

