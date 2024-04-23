<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class webController extends Controller
{
    public function home(){
        return view('/home', [
            "title" => "Beranda"
        ]);
    }

    public function profile(){
        return view('guest/profile', [
            "title" => "Profile"
        ]);
    }

    public function program(){
        return view('guest/program-keahlian', [
            "title" => "Program Keahlian"
        ]);
    }

    public function ppdb(){
        return view('guest/ppdb', [
            "title" => "PPDB"
        ]);
    }

    public function pengumuman(){
        return view('guest/pengumuman-ppdb', [
            "title" => "Pengumuman PPDB"
        ]);
    }

    public function guru(){
        return view('guest/direktori-guru', [
            "title" => "Direktori Guru"
        ]);
    }

    public function pegawai(){
        return view('guest/guest/direktori-pegawai', [
            "title" => "Direktori Pegawai"
        ]);
    }
    
    public function siswa(){
        return view('guest/direktori-siswa', [
            "title" => "Direktori Siswa"
        ]);
    }

    public function alumni(){
        return view('guest/direktori-alumni', [
            "title" => "Direktori Alumni"
        ]);
    }

    public function foto(){
        return view('guest/foto', [
            "title" => "Galeri Foto"
        ]);
    }

    public function video(){
        return view('guest/video', [
            "title" => "Galeri Video"
        ]);
    }

    public function galeriTemplate(){
        return view('guest/galeri-template', [
            "title" => "Galeri Foto"
        ]);
    }

    public function saranaPrasarana(){
        return view('guest/sarana-prasarana', [
            "title" => "Sarana & Prasarana"
        ]);
    }

    public function saranaPrasaranaTemplate(){
        return view('guest/sarana-prasarana-template', [
            "title" => "Sarana & Prasarana"
        ]);
    }

    public function prestasi(){
        return view('guest/prestasi', [
            "title" => "Prestasi Siswa"
        ]);
    }

    public function prestasiTemplate(){
        return view('guest/prestasi-template', [
            "title" => "Prestasi Siswa"
        ]);
    }

    public function berita(){
        return view('guest/berita', [
            "title" => "Berita"
        ]);
    }

    public function beritaTemplate(){
        return view('guest/berita-template', [
            "title" => "Berita"
        ]);
    }

    public function ekstrakulikuler(){
        return view('guest/ekstrakulikuler', [
            "title" => "Ekstrakulikuler"
        ]);
    }

    public function mediaSosial(){
        return view('guest/media-sosial', [
            "title" => "Media Sosial"
        ]);
    }

    public function sejarah(){
        return view('guest/sejarah', [
            "title" => "Sejarah"
        ]);
    }

    public function detailProgram(){
        return view('guest/detail-program', [
            "title" => "Detail Program Keahlian"
        ]);
    }
}