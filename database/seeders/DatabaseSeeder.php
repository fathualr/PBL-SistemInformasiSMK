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
        \App\Models\FormPPDB::factory(500)->create();

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
        \App\Models\Berita::factory(20)->create();

        // Seed berita with 10 entries
        \App\Models\GambarBerita::factory(30)->create();

        // Seed direktoriguru with 10 entries
        \App\Models\DirektoriGuru::factory(20)->create();

        // Seed direktoripegawai with 10 entries
        \App\Models\DirektoriPegawai::factory(20)->create();

        // Seed direktorialumni with 10 entries
        \App\Models\DirektoriAlumni::factory(20)->create();

        // Seed direktorisiswa with 10 entries
        \App\Models\DirektoriSiswa::factory(20)->create();
        
        // Seed ekstrakulikuler with 10 entries
        \App\Models\Ekstrakulikuler::factory(10)->create();
        
        // Seed kontenwebsite with 10 entries
        \App\Models\KontenWebsite::factory(1)->create();
        
        // Seed sejarahsekolah with 10 entries
        \App\Models\SejarahSekolah::factory(5)->create();
        
        // Seed informasippdb with 10 entries
        \App\Models\InformasiPPDB::factory(1)->create();
        
        // Seed alurppdb with 10 entries
        \App\Models\AlurPPDB::factory(4)->create();
        
        // Seed alurppdb with 10 entries
        \App\Models\KomentarBerita::factory(50)->create();
        
        // Seed alurppdb with 10 entries
        \App\Models\KategoriBerita::factory(20)->create();

        // Seed alurppdb with 10 entries
        \App\Models\PrestasiSiswa::factory(15)->create();

        // Seed alurppdb with 10 entries
        \App\Models\GambarPrestasiSiswa::factory(30)->create();

        // Seed alurppdb with 10 entries
        \App\Models\GambarEkstrakurikuler::factory(20)->create();

        // Seed alurppdb with 10 entries
        \App\Models\UmpanBalik::factory(20)->create();
    }
}
