<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sawitController extends Controller
{
    public function index(){
        $title = 'Dashboard Sawit';
        $nav = 'index';

        $pbs              = $this->getMutasiPBS();
        $pbr              = $this->getMutasiPBR();
        $pengusahaanPBS   = $this->getPengusahaanPBS();
        $pengusahaanPBR   = $this->getPengusahaanPBR();
        $perkebunanbesar  = $this->getPerkebunanBesar();
        $perkebunanrakyat = $this->getPerkebunanRakyat();

        return view('frontends.sawit', compact(
            'title', 'nav',
            'pbs', 'pbr',
            'pengusahaanPBS', 'pengusahaanPBR',
            'perkebunanbesar', 'perkebunanrakyat'
        ));
    }

    private function getMutasiPBS(){
        $mutasi = DB::table('tbsawit')->where('pengusahaan', 'Perkebunan Besar Swasta')->get();
        foreach($mutasi as $item){
            $data['tahun'][] = $item->tahun;
            $data['tbm'][]   = $item->tbm;
            $data['tr'][]    = $item->tr;
            $data['tm'][]    = $item->tm;
        }
        return json_encode($data ?? []);
    }

    private function getMutasiPBR(){
        $mutasi = DB::table('tbsawit')->where('pengusahaan', 'Perkebunan Rakyat')->get();
        foreach($mutasi as $item){
            $data['tahun'][] = $item->tahun;
            $data['tbm'][]   = $item->tbm;
            $data['tr'][]    = $item->tr;
            $data['tm'][]    = $item->tm;
        }
        return json_encode($data ?? []);
    }

    private function getPengusahaanPBS(){
        $rows = DB::table('tbsawit')->where('pengusahaan', 'Perkebunan Besar Swasta')->get();
        foreach($rows as $item){
            $data['tahun'][]     = $item->tahun;
            $data['totalluas'][] = $item->totalluas;
        }
        return json_encode($data ?? []);
    }

    private function getPengusahaanPBR(){
        $rows = DB::table('tbsawit')->where('pengusahaan', 'Perkebunan Rakyat')->get();
        foreach($rows as $item){
            $data['tahun'][]     = $item->tahun;
            $data['totalluas'][] = $item->totalluas;
        }
        return json_encode($data ?? []);
    }

    private function getPerkebunanBesar(){
        $rows = DB::table('tbsawit')->where('pengusahaan', 'Perkebunan Besar Swasta')->get();
        foreach($rows as $item){
            $data['tahun'][]    = $item->tahun;
            $data['produksi'][] = $item->produksi;
        }
        return json_encode($data ?? []);
    }

    private function getPerkebunanRakyat(){
        $rows = DB::table('tbsawit')->where('pengusahaan', 'Perkebunan Rakyat')->get();
        foreach($rows as $item){
            $data['tahun'][]    = $item->tahun;
            $data['produksi'][] = $item->produksi;
        }
        return json_encode($data ?? []);
    }
}
