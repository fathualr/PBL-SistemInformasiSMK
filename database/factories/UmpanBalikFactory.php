<?php

namespace Database\Factories;

use App\Models\UmpanBalik;
use Illuminate\Database\Eloquent\Factories\Factory;


class UmpanBalikFactory extends Factory
{
    protected $model = UmpanBalik::class;

    public function definition(): array
    {
        return [
            'nama_penulis' => $this->faker->name,
            'email_penulis' => $this->faker->email,
            'deskripsi_pesan' => implode("\n\n", $this->faker->paragraphs(5)),
        ];
    }
}
