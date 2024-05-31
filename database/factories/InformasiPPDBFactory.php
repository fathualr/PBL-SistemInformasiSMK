<?php

namespace Database\Factories;

use App\Models\InformasiPPDB;
use Illuminate\Database\Eloquent\Factories\Factory;

class InformasiPPDBFactory extends Factory
{

    protected $model = InformasiPPDB::class;
    public function definition(): array
    {
        return [
            'deskripsi_ppdb' => implode("\n\n", $this->faker->paragraphs(5)),
            'deskripsi_pengumuman' => implode("\n\n", $this->faker->paragraphs(5)),
        ];
    }
}
