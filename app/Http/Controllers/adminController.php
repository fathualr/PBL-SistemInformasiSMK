<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Album;
use App\Models\Foto;
use App\Models\Video;
use App\Models\InformasiPPDB;
use App\Models\AlurPPDB;

class adminController extends Controller
{
    public function login()
    {
        return view('admin/login', [
            "title" => "Login"
        ]);
    }

    public function dashboard()
    {
        return view('admin/dashboard', [
            "title" => "Dashboard"
        ]);
    }

    // public function admin(){
    //     $admin = Admin::all();
    //     return view('admin/admin', [
    //         'admin' => $admin,
    //         "title" => "Admin"
    //     ]);
    // }

    public function adminBeranda()
    {
        return view('admin/beranda', [
            "title" => "Admin Beranda"
        ]);
    }

    // public function adminSejarah()
    // {
    //     return view('admin/sejarah', [
    //         "title" => "Admin Sejarah Sekolah"
    //     ]);
    // }

    // public function adminProfile()
    // {
    //     return view('admin/profile', [
    //         "title" => "Admin Profile"
    //     ]);
    // }

    public function adminProgramKeahlian()
    {
        return view('admin/program-keahlian', [
            "title" => "Admin Program Keahlian"
        ]);
    }

    // public function adminGuru()
    // {
    //     return view('admin/guru', [
    //         "title" => "Admin Guru"
    //     ]);
    // }

    // public function adminStaff()
    // {
    //     return view('admin/staff', [
    //         "title" => "Admin Staff"
    //     ]);
    // }

    // public function adminSiswa()
    // {
    //     return view('admin/siswa', [
    //         "title" => "Admin Siswa"
    //     ]);
    // }

    // public function adminAlumni()
    // {
    //     return view('admin/alumni', [
    //         "title" => "Admin Alumni"
    //     ]);
    // }


    public function adminPengumumanPPDB()
    {
        return view('admin/pengumumanPPDB', [
            "title" => "Admin Pengumuman PPDB"
        ]);
    }

    // public function adminPrestasi()
    // {
    //     return view('admin/prestasi', [
    //         "title" => "Admin Prestasi"
    //     ]);
    // }

    // public function adminIBerita()
    // {
    //     return view('admin/berita', [
    //         "title" => "Admin Berita"
    //     ]);
    // }

    // public function adminEkstrakulikuler()
    // {
    //     return view('admin/ekstrakulikuler', [
    //         "title" => "Admin Ekstrakulikuler"
    //     ]);
    // }

    // public function adminUmpanBalik()
    // {
    //     return view('admin/umpanBalik', [
    //         "title" => "Admin Umpan Balik"
    //     ]);
    // }

    public function adminPengaturan()
    {
        return view('admin/pengaturan', [
            "title" => "Admin Pengaturan"
        ]);
    }
}