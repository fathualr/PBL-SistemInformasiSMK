<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function login(){
        return view('admin/login', [
            "title" => "Login"
        ]);
    }

    public function dashboard(){
        return view('admin/dashboard', [
            "title" => "Dashboard"
        ]);
    }

    public function adminBeranda(){
        return view('admin/beranda', [
            "title" => "Admin Beranda"
        ]);
    }

    public function adminProfile(){
        return view('admin/profile', [
            "title" => "Admin Profile"
        ]);
    }
}