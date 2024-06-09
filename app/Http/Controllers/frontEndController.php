<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Album;
use App\Models\ProgramKeahlian;
use App\Models\MediaSosial;

class FrontEndController extends Controller
{
    public function home()
    {
        $berita = Berita::with('kategori', 'gambar')->inRandomOrder()->limit(6)->get();
        $album = Album::inRandomOrder()->get();
        $medsos = MediaSosial::first();
        return view('/home', [
            "berita" => $berita,
            "album" => $album,
            "title" => "Beranda",
            "medsos" => $medsos
        ]);
    }

    public function profile()
    {
        $programKeahlian = ProgramKeahlian::inRandomOrder()->get();
        $medsos = MediaSosial::first();
        return view('guest/profile', [
            "programKeahlian" => $programKeahlian,
            "medsos" => $medsos,
            "title" => "Profile"
        ]);
    }
}
