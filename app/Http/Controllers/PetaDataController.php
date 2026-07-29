<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PetaDataController extends Controller
{
    public function index(): View
    {
        return view('frontends.map', [
            'title' => 'Peta Perkebunan — SISKA Kalimantan Tengah',
        ]);
    }
}
