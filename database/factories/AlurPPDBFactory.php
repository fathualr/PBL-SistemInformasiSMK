<?php

namespace Database\Factories;

use App\Models\AlurPPDB;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlurPPDBFactory extends Factory
{
    protected $model = AlurPPDB::class;
    public function definition(): array
    {
        return [
            'judul_alur' => $this->faker->sentence,
            'tanggal_alur' => $this->faker->date('Y-m-d'),
            'deskripsi_alur' => implode("\n\n", $this->faker->paragraphs(2)),
        ];
    }
}
