<?php

namespace Database\Factories;

use App\Models\Prasarana;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrasaranaFactory extends Factory
{
    protected $model = Prasarana::class;

    public function definition()
    {
        $stadiumNames = [
            'Camp Nou', 'Santiago Bernabéu', 'Old Trafford', 'Allianz Arena', 
            'San Siro', 'Anfield', 'Stamford Bridge', 'Wembley Stadium', 
            'Signal Iduna Park', 'Emirates Stadium'
        ];

        return [
            'nama_prasarana' => $this->faker->randomElement($stadiumNames),
            'jenis_prasarana' => $this->faker->word,
            'deskripsi_prasarana' => implode("\n\n", $this->faker->paragraphs(3)),
            'luas' => $this->faker->numberBetween(10, 1000),
            'kapasitas' => $this->faker->numberBetween(10, 500),
            'tahun_dibangun' => $this->faker->date('Y-m-d'),
            'kondisi' => $this->faker->randomElement(['Baik', 'Perlu Perbaikan', 'Dalam Perbaikan']),
            'status_prasarana' => $this->faker->randomElement(['Aktif', 'Tidak Aktif']),
        ];
    }
}
