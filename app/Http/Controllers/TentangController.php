<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index(){
        $title = 'Siska - Sistem Informasi Perkebunan Kelapa Sawit Kalimantan Tengah ';
        $nav = 'tentang';
        return view('frontends.siska', compact('title', 'nav'));
    }
    public function tim(){
        $title = 'Tim - Sistem Informasi Perkebunan Kelapa Sawit Kalimantan Tengah ';
        $nav = 'tentang';
        return view('frontends.tim', compact('title', 'nav'));
    }
    public function faq(){
        $title = 'FAQ - Sistem Informasi Perkebunan Kelapa Sawit Kalimantan Tengah ';
        $nav = 'tentang';
        return view('frontends.faq', compact('title', 'nav'));
    }
}