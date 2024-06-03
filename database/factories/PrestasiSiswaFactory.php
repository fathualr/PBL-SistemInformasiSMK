<?php

namespace Database\Factories;

use App\Models\PrestasiSiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrestasiSiswaFactory extends Factory
{
    protected $model = PrestasiSiswa::class;

    public function definition()
    {
        return [
            'nama_prestasi' => $this->faker->sentence,
            'siswa_prestasi' => $this->faker->name,
            'gambar_prestasi' => 'image/PrestasiHeadline/GuRmCfcB3UTxiZr5xQ3DXKp5RwT1BAkZ8diideR3.jpg',
            'deskripsi_prestasi' => $this->faker->paragraph,
            'tanggal_prestasi' => $this->faker->date,
            'kategori_prestasi' => $this->faker->randomElement(['Akademik', 'Olahraga', 'Seni', 'Lainnya']),
            'tingkat_prestasi' => $this->faker->randomElement(['Sekolah', 'Kabupaten', 'Provinsi', 'Nasional', 'Internasional']),
        ];
    }
}
