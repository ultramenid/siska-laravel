<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sawitController extends Controller
{
    public function index(){
        $title = 'Sawit';
        $nav = 'index';
        return view('frontends.sawit',compact('title', 'nav'));
    }

    public function getMutasiPBS(){
        $mutasi = DB::table('tbsawit')->where('pengusahaan', 'Perkebunan Besar Swasta')->get();
        foreach($mutasi as $item){
            $data['tahun'][] = $item->tahun;
            $data['tbm'][] = $item->tbm;
            $data['tr'][] = $item->tr;
            $data['tm'][] = $item->tm;
        }
        //  dd($data);
         return json_encode($data);
    }

    public function getMutasiPBR(){
        $mutasi = DB::table('tbsawit')->where('pengusahaan', 'Perkebunan Rakyat')->get();
        foreach($mutasi as $item){
            $data['tahun'][] = $item->tahun;
            $data['tbm'][] = $item->tbm;
            $data['tr'][] = $item->tr;
            $data['tm'][] = $item->tm;
        }
        //  dd($data);
         return json_encode($data);
    }
    public function mutasitanaman(){
        $title = 'Mutasi Tanaman - Sawit';
        $nav = 'data';
        $pbs = $this->getMutasiPBS();
        return view('frontends.mutasitanaman', compact('title', 'nav', 'pbs'));
    }

    public function mutasitanamanrakyat(){
        $title = 'Mutasi Tanaman - Sawit';
        $nav = 'data';
        $pbr = $this->getMutasiPBR();
        return view('frontends.mutasitanamanrakyat', compact('title', 'nav', 'pbr'));
    }

    public function getPengusahaanPBS(){
        $pengusahaan = DB::table('tbsawit')->where('pengusahaan', 'Perkebunan Besar Swasta')->get();
        foreach($pengusahaan as $item){
            $data['tahun'][] = $item->tahun;
            $data['totalluas'][] = $item->totalluas;
        }
        //  dd($data);
         return json_encode($data);
    }

    public function getPengusahaanPBR(){
        $pengusahaan = DB::table('tbsawit')->where('pengusahaan', 'Perkebunan Rakyat')->get();
        foreach($pengusahaan as $item){
            $data['tahun'][] = $item->tahun;
            $data['totalluas'][] = $item->totalluas;
        }
        //  dd($data);
         return json_encode($data);
    }

    public function pengusahaan(){
        $title = 'Pengusahaan - Sawit';
        $nav = 'data';
        $pengusahaanPBS = $this->getPengusahaanPBS();
        $pengusahaanPBR = $this->getPengusahaanPBR();

        return view('frontends.pengusahaan', compact('title', 'nav', 'pengusahaanPBS', 'pengusahaanPBR'));
    }

    public function getPerkebunanBesar(){
        $perkebunanbesar = DB::table('tbsawit')->where('pengusahaan', 'Perkebunan Besar Swasta')->get();
        foreach($perkebunanbesar as $item){
            $data['tahun'][] = $item->tahun;
            $data['produksi'][] = $item->produksi;
        }
        //  dd($data);
         return json_encode($data);
    }
    public function getPerkebunanRakyat(){
        $perkebunanbesar = DB::table('tbsawit')->where('pengusahaan', 'Perkebunan Rakyat')->get();
        foreach($perkebunanbesar as $item){
            $data['tahun'][] = $item->tahun;
            $data['produksi'][] = $item->produksi;
        }
        //  dd($data);
         return json_encode($data);
    }
    public function perkebunanbesar(){
        $title = 'Perkebunan Besar Swasta - Sawit';
        $nav = 'data';
        $data = $this->getPerkebunanBesar();
        return view('frontends.perkebunanbesar', compact('title','nav', 'data'));
    }

    public function perkebunanrakyat(){
        $title = 'Perkebunan Rakyat - Sawit';
        $nav = 'data';
        $data = $this->getPerkebunanRakyat();
        return view('frontends.perkebunanrakyat', compact('title','nav', 'data'));
    }

    public function getProduksi(){

    }

    public function produksi(){
        $title = 'Produksi - Sawit';
        $nav = 'data';
        $data = $this->getProduksi();
        return view('frontends.produksi', compact('title','nav', 'data'));
    }
}
