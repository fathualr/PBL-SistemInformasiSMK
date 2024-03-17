<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class webController extends Controller
{
    public function home(){
        return view('home', [
            "title" => "Home"
        ]);
    }

    public function profile(){
        return view('profile', [
            "title" => "Profile"
        ]);
    }

    public function ppdb(){
        return view('ppdb', [
            "title" => "PPDB"
        ]);
    }

    public function pengunguman(){
        return view('pengunguman-ppdb', [
            "title" => "Pengunguman PPDB"
        ]);
    }

    public function guru(){
        return view('guru', [
            "title" => "Direktori Guru"
        ]);
    }

    public function pegawai(){
        return view('pegawai', [
            "title" => "Direktori Pegawai"
        ]);
    }
    
    public function siswa(){
        return view('siswa', [
            "title" => "Direktori Siswa"
        ]);
    }

    public function alumni(){
        return view('alumni', [
            "title" => "Direktori Alumni"
        ]);
    }

    public function foto(){
        return view('foto', [
            "title" => "Galeri Foto"
        ]);
    }

    public function video(){
        return view('video', [
            "title" => "Galeri Video"
        ]);
    }

    public function saranaPrasarana(){
        return view('sarana-prasarana', [
            "title" => "Sarana & Prasarana"
        ]);
    }

    public function prestasi(){
        return view('prestasi', [
            "title" => "Prestasi Siswa"
        ]);
    }

    public function berita(){
        return view('berita', [
            "title" => "Berita"
        ]);
    }

    public function ekstrakulikuler(){
        return view('ekstrakulikuler', [
            "title" => "Ekstrakulikuler"
        ]);
    }

    public function mediaSosial(){
        return view('media-sosial', [
            "title" => "Media Sosial"
        ]);
    }
}