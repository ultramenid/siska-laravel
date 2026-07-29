<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DataController extends Controller
{
    public function index(): View
    {
        $title = 'Tabel Data — SISKA Kalimantan Tengah';
        $openLogin = ! session('username');

        if ($openLogin) {
            // Store a relative URI, not url()->current(). An absolute URL picks up the
            // app's configured host/port, which need not match the host actually being
            // served, and the login redirect then bounces to a dead origin.
            session(['url.intended' => request()->getRequestUri()]);
        }

        return view('frontends.data', compact('title', 'openLogin'));
    }
}
