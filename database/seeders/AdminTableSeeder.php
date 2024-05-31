<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'username' => 'superadmin',
            'password' => Hash::make('123'), // Gantilah dengan password yang kuat
            'nama' => 'Super Admin',
            'role' => 'superadmin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
