<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgramKeahlian;
use App\Models\FormPPDB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed program_keahlian with some example data
        \App\Models\ProgramKeahlian::factory(10)->create();

        // Seed form_ppdb with 100 entries
        \App\Models\FormPPDB::factory(100)->create();
    }
}
