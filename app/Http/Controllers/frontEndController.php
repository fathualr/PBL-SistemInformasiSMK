<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KontenWebsite;

class FrontEndController extends Controller
{
    public function home(){
        $konten = KontenWebsite::first();
        return view('/home', [
            "konten" => $konten,
            "title" => "Beranda"
        ]);
    }

    public function profile(){
        $konten = KontenWebsite::first();
        return view('guest/profile', [
            "konten" => $konten,
            "title" => "Profile"
        ]);
    }
}
