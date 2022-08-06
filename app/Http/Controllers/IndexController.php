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

    // public function getTotalPabrik(){
    //     $req = Http::get('https://aws.simontini.id/geoserver/wfs',
    //         [
    //             'service' => 'wfs',
    //             'version' => '1.1.1',
    //             'request' => 'GetFeature',
    //             'typename' => 'siska:Pabrik_Kelapa_Sawit_New_1',
    //             'featurename' =>'perusahaan',
    //             'outputFormat' => 'application/json',
    //         ]);
    //         $response = json_decode($req->getBody()->getContents(), true);
    //         // dd($response);
    //         return $response['numberMatched'];
    // }
    public function getTotalIzin(){
        $req = Http::get('https://aws.simontini.id/geoserver/wfs',
            [
                'service' => 'wfs',
                'version' => '1.1.1',
                'request' => 'GetFeature',
                'typename' => 'siska:Kalimantan Tengah - Analisis Izin Sawit',
                'propertyName' => 'name_obj',
                'outputFormat' => 'application/json',
            ]);
            $response = json_decode($req, true);
            // $arrUnique = array_unique($response['features'][0]['properties']['provinsi']);

            $res = array();
            foreach ($response['features'] as $each) {
                if (isset($res[$each['properties']['name_obj']]))
                    array_push($res[$each['properties']['name_obj']], $each['properties']['name_obj']);
                else
                    $res[$each['properties']['name_obj']] = array($each['properties']['name_obj']);
                }
            return count($res);
    }
    public function index(){
        $ispo = $this->getISPO();
        $nonispo = $this->getNonISPO();
        // $totalpabrik = $this->getTotalPabrik();
        $totalizin = $this->getTotalIzin();
        $nav = 'index';
        $title = 'Index - Sistem Informasi Perkebunan Kelapa Sawit Kalimantan Tengah';
        return view('frontends.index', compact('title', 'ispo', 'nonispo', 'nav',  'totalizin'));
    }
}
