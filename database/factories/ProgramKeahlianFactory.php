<?php

namespace Database\Factories;

use App\Models\ProgramKeahlian;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramKeahlianFactory extends Factory
{
    protected $model = ProgramKeahlian::class;

    public function definition()
    {
        $programs = ['Teknik Informatika', 'Teknik Mesin', 'Teknik Elektro', 'Teknik Multemedia', 'Teknik Memasak'];

        $images = [
            'image/logoProgram/8Jd5x75BOYJcxaYPH4E0gLapZcYNF0KoWFrRed9E.png',
            'image/logoProgram/mRhTtPJuHQJEkBNsewnBzFpezr2KRfSsc9wAc74V.png',
            'image/logoProgram/tgVffebdfRspa1gjLPFAtXNb0gY6zUSrHQ8Beqzg.jpg'
        ];


        return [
            'nama_program' => $this->faker->unique()->randomElement($programs),
            'logo_program' => $this->faker->randomElement($images),
            'deskripsi_program' => implode("\n\n", $this->faker->paragraphs(5)),
            'deskripsi_peluang_kerja' => implode("\n\n", $this->faker->paragraphs(5)),
            'visi_program' => implode("\n\n", $this->faker->paragraphs(2)),
            'misi_program' => implode("\n\n", $this->faker->paragraphs(2)),
            'tujuan_program' => implode("\n\n", $this->faker->paragraphs(5)),
            'sasaran_program' => implode("\n\n", $this->faker->paragraphs(5)),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
