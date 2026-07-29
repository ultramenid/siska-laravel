@extends('layouts.indexLayout')

@push('head')
    <script src="https://code.highcharts.com/highcharts.js"></script>
@endpush

@section('content')
    <div class="min-h-screen flex flex-col">
        @include('partials.nav')

        <main id="content" class="flex-1">

            {{-- Header band --}}
            <header class="bg-ink text-white">
                <div class="max-w-6xl mx-auto px-5 sm:px-8 py-14 sm:py-20 grid gap-10 lg:grid-cols-[minmax(0,1fr)_18rem] lg:gap-16">
                    <div class="reveal">
                        <p class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-white/55 mb-4">
                            Dashboard komoditas
                        </p>
                        <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight">
                            Dashboard sawit
                        </h1>
                        <p class="mt-5 max-w-2xl text-sm sm:text-base leading-relaxed text-white/70">
                            Luas areal, mutasi tanaman, dan produksi kelapa sawit di Provinsi Kalimantan Tengah,
                            dirinci menurut kelompok pengusahaan.
                        </p>
                    </div>

                    <div class="reveal space-y-3 lg:self-end lg:pb-1" style="--d:120ms">
                        <p class="annot annot-invert">
                            <span class="annot-label">Periode</span>
                            <span class="annot-rule"></span>
                            <span class="annot-value figure">2010&ndash;2021</span>
                        </p>
                        <p class="annot annot-invert">
                            <span class="annot-label">Komoditas</span>
                            <span class="annot-rule"></span>
                            <span class="annot-value">Kelapa sawit</span>
                        </p>
                        <p class="annot annot-invert">
                            <span class="annot-label">Satuan</span>
                            <span class="annot-rule"></span>
                            <span class="annot-value figure">ha &middot; ton</span>
                        </p>
                        <p class="annot annot-invert">
                            <span class="annot-label">Sumber</span>
                            <span class="annot-rule"></span>
                            <span class="annot-value">Disbun Kalteng</span>
                        </p>
                    </div>
                </div>
            </header>

            {{-- Section index --}}
            <nav aria-label="Daftar bagian" class="sticky top-0 z-30 border-b border-rule bg-paper/95 backdrop-blur-sm">
                <div class="max-w-6xl mx-auto px-5 sm:px-8">
                    <ul class="flex items-center gap-5 sm:gap-8 overflow-x-auto py-3 font-mono text-[0.6875rem] uppercase tracking-[0.14em] whitespace-nowrap">
                        <li>
                            <a href="#luas" class="text-muted hover:text-teal-deep transition-colors">
                                <span class="text-ink/40 figure">01</span> Luas &amp; pengusahaan
                            </a>
                        </li>
                        <li>
                            <a href="#mutasi" class="text-muted hover:text-teal-deep transition-colors">
                                <span class="text-ink/40 figure">02</span> Mutasi tanaman
                            </a>
                        </li>
                        <li>
                            <a href="#produksi" class="text-muted hover:text-teal-deep transition-colors">
                                <span class="text-ink/40 figure">03</span> Produksi
                            </a>
                        </li>
                        <li>
                            <a href="#pabrik" class="text-muted hover:text-teal-deep transition-colors">
                                <span class="text-ink/40 figure">04</span> Pabrik
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="max-w-6xl mx-auto px-5 sm:px-8 py-14 sm:py-20 space-y-20 sm:space-y-24">

                {{-- 01 — Luas & pengusahaan --}}
                <section id="luas" class="scroll-mt-20" aria-labelledby="luas-title">
                    <h2 id="luas-title" class="sect-title text-xl sm:text-2xl">Luas &amp; pengusahaan</h2>
                    <p class="mt-3 max-w-2xl text-sm sm:text-base leading-relaxed text-ink/80">
                        Total luas areal kelapa sawit, ditumpuk menurut kelompok pengusahaan &mdash;
                        Perkebunan Besar Swasta di atas Perkebunan Rakyat.
                    </p>
                    <p class="annot mt-6">
                        <span class="annot-label">Satuan</span>
                        <span class="annot-rule"></span>
                        <span class="annot-value figure">hektare</span>
                    </p>
                    <p class="annot mt-2">
                        <span class="annot-label">Seri</span>
                        <span class="annot-rule"></span>
                        <span class="annot-value figure">2 kelompok pengusahaan</span>
                    </p>

                    <div class="card mt-6 p-4 sm:p-6">
                        <div class="overflow-x-auto">
                            <div id="chart-pengusahaan" class="min-w-[19rem]" role="img"
                                 aria-label="Grafik area bertumpuk luas areal kelapa sawit Kalimantan Tengah 2010 sampai 2021, dalam hektare, dipisah antara Perkebunan Besar Swasta dan Perkebunan Rakyat."></div>
                        </div>
                    </div>
                </section>

                {{-- 02 — Mutasi tanaman --}}
                <section id="mutasi" class="scroll-mt-20" aria-labelledby="mutasi-title">
                    <h2 id="mutasi-title" class="sect-title text-xl sm:text-2xl">Mutasi tanaman</h2>
                    <p class="mt-3 max-w-2xl text-sm sm:text-base leading-relaxed text-ink/80">
                        Komposisi tanaman menurut tahap pertumbuhan pada kedua kelompok pengusahaan.
                        Warna seri sama pada kedua grafik, tetapi <strong class="font-semibold text-ink">skala
                        sumbu tegak berbeda</strong> — luas Perkebunan Rakyat sekitar seperempat luas
                        Perkebunan Besar Swasta. Bandingkan bentuk komposisinya, bukan tinggi bidangnya.
                    </p>
                    <p class="annot mt-6">
                        <span class="annot-label">Satuan</span>
                        <span class="annot-rule"></span>
                        <span class="annot-value figure">hektare</span>
                    </p>
                    <p class="annot mt-2">
                        <span class="annot-label">Seri</span>
                        <span class="annot-rule"></span>
                        <span class="annot-value figure">3 tahap &times; 2 kelompok</span>
                    </p>

                    {{-- Istilah --}}
                    <dl class="mt-6 border-t border-rule text-sm">
                        <div class="flex flex-col sm:flex-row sm:items-baseline gap-1 sm:gap-4 border-b border-rule py-2.5">
                            <dt class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-muted sm:w-24 shrink-0">TBM</dt>
                            <dd class="text-ink/80">Tanaman Belum Menghasilkan</dd>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-baseline gap-1 sm:gap-4 border-b border-rule py-2.5">
                            <dt class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-muted sm:w-24 shrink-0">TM</dt>
                            <dd class="text-ink/80">Tanaman Menghasilkan</dd>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-baseline gap-1 sm:gap-4 border-b border-rule py-2.5">
                            <dt class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-muted sm:w-24 shrink-0">TR</dt>
                            <dd class="text-ink/80">Tanaman Rusak</dd>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-baseline gap-1 sm:gap-4 border-b border-rule py-2.5">
                            <dt class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-muted sm:w-24 shrink-0">PBS</dt>
                            <dd class="text-ink/80">Perkebunan Besar Swasta</dd>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-baseline gap-1 sm:gap-4 border-b border-rule py-2.5">
                            <dt class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-muted sm:w-24 shrink-0">PR</dt>
                            <dd class="text-ink/80">Perkebunan Rakyat</dd>
                        </div>
                    </dl>

                    <div class="mt-6 grid gap-6 lg:grid-cols-2">
                        <div class="card p-4 sm:p-6">
                            <h3 class="font-display text-base font-bold tracking-tight text-ink">Perkebunan Besar Swasta</h3>
                            <p class="annot mt-3 mb-4">
                                <span class="annot-label">Kelompok</span>
                                <span class="annot-rule"></span>
                                <span class="annot-value figure">PBS</span>
                            </p>
                            <div class="overflow-x-auto">
                                <div id="chart-mutasi-pbs" class="min-w-[19rem]" role="img"
                                     aria-label="Grafik area bertumpuk mutasi tanaman Perkebunan Besar Swasta 2010 sampai 2021, dalam hektare, dipisah antara tanaman belum menghasilkan, tanaman menghasilkan, dan tanaman rusak."></div>
                            </div>
                        </div>

                        <div class="card p-4 sm:p-6">
                            <h3 class="font-display text-base font-bold tracking-tight text-ink">Perkebunan Rakyat</h3>
                            <p class="annot mt-3 mb-4">
                                <span class="annot-label">Kelompok</span>
                                <span class="annot-rule"></span>
                                <span class="annot-value figure">PR</span>
                            </p>
                            <div class="overflow-x-auto">
                                <div id="chart-mutasi-pbr" class="min-w-[19rem]" role="img"
                                     aria-label="Grafik area bertumpuk mutasi tanaman Perkebunan Rakyat 2010 sampai 2021, dalam hektare, dipisah antara tanaman belum menghasilkan, tanaman menghasilkan, dan tanaman rusak."></div>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- 03 — Produksi --}}
                <section id="produksi" class="scroll-mt-20" aria-labelledby="produksi-title">
                    <h2 id="produksi-title" class="sect-title text-xl sm:text-2xl">Produksi</h2>
                    <p class="mt-3 max-w-2xl text-sm sm:text-base leading-relaxed text-ink/80">
                        Produksi tandan buah segar per tahun, dibandingkan berdampingan antara kedua
                        kelompok pengusahaan. Perhatikan bahwa sumbu tegak kedua grafik berdiri sendiri.
                    </p>
                    <p class="annot mt-6">
                        <span class="annot-label">Satuan</span>
                        <span class="annot-rule"></span>
                        <span class="annot-value figure">ton</span>
                    </p>
                    <p class="annot mt-2">
                        <span class="annot-label">Periode</span>
                        <span class="annot-rule"></span>
                        <span class="annot-value figure">2010&ndash;2021</span>
                    </p>

                    <div class="mt-6 grid gap-6 lg:grid-cols-2">
                        <div class="card p-4 sm:p-6">
                            <h3 class="font-display text-base font-bold tracking-tight text-ink">Perkebunan Besar Swasta</h3>
                            <p class="annot mt-3 mb-4">
                                <span class="annot-label">Satuan</span>
                                <span class="annot-rule"></span>
                                <span class="annot-value figure">ton</span>
                            </p>
                            <div class="overflow-x-auto">
                                <div id="chart-perkebunanbesar" class="min-w-[19rem]" role="img"
                                     aria-label="Grafik garis produksi kelapa sawit Perkebunan Besar Swasta 2010 sampai 2021, dalam ton."></div>
                            </div>
                        </div>

                        <div class="card p-4 sm:p-6">
                            <h3 class="font-display text-base font-bold tracking-tight text-ink">Perkebunan Rakyat</h3>
                            <p class="annot mt-3 mb-4">
                                <span class="annot-label">Satuan</span>
                                <span class="annot-rule"></span>
                                <span class="annot-value figure">ton</span>
                            </p>
                            <div class="overflow-x-auto">
                                <div id="chart-perkebunanrakyat" class="min-w-[19rem]" role="img"
                                     aria-label="Grafik garis produksi kelapa sawit Perkebunan Rakyat 2010 sampai 2021, dalam ton."></div>
                            </div>
                        </div>
                    </div>

                    {{-- Placeholder --}}
                    <div class="mt-6 border border-dashed border-rule bg-paper-dim/60 rounded-sm px-5 py-8 sm:px-8">
                        <p class="annot">
                            <span class="annot-label">Produktivitas</span>
                            <span class="annot-rule"></span>
                            <span class="annot-value figure">Segera hadir</span>
                        </p>
                        <p class="mt-4 max-w-2xl text-sm leading-relaxed text-muted">
                            Rincian produksi per kabupaten dan produktivitas per hektare belum tersedia
                            pada rilis ini.
                        </p>
                    </div>
                </section>

                {{-- 04 — Pabrik --}}
                <section id="pabrik" class="scroll-mt-20" aria-labelledby="pabrik-title">
                    <h2 id="pabrik-title" class="sect-title text-xl sm:text-2xl">Pabrik</h2>
                    <p class="mt-3 max-w-2xl text-sm sm:text-base leading-relaxed text-ink/80">
                        Sebaran pabrik kelapa sawit di Kalimantan Tengah, disajikan dari laporan
                        Google Data Studio Dinas Perkebunan.
                    </p>
                    <p class="annot mt-6">
                        <span class="annot-label">Sumber</span>
                        <span class="annot-rule"></span>
                        <span class="annot-value">Google Data Studio &mdash; Disbun Kalteng</span>
                    </p>

                    <div class="mt-6 overflow-x-auto">
                        <iframe
                            src="https://datastudio.google.com/embed/reporting/d72b87aa-45b2-48c2-b9e2-315f98e5e41a/page/rTMvC"
                            title="Laporan sebaran pabrik kelapa sawit Kalimantan Tengah"
                            loading="lazy"
                            frameborder="0"
                            allowfullscreen
                            class="w-full min-w-[19rem] h-[60vh] sm:h-[80vh] border border-rule rounded-sm bg-white"></iframe>
                    </div>
                </section>

            </div>
        </main>

        @include('partials.footer')
    </div>
@endsection

@push('script')
<script>
    var pengusahaanPBS   = JSON.parse('<?php echo $pengusahaanPBS; ?>');
    var pengusahaanPBR   = JSON.parse('<?php echo $pengusahaanPBR; ?>');
    var mutasiPBS        = JSON.parse('<?php echo $pbs; ?>');
    var mutasiPBR        = JSON.parse('<?php echo $pbr; ?>');
    var perkebunanbesar  = JSON.parse('<?php echo $perkebunanbesar; ?>');
    var perkebunanrakyat = JSON.parse('<?php echo $perkebunanrakyat; ?>');

    // Indonesian number format everywhere. Must run before any Highcharts.chart() call.
    // numericSymbols: null keeps axis labels as 1.500.000 rather than "1.5M".
    Highcharts.setOptions({
        lang: { thousandsSep: '.', decimalPoint: ',', numericSymbols: null }
    });

    var MONO = "'IBM Plex Mono', monospace";
    var RULE = '#d5d6d0';
    var INK  = '#132822';
    var MUTED = '#6e756f';

    // Entity colours: PBS = cpo orange, PR = teal. Growth stages: TBM cpo, TM teal, TR clay.
    var brandColors = ['#c8761e', '#009180', '#132822', '#a8422a', '#214036'];

    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    var labelStyle = { color: MUTED, fontSize: '11px', fontFamily: MONO };

    // Shared tooltip in Indonesian, with the unit appended to every figure.
    function tooltipFormatter(unit) {
        return function () {
            var out = '<span style="font-family:' + MONO + ';font-size:10px;letter-spacing:.1em;opacity:.6">'
                + this.x + '</span>';
            this.points.forEach(function (p) {
                out += '<br><span style="color:' + p.color + '">■</span> '
                    + p.series.name
                    + ' <b style="font-family:' + MONO + '">'
                    + Highcharts.numberFormat(p.y, 0) + ' ' + unit + '</b>';
            });
            return out;
        };
    }

    var tooltipBase = {
        shared: true,
        useHTML: false,
        backgroundColor: INK,
        borderWidth: 0,
        borderRadius: 2,
        shadow: false,
        style: { color: '#ffffff', fontSize: '11px' }
    };

    var areaDefaults = {
        credits: false,
        title: { text: '' },
        accessibility: { enabled: false },
        colors: brandColors,
        chart: {
            type: 'area',
            height: 340,
            backgroundColor: 'transparent',
            spacingLeft: 0,
            spacingRight: 0,
            style: { fontFamily: MONO }
        },
        yAxis: {
            title: { text: '' },
            lineWidth: 0,
            gridLineColor: RULE,
            gridLineWidth: 1,
            labels: {
                style: labelStyle,
                formatter: function () { return Highcharts.numberFormat(this.value, 0); }
            }
        },
        xAxis: {
            lineColor: RULE,
            tickColor: RULE,
            gridLineWidth: 0,
            // Numeric x-axis: render the year raw so thousandsSep never turns 2010 into 2.010.
            labels: {
                style: labelStyle,
                formatter: function () { return String(this.value); }
            }
        },
        legend: {
            align: 'left',
            verticalAlign: 'bottom',
            borderWidth: 0,
            symbolRadius: 2,
            itemStyle: { color: '#214036', fontSize: '11px', fontFamily: MONO, fontWeight: '400' },
            itemHoverStyle: { color: INK }
        },
        tooltip: Highcharts.merge({}, tooltipBase, { formatter: tooltipFormatter('ha') }),
        plotOptions: {
            series: {
                pointStart: 2010,
                animation: !reduceMotion
            },
            area: {
                stacking: 'normal',
                lineWidth: 2,
                fillOpacity: 0.85,
                marker: { enabled: false, radius: 4, lineWidth: 1, symbol: 'circle', states: { hover: { radius: 5 } } }
            }
        }
    };

    var splineDefaults = {
        credits: false,
        title: { text: '' },
        accessibility: { enabled: false },
        colors: brandColors,
        chart: {
            type: 'spline',
            height: 340,
            backgroundColor: 'transparent',
            spacingLeft: 0,
            spacingRight: 0,
            style: { fontFamily: MONO }
        },
        yAxis: {
            title: { text: '' },
            lineWidth: 0,
            gridLineColor: RULE,
            gridLineWidth: 1,
            labels: {
                style: labelStyle,
                formatter: function () { return Highcharts.numberFormat(this.value, 0); }
            }
        },
        xAxis: {
            lineColor: RULE,
            tickColor: RULE,
            gridLineWidth: 0,
            crosshair: { color: RULE, width: 1 },
            labels: { style: labelStyle }
        },
        // Single-series charts: the card heading names the series, so a legend box
        // would repeat it. Styling kept here so `enabled: true` restores it.
        legend: {
            enabled: false,
            align: 'left',
            verticalAlign: 'bottom',
            borderWidth: 0,
            symbolRadius: 2,
            itemStyle: { color: '#214036', fontSize: '11px', fontFamily: MONO, fontWeight: '400' },
            itemHoverStyle: { color: INK }
        },
        tooltip: Highcharts.merge({}, tooltipBase, { formatter: tooltipFormatter('ton') }),
        plotOptions: {
            series: { animation: !reduceMotion },
            spline: {
                lineWidth: 2,
                marker: { radius: 4, lineWidth: 2, lineColor: '#ffffff', symbol: 'circle' }
            }
        }
    };

    Highcharts.chart('chart-pengusahaan', Highcharts.merge({}, areaDefaults, {
        series: [
            { name: 'Perkebunan Besar Swasta', color: '#c8761e', data: pengusahaanPBS.totalluas },
            { name: 'Perkebunan Rakyat', color: '#009180', data: pengusahaanPBR.totalluas }
        ]
    }));

    Highcharts.chart('chart-mutasi-pbs', Highcharts.merge({}, areaDefaults, {
        series: [
            { name: 'TBM — belum menghasilkan', color: '#c8761e', data: mutasiPBS.tbm },
            { name: 'TM — menghasilkan', color: '#009180', data: mutasiPBS.tm },
            { name: 'TR — rusak', color: '#a8422a', data: mutasiPBS.tr }
        ]
    }));

    Highcharts.chart('chart-mutasi-pbr', Highcharts.merge({}, areaDefaults, {
        series: [
            { name: 'TBM — belum menghasilkan', color: '#c8761e', data: mutasiPBR.tbm },
            { name: 'TM — menghasilkan', color: '#009180', data: mutasiPBR.tm },
            { name: 'TR — rusak', color: '#a8422a', data: mutasiPBR.tr }
        ]
    }));

    Highcharts.chart('chart-perkebunanbesar', Highcharts.merge({}, splineDefaults, {
        xAxis: { categories: perkebunanbesar.tahun },
        series: [{ name: 'Perkebunan Besar Swasta', color: '#c8761e', data: perkebunanbesar.produksi }]
    }));

    Highcharts.chart('chart-perkebunanrakyat', Highcharts.merge({}, splineDefaults, {
        xAxis: { categories: perkebunanrakyat.tahun },
        series: [{ name: 'Perkebunan Rakyat', color: '#009180', data: perkebunanrakyat.produksi }]
    }));
</script>
@endpush
