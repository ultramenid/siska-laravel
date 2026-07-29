<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index(): View
    {
        return view('frontends.index', [
            'title' => 'SISKA — Sistem Informasi Komoditas Perkebunan Kalimantan Tengah',
            'sawit' => $this->latestSawitFigures(),
        ]);
    }

    /**
     * Headline figures for the most recent year on record.
     *
     * @return array{tahun: string, luas: float, pbs: float, pr: float, tbm: float, tm: float, tr: float, produksi: float, petani: int, pabrik: int}
     */
    private function latestSawitFigures(): array
    {
        $rows = DB::table('tbsawit')
            ->where('komoditas', 'Sawit')
            ->whereRaw('tahun = (select max(tahun) from tbsawit where komoditas = ?)', ['Sawit'])
            ->get();

        return [
            'tahun' => (string) ($rows->first()->tahun ?? '—'),
            'luas' => (float) $rows->sum('totalluas'),
            'pbs' => (float) ($rows->firstWhere('pengusahaan', 'Perkebunan Besar Swasta')->totalluas ?? 0),
            'pr' => (float) ($rows->firstWhere('pengusahaan', 'Perkebunan Rakyat')->totalluas ?? 0),
            'tbm' => (float) $rows->sum('tbm'),
            'tm' => (float) $rows->sum('tm'),
            'tr' => (float) $rows->sum('tr'),
            'produksi' => (float) $rows->sum('produksi'),
            'petani' => (int) $rows->sum('petani'),
            // ponytail: mill count is not in tbsawit, it lives in the GeoServer layer.
            // Swap for a query when that layer is exposed to the app.
            'pabrik' => 127,
        ];
    }
}
