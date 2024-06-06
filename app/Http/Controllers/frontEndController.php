<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Album;
use App\Models\ProgramKeahlian;

class FrontEndController extends Controller
{
    public function home()
    {
        $berita = Berita::with('kategori', 'gambar')->inRandomOrder()->limit(6)->get();
        $album = Album::inRandomOrder()->get();
        return view('/home', [
            "berita" => $berita,
            "album" => $album,
            "title" => "Beranda"
        ]);
    }

    public function profile()
    {
        $programKeahlian = ProgramKeahlian::inRandomOrder()->get();
        return view('guest/profile', [
            "programKeahlian" => $programKeahlian,
            "title" => "Profile"
        ]);
    }
}
