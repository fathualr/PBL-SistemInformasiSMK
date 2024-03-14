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
}