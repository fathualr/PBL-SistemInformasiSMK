<?php

namespace Database\Factories;

use App\Models\GambarPrestasiSiswa;
use Illuminate\Database\Eloquent\Factories\Factory;


class GambarPrestasiSiswaFactory extends Factory
{
    protected $model = GambarPrestasiSiswa::class;

    public function definition()
    {
        $images = [
            'image/PrestasiHeadline/TAJZE1tSgDKoGSsj5MpMm7WyYeO0z2XPTHwrR3XT.jpg',
            'image/PrestasiHeadline/GuRmCfcB3UTxiZr5xQ3DXKp5RwT1BAkZ8diideR3.jpg',
            'image/PrestasiHeadline/f0KCeh5tqF7KPySNRqLdkyU59ESirUyLMndU2h7N.jpg',
            'image/PrestasiHeadline/09BITNw4ctvJ3RStiWNXboC8GRMvE6ui5mKyCGZy.png'
        ];

        return [
            'id_prestasi' => $this->faker->numberBetween(1, 5), // This will create a PrestasiSiswa and get its id
            'gambar' => $this->faker->randomElement($images),
        ];
    }
}


