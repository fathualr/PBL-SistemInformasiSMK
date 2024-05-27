<?php

namespace Database\Factories;

use App\Models\PeluangKerja;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeluangKerjaFactory extends Factory
{
    protected $model = PeluangKerja::class;

    // Static property to keep track of used ids
    protected static $usedIds = [];

    public function definition()
    {
        $idprograms = ['1', '2', '3', '4', '5'];
        $availableIds = array_diff($idprograms, self::$usedIds);

        // Check if there are available ids
        if (empty($availableIds)) {
            throw new \Exception('No more unique ids available for id_program');
        }

        $selectedId = $this->faker->randomElement($availableIds);
        self::$usedIds[] = $selectedId;

        return [
            'id_program' => $selectedId,
            'peluang_kerja' => $this->faker->paragraph(3), 
            'deskripsi_pekerjaan' => $this->faker->paragraph(2), 
        ];
    }
}
