<?php

namespace Database\Factories;

use App\Models\CapaianPembelajaran;
use Illuminate\Database\Eloquent\Factories\Factory;

class CapaianPembelajaranFactory extends Factory
{
    protected $model = CapaianPembelajaran::class;

    public function definition()
    {

        return [
            'id_program' => $this->faker->numberBetween(1, 8),
            'deskripsi_capaian_pembelajaran' => implode("\n\n", $this->faker->paragraphs(5)),
            'aspek_sikap' => implode("\n\n", $this->faker->paragraphs(2)), 
            'aspek_pengetahuan' => implode("\n\n", $this->faker->paragraphs(3)), 
            'aspek_keterampilan_umum' => implode("\n\n", $this->faker->paragraphs(2)), 
            'aspek_keterampilan_khusus' => implode("\n\n", $this->faker->paragraphs(6)),
        ];
    }
}
