<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed program keahlian with some example data
        \App\Models\ProgramKeahlian::factory(5)->create();

        // Seed capaian pembelajaran with some example data
        \App\Models\CapaianPembelajaran::factory(5)->create();

        // Seed peluang kerja with some example data
        \App\Models\PeluangKerja::factory(5)->create();

        // Seed form_ppdb with 100 entries
        \App\Models\FormPPDB::factory(100)->create();

        // Seed album with 10 entries
        \App\Models\Album::factory(10)->create();

        // Seed foto with 10 entries
        \App\Models\Foto::factory(100)->create();

        // Seed vidio with 10 entries
        \App\Models\Video::factory(50)->create();

        // Seed carousels with 10 entries
        \App\Models\Carousels::factory(4)->create();

        // Seed prasarana with 10 entries
        \App\Models\Prasarana::factory(8)->create();

        // Seed prasarana with 10 entries
        \App\Models\FotoPrasarana::factory(8)->create();

        // Seed berita with 10 entries
        \App\Models\Berita::factory(5)->create();

        // Seed direktoriguru with 10 entries
        \App\Models\DirektoriGuru::factory(5)->create();

        // Seed direktoripegawai with 10 entries
        \App\Models\DirektoriPegawai::factory(5)->create();

        // Seed direktorialumni with 10 entries
        \App\Models\DirektoriAlumni::factory(5)->create();

        // Seed direktorisiswa with 10 entries
        \App\Models\DirektoriSiswa::factory(5)->create();
        
        // Seed ekstrakulikuler with 10 entries
        \App\Models\Ekstrakulikuler::factory(5)->create();
        
        // Seed kontenwebsite with 10 entries
        \App\Models\KontenWebsite::factory(1)->create();
        
        // Seed kontenwebsite with 10 entries
        \App\Models\SejarahSekolah::factory(1)->create();
    }
}
