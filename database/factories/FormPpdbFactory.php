<?php

namespace Database\Factories;

use App\Models\FormPPDB;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormPpdbFactory extends Factory
{
    protected $model = FormPPDB::class;

    public function definition()
    {
        return [
            'id_program' => null,
            'nama_lengkap' => $this->faker->name(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']),
            'nisn' => $this->faker->numerify('##########'),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->date(),
            'no_hp' => $this->faker->phoneNumber(),
            'pilihan_1' => $this->faker->randomElement(['Teknik Informatika', 'Teknik Mesin', 'Teknik Elektro', 'Teknik Multemedia', 'Teknik Memasak', 'Teknik Memancing', 'Teknik Penerbangan', 'Teknik fabrikasi']),
            'pilihan_2' => $this->faker->randomElement(['Teknik Informatika', 'Teknik Mesin', 'Teknik Elektro', 'Teknik Multemedia', 'Teknik Memasak', 'Teknik Memancing', 'Teknik Penerbangan', 'Teknik fabrikasi']),
            'tahun_pendaftaran' => $this->faker->numberBetween(2024, 2045),
            'nama_sekolah_asal' => $this->faker->company(),
            'alamat' => $this->faker->address(),
            'no_rt' => $this->faker->numberBetween(1, 20),
            'no_rw' => $this->faker->numberBetween(1, 10),
            'kelurahan' => $this->faker->city(),
            'kecamatan' => $this->faker->city(),
            'kota' => $this->faker->city(),
            'provinsi' => $this->faker->state(),
            'kode_pos' => $this->faker->postcode(),
            'nama_wali' => $this->faker->name(),
            'agama_wali' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
            'alamat_wali' => $this->faker->address(),
            'no_hp_wali' => $this->faker->phoneNumber(),
            'tempat_lahir_wali' => $this->faker->city(),
            'tanggal_lahir_wali' => $this->faker->date(),
            'pekerjaan_wali' => $this->faker->jobTitle(),
            'penghasilan_wali' => 'Rp' . $this->faker->numberBetween(1, 10) . '.000.000',
            'tautan_dokumen' => $this->faker->url(),
            'status' => $this->faker->randomElement(['Diterima', 'Ditolak', 'Dalam Proses']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
