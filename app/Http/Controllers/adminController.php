<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Album;
use App\Models\Foto;
use App\Models\Video;

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

    public function adminSejarah()
    {
        return view('admin/sejarah', [
            "title" => "Admin Sejarah Sekolah"
        ]);
    }

    public function adminProfile()
    {
        return view('admin/profile', [
            "title" => "Admin Profile"
        ]);
    }

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

    public function adminStaff()
    {
        return view('admin/staff', [
            "title" => "Admin Staff"
        ]);
    }

    public function adminSiswa()
    {
        return view('admin/siswa', [
            "title" => "Admin Siswa"
        ]);
    }

    public function adminAlumni()
    {
        return view('admin/alumni', [
            "title" => "Admin Alumni"
        ]);
    }

    public function adminAlbum()
    {
        $albums = Album::paginate(10); // Mengambil 10 album per halaman

        return view('admin.album', [
            "title" => "Admin Album",
            "albums" => $albums // Meneruskan data album ke tampilan
        ]);
    }


    public function adminFoto()
    {
        // Mengambil semua data foto menggunakan model Foto
        $fotos = Foto::with('album')->paginate(10);
        $albums = Album::all();

        // Mengirim data foto ke view 'admin.foto'
        return view('admin.foto', [
            "title" => "Admin Foto",
            "fotos" => $fotos,
            "albums" => $albums,
        ]);
    }


    public function adminVideo()
    {
        // Mengambil semua data video menggunakan model Video
        $videos = Video::with('album')->paginate(10);
        $albums = Album::all();

        // Mengirim data video ke view 'admin.video'
        return view('admin.video', [
            "title" => "Admin Video",
            "videos" => $videos,
            "albums" => $albums,
        ]);
    }


    public function adminInformasiPPDB()
    {
        return view('admin/informasiPPDB', [
            "title" => "Admin Informasi PPDB"
        ]);
    }

    public function adminPendaftaranPPDB()
    {
        return view('admin/pendaftaranPPDB', [
            "title" => "Admin Pendaftaran PPDB"
        ]);
    }

    public function adminPengumumanPPDB()
    {
        return view('admin/pengumumanPPDB', [
            "title" => "Admin Pengumuman PPDB"
        ]);
    }

    public function adminSaranaPrasarana()
    {
        return view('admin/saranaPrasarana', [
            "title" => "Admin Sarana & Prasarana"
        ]);
    }

    public function adminPrestasi()
    {
        return view('admin/prestasi', [
            "title" => "Admin Prestasi"
        ]);
    }

    public function adminIBerita()
    {
        return view('admin/berita', [
            "title" => "Admin Berita"
        ]);
    }

    // public function adminEkstrakulikuler()
    // {
    //     return view('admin/ekstrakulikuler', [
    //         "title" => "Admin Ekstrakulikuler"
    //     ]);
    // }

    public function adminSosialMedia()
    {
        return view('admin/sosialMedia', [
            "title" => "Admin Sosial Media"
        ]);
    }

    public function adminUmpanBalik()
    {
        return view('admin/umpanBalik', [
            "title" => "Admin Umpan Balik"
        ]);
    }

    public function adminPengaturan()
    {
        return view('admin/pengaturan', [
            "title" => "Admin Pengaturan"
        ]);
    }
}