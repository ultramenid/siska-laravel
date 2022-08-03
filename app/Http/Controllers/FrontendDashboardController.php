<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendDashboardController extends Controller
{
    public function index(){
        $title = 'Pabrik - Sistem Informasi Perkebunan Kelapa Sawit Kalimantan Tengah ';
        $nav = 'frontendDashboard';
        return view('frontends.pabrik', compact('title', 'nav'));
    }
    public function izin(){
        $title = 'Izin - Sistem Informasi Perkebunan Kelapa Sawit Kalimantan Tengah ';
        $nav = 'frontendDashboard';
        return view('frontends.izin', compact('title', 'nav'));
    }
    public function sawitrakyat(){
        $title = 'Sawit Rakyat - Sistem Informasi Perkebunan Kelapa Sawit Kalimantan Tengah ';
        $nav = 'frontendDashboard';
        return view('frontends.sawitrakyat', compact('title', 'nav'));
    }
}
