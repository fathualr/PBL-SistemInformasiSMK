<?php

namespace Database\Factories;

use App\Models\KontenWebsite;
use Illuminate\Database\Eloquent\Factories\Factory;

class KontenWebsiteFactory extends Factory
{
    protected $model = KontenWebsite::class;

    public function definition()
    {
        return [
            'nama_sekolah' => 'SMK MUHAMMADIYAH PLUS BATAM KOTA',
            'logo_sekolah' => 'image/gambarKontenWebsite/TfPmIsItmRv3NCcVZqKnhl7yOi8othk5zltvuPsp.png',
            'alamat_sekolah' => 'Ruko Tunas Industri Blok F No. 5, Kel. Belian, Kec. Batam Kota – Kota Batam',
            'no_telepon_sekolah' => $this->faker->phoneNumber,
            'email_sekolah' => $this->faker->unique()->safeEmail,
            'nama_kepala_sekolah' => $this->faker->name,
            'sejarah' => $this->faker->paragraph,
            'tautan_video_sejarah' => 'https://www.youtube.com/embed/9dDzr5d2AiY?si=VSD_dM1KQhBQZgd_&amp;controls=0',
            'sambutan' => 'SMK Muhammadiyah Plus Batam Kota menawarkan berbagai program keahlian yang dirancang untuk memenuhi kebutuhan dunia industri dan pasar kerja saat ini. Dengan fasilitas yang memadai dan didukung oleh tenaga pendidik yang profesional, kami berkomitmen untuk memberikan pendidikan terbaik yang berorientasi pada keterampilan praktis dan pengembangan karakter. Di sini, kami tidak hanya fokus pada aspek akademik semata, tetapi juga mengedepankan pendidikan karakter yang berlandaskan nilai-nilai Islami. Kami percaya bahwa siswa-siswi yang memiliki integritas dan etika yang baik akan mampu menghadapi berbagai tantangan di masa depan dengan bijak dan penuh percaya diri.',
            'tautan_video_sambutan' => 'https://www.youtube.com/embed/c4F4hOHUi38?si=gemiodapqyF3QH7z&amp;controls=0',
            'visi' => $this->faker->paragraph,
            'misi' => $this->faker->paragraph,
            'nis' => $this->faker->numerify('############'),
            'status_akreditasi_sekolah' => $this->faker->randomElement(['Belum Terakreditasi', 'Akreditasi A', 'Akreditasi B', 'Akreditasi C']),
            'struktur_organisasi_sekolah' => 'image/gambarKontenWebsite/DhMqLdO6klAG2yXfYqXjmCngvoGbvcWM2GcyjSQz.jpg',
            'status_kepemilikan_tanah' => $this->faker->randomElement(['Milik', 'Sewa']),
            'tahun_didirikan' => $this->faker->year,
            'tahun_operasional' => $this->faker->year,
            'no_statistik_sekolah' => $this->faker->numerify('############'),
            'fasilitas_lainnya' => $this->faker->words(3, true),
            'luas_tanah' => $this->faker->randomFloat(2, 100, 10000),
            'no_sertifikat' => $this->faker->numerify('############'),
            'no_pendirian_sekolah' => $this->faker->numerify('############'),
            'status_kepemilikan_bangunan' => $this->faker->randomElement(['Milik', 'Sewa']),
            'sisa_lahan_seluruhnya' => $this->faker->randomFloat(2, 100, 10000),
            'luas_lahan_keseluruhan' => $this->faker->randomFloat(2, 100, 10000),
            'teks_profile' => $this->faker->paragraph,
            'teks_fasilitas' => $this->faker->paragraph,
            'teks_lokasi' => $this->faker->paragraph,
            'teks_sejarah' => $this->faker->paragraph,
            'teks_prestasi' => $this->faker->paragraph,
        ];
    }
}
