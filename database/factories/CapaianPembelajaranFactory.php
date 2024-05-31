<?php

namespace Database\Factories;

use App\Models\CapaianPembelajaran;
use Illuminate\Database\Eloquent\Factories\Factory;

class CapaianPembelajaranFactory extends Factory
{
    protected $model = CapaianPembelajaran::class;

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
            'deskripsi_capaian_pembelajaran' => implode("\n\n", $this->faker->paragraphs(5)),
            'aspek_sikap' => implode("\n\n", $this->faker->paragraphs(2)), 
            'aspek_pengetahuan' => implode("\n\n", $this->faker->paragraphs(3)), 
            'aspek_keterampilan_umum' => implode("\n\n", $this->faker->paragraphs(2)), 
            'aspek_keterampilan_khusus' => implode("\n\n", $this->faker->paragraphs(6)),
        ];
    }
}
