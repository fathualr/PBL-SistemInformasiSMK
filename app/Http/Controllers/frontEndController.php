<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KontenWebsite;
use App\Models\Carousels;

class FrontEndController extends Controller
{
    public function home(){
        $konten = KontenWebsite::first();
        $carousels = Carousels::all();
        return view('/home', [
            "konten" => $konten,
            "carousels" => $carousels,
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
