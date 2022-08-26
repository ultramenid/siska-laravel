<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendDashboardController extends Controller
{
    public function index(){
        $title = 'Pabrik - Sistem Informasi Perkebunan Kelapa Sawit Kalimantan Tengah ';
        $nav = 'frontendDashboard';
        if(session('username')){
            return view('frontends.pabrik', compact('title', 'nav'));
        }else{
            return redirect('/login');
        }
    }
    public function izin(){
        $title = 'Izin - Sistem Informasi Perkebunan Kelapa Sawit Kalimantan Tengah ';
        $nav = 'frontendDashboard';
        if(session('username')){
            return view('frontends.izin', compact('title', 'nav'));
        }else{
            return redirect('/login');
        }
    }
    public function sawitrakyat(){
        $title = 'Sawit Rakyat - Sistem Informasi Perkebunan Kelapa Sawit Kalimantan Tengah ';
        $nav = 'frontendDashboard';
        if(session('username')){
            return view('frontends.sawitrakyat', compact('title', 'nav'));
        }else{
            return redirect('/login');
        }
    }
    public function analisistutupansawit(){
        $title = 'Analisis Tutupan Sawit - Sistem Informasi Perkebunan Kelapa Sawit Kalimantan Tengah ';
        $nav = 'frontendDashboard';

        if(session('username')){
            return view('frontends.analisistutupansawit', compact('title', 'nav'));
        }else{
            return redirect('/login');
        }
    }
    public function produksi(){
        $title = 'Analisis Produksi - Sistem Informasi Perkebunan Kelapa Sawit Kalimantan Tengah ';
        $nav = 'frontendDashboard';

        if(session('username')){
            return view('frontends.produksi', compact('title', 'nav'));
        }else{
            return redirect('/login');
        }
    }
}
