<?php

namespace Database\Factories;

use App\Models\ProgramKeahlian;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramKeahlianFactory extends Factory
{
    protected $model = ProgramKeahlian::class;

    public function definition()
    {
        $programs = ['Teknik Informatika', 'Teknik Mesin', 'Teknik Elektro', 'Teknik Multemedia', 'Teknik Memasak'];

        return [
            'nama_program' => $this->faker->unique()->randomElement($programs),
            'logo_program' => $this->faker->imageUrl(100, 100, 'logo'),
            'deskripsi_program' => $this->faker->sentence(),
            'deskripsi_peluang_kerja' => $this->faker->sentence(),
            'visi_program' => $this->faker->sentence(),
            'misi_program' => $this->faker->sentence(),
            'tujuan_program' => $this->faker->sentence(),
            'sasaran_program' => $this->faker->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
