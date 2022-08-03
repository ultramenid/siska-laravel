<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class IndexController extends Controller
{
    public function getISPO(){
            $req = Http::get('https://aws.simontini.id/geoserver/wfs',
            [
                'service' => 'wfs',
                'version' => '1.1.1',
                'request' => 'GetFeature',
                'typename' => 'siska:Pabrik_Kelapa_Sawit_New_1',
                'cql_filter' => "sertifikasi='ISPO'",
                'outputFormat' => 'application/json',
            ]);
            $response = json_decode($req->getBody()->getContents(), true);
            return $response['numberMatched'];
       
    }
    public function getNonISPO(){
        $req = Http::get('https://aws.simontini.id/geoserver/wfs',
            [
                'service' => 'wfs',
                'version' => '1.1.1',
                'request' => 'GetFeature',
                'typename' => 'siska:Pabrik_Kelapa_Sawit_New_1',
                'cql_filter' => "sertifikasi='Non ISPO'",
                'outputFormat' => 'application/json',
            ]);
            $response = json_decode($req->getBody()->getContents(), true);
            return $response['numberMatched'];
    }
    public function index(){
        $ispo = $this->getISPO();
        $nonispo = $this->getNonISPO();
        $nav = 'index';
        $title = 'Index - Sistem Informasi Perkebunan Kelapa Sawit Kalimantan Tengah';
        return view('frontends.index', compact('title', 'ispo', 'nonispo', 'nav'));
    }
}
