<?php

namespace Database\Factories;

use App\Models\PeluangKerja;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeluangKerjaFactory extends Factory
{
    protected $model = PeluangKerja::class;

    public function definition()
    {
        return [
            'id_program' => $this->faker->numberBetween(1, 8),
            'peluang_kerja' => $this->faker->paragraph(3), 
            'deskripsi_pekerjaan' => $this->faker->paragraph(2), 
        ];
    }
}
