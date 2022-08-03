<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetaDataController extends Controller
{
    public function index(){
        $title = 'Platform Map - Sistem Informasi Perkebunan Kelapa Sawit Kalimantan Tengah ';
        $nav = 'petadata';
        return view('frontends.map', compact('title', 'nav'));
    }

    public function daftaristilah(){
        $title = 'Daftar Istilah - Sistem Informasi Perkebunan Kelapa Sawit Kalimantan Tengah ';
        $nav = 'petadata';
        return view('frontends.daftaristilah', compact('title', 'nav'));
    }
}
