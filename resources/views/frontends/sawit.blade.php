@extends('layouts.indexLayout')

@section('content')
    <section class="w-full">
        @include('partials.navMobile')
        @include('partials.nav')

        {{-- Hero --}}
        <div class="w-full flex items-center justify-center" style="background-color: #132822; min-height: 28vh;">
            <div class="text-center px-6 py-12">
                <h1 class="text-4xl sm:text-5xl font-bold text-white mb-3">Dashboard Sawit</h1>
                <p class="text-white text-base sm:text-lg opacity-80">Sistem Informasi Perkebunan Kelapa Sawit Kalimantan Tengah</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 py-12 space-y-16">

            {{-- Pengusahaan --}}
            <div>
                <h2 class="text-xl font-semibold text-gray-900 mb-2">Pengusahaan</h2>
                <div class="w-10 h-1 mb-6" style="background-color: #009180;"></div>
                <div id="chart-pengusahaan"></div>
            </div>

            <hr class="border-gray-200">

            {{-- Mutasi Tanaman --}}
            <div>
                <h2 class="text-xl font-semibold text-gray-900 mb-2">Mutasi Tanaman — Perkebunan Besar Swasta</h2>
                <div class="w-10 h-1 mb-6" style="background-color: #009180;"></div>
                <div id="chart-mutasi-pbs"></div>
            </div>

            <hr class="border-gray-200">

            <div>
                <h2 class="text-xl font-semibold text-gray-900 mb-2">Mutasi Tanaman — Perkebunan Rakyat</h2>
                <div class="w-10 h-1 mb-6" style="background-color: #009180;"></div>
                <div id="chart-mutasi-pbr"></div>
            </div>

            <hr class="border-gray-200">

            {{-- Perkebunan Besar --}}
            <div>
                <h2 class="text-xl font-semibold text-gray-900 mb-2">Perkebunan Besar Swasta</h2>
                <div class="w-10 h-1 mb-6" style="background-color: #009180;"></div>
                <div id="chart-perkebunanbesar"></div>
            </div>

            <hr class="border-gray-200">

            {{-- Perkebunan Rakyat --}}
            <div>
                <h2 class="text-xl font-semibold text-gray-900 mb-2">Perkebunan Rakyat</h2>
                <div class="w-10 h-1 mb-6" style="background-color: #009180;"></div>
                <div id="chart-perkebunanrakyat"></div>
            </div>

            <hr class="border-gray-200">

            {{-- Produksi --}}
            <div>
                <h2 class="text-xl font-semibold text-gray-900 mb-2">Produksi</h2>
                <div class="w-10 h-1 mb-6" style="background-color: #009180;"></div>
                <div class="flex flex-col items-center justify-center py-16 text-center">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mb-4" style="background-color: #e6f4f2;">
                        <svg class="w-8 h-8" style="color: #009180;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-1">Data Produksi</h3>
                    <p class="text-sm text-gray-400">Segera hadir</p>
                </div>
            </div>

            <hr class="border-gray-200">

            {{-- Pabrik --}}
            <div>
                <h2 class="text-xl font-semibold text-gray-900 mb-2">Pabrik</h2>
                <div class="w-10 h-1 mb-6" style="background-color: #009180;"></div>
                <iframe style="height: 80vh; width: 100%;" src="https://datastudio.google.com/embed/reporting/d72b87aa-45b2-48c2-b9e2-315f98e5e41a/page/rTMvC" frameborder="0" allowfullscreen class="rounded-xl border border-gray-200"></iframe>
            </div>

        </div>

        @include('partials.footer')
    </section>
@endsection

@push('script')
<script>
    var pengusahaanPBS   = JSON.parse('<?php echo $pengusahaanPBS ?>');
    var pengusahaanPBR   = JSON.parse('<?php echo $pengusahaanPBR ?>');
    var mutasiPBS        = JSON.parse('<?php echo $pbs ?>');
    var mutasiPBR        = JSON.parse('<?php echo $pbr ?>');
    var perkebunanbesar  = JSON.parse('<?php echo $perkebunanbesar ?>');
    var perkebunanrakyat = JSON.parse('<?php echo $perkebunanrakyat ?>');

    Highcharts.chart('chart-pengusahaan', {
        chart: { type: 'area', height: 470 },
        credits: false,
        title: { text: '' },
        yAxis: { title: { text: '' } },
        tooltip: { shared: true, headerFormat: '<span style="font-size:12px"><b>{point.key}</b></span><br>' },
        plotOptions: {
            series: { pointStart: 2010 },
            area: { stacking: 'normal', lineColor: '#666666', lineWidth: 1, marker: { lineWidth: 1, lineColor: '#666666' } }
        },
        series: [
            { name: 'Perkebunan Besar Swasta', data: pengusahaanPBS.totalluas },
            { name: 'Perkebunan Rakyat', data: pengusahaanPBR.totalluas }
        ]
    });

    Highcharts.chart('chart-mutasi-pbs', {
        chart: { type: 'area', height: 470 },
        credits: false,
        title: { text: '' },
        yAxis: { title: { text: '' } },
        tooltip: { shared: true, headerFormat: '<span style="font-size:12px"><b>{point.key}</b></span><br>' },
        plotOptions: {
            series: { pointStart: 2010 },
            area: { stacking: 'normal', lineColor: '#666666', lineWidth: 1, marker: { lineWidth: 1, lineColor: '#666666' } }
        },
        series: [
            { name: 'Tanaman Belum Menghasilkan (ha)', data: mutasiPBS.tbm },
            { name: 'Tanaman Menghasilkan (ha)', data: mutasiPBS.tm },
            { name: 'Tanaman Rusak (ha)', data: mutasiPBS.tr }
        ]
    });

    Highcharts.chart('chart-mutasi-pbr', {
        chart: { type: 'area', height: 470 },
        credits: false,
        title: { text: '' },
        yAxis: { title: { text: '' } },
        tooltip: { shared: true, headerFormat: '<span style="font-size:12px"><b>{point.key}</b></span><br>' },
        plotOptions: {
            series: { pointStart: 2010 },
            area: { stacking: 'normal', lineColor: '#666666', lineWidth: 1, marker: { lineWidth: 1, lineColor: '#666666' } }
        },
        series: [
            { name: 'Tanaman Belum Menghasilkan (ha)', data: mutasiPBR.tbm },
            { name: 'Tanaman Menghasilkan (ha)', data: mutasiPBR.tm },
            { name: 'Tanaman Rusak (ha)', data: mutasiPBR.tr }
        ]
    });

    Highcharts.chart('chart-perkebunanbesar', {
        chart: { type: 'spline', height: 470 },
        credits: false,
        title: { text: '' },
        xAxis: { categories: perkebunanbesar.tahun },
        yAxis: { title: { text: '' }, labels: { format: '{value} ton' } },
        tooltip: { crosshairs: true, shared: true },
        plotOptions: { spline: { marker: { radius: 4, lineColor: '#666666', lineWidth: 1 } } },
        series: [{ name: 'Perkebunan Besar Swasta', marker: { symbol: 'diamond' }, data: perkebunanbesar.produksi }]
    });

    Highcharts.chart('chart-perkebunanrakyat', {
        chart: { type: 'spline', height: 470 },
        credits: false,
        title: { text: '' },
        xAxis: { categories: perkebunanrakyat.tahun },
        yAxis: { title: { text: '' }, labels: { format: '{value} ton' } },
        tooltip: { crosshairs: true, shared: true },
        plotOptions: { spline: { marker: { radius: 4, lineColor: '#666666', lineWidth: 1 } } },
        series: [{ name: 'Perkebunan Rakyat', marker: { symbol: 'diamond' }, data: perkebunanrakyat.produksi }]
    });
</script>
@endpush
