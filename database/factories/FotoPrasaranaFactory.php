<?php

namespace Database\Factories;

use App\Models\FotoPrasarana;
use App\Models\Prasarana; 
use Illuminate\Database\Eloquent\Factories\Factory;

class FotoPrasaranaFactory extends Factory
{
    protected $model = FotoPrasarana::class;

    public function definition(): array
    {
        $prasaranaIds = Prasarana::pluck('id_prasarana')->toArray();

        return [
            'id_prasarana' => $this->faker->randomElement($prasaranaIds),
            'tautan_foto' => 'image/fotoPrasarana/nrvy8Vf4FtcOVpFs40OAvhz1DmJ7QnsfLWqBVUdr.jpg',
        ];
    }
}

