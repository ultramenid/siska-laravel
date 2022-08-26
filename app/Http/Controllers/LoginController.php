<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        $title = 'Login - Sistem Informasi Perkebunan Kelapa Sawit Kalimantan Tengah';
        return view('frontends.login', compact('title'));
    }
}
