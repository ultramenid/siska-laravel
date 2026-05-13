<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{

    public function index(){
        if(!session('username')){
            return redirect('/login');
        }
        $title = 'Data - Sawit kalteng';
        return view('frontends.data', compact('title'));
    }
}
