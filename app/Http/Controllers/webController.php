<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class webController extends Controller
{
    public function show(){
        return view('home');
    }
}