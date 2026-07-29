@extends('layouts.indexLayout')

@php
    /**
     * Every parcel in the map below is sized to the land it represents.
     * Only sawit has figures on record; the other five are honestly empty.
     *
     * @var array{tahun: string, luas: float, pbs: float, pr: float, tbm: float, tm: float, tr: float, produksi: float, petani: int, pabrik: int} $sawit
     */
    $ha = fn (float|int $v): string => number_format($v, 0, ',', '.');

    $kosong = ['Karet', 'Kelapa', 'Lada', 'Kopi', 'Kakao'];

    $singkatan = [
        'PBS' => 'Perkebunan Besar Swasta',
        'PR' => 'Perkebunan Rakyat',
        'TM' => 'Tanaman Menghasilkan',
        'TBM' => 'Tanaman Belum Menghasilkan',
        'TR' => 'Tanaman Rusak',
    ];

    $pintu = [
        [
            'label' => 'Dashboard sawit',
            'url' => url('/dashboard/sawit'),
            'desc' => 'Grafik luas, pengusahaan, mutasi tanaman dan produksi, 2010–2021.',
        ],
        [
            'label' => 'Peta perkebunan',
            'url' => url('/map'),
            'desc' => 'Sebaran kebun, izin usaha dan batas wilayah di atas peta interaktif.',
        ],
        [
            'label' => 'Tabel data',
            'url' => url('/data'),
            'desc' => 'Angka per tahun dan kelompok pengusahaan, bisa diurutkan tiap kolom. Perlu masuk.',
        ],
    ];
@endphp

@section('content')
    <div class="min-h-screen flex flex-col">
        @include('partials.nav')

        <main id="content" class="flex-1">

            {{--
                The design carries the page's identity visually (logo + the parcel map),
                so the h1 is for screen readers and search engines. Naming one commodity
                here would misdescribe a portal that covers twelve.
            --}}
            <h1 class="sr-only">SISKA — data komoditas perkebunan Provinsi Kalimantan Tengah</h1>

            {{-- ============================================================
                 Peta parsel: luas blok sebanding dengan luas tanam nyata.
                 ============================================================ --}}
            <div class="grid gap-px bg-rule
                        grid-cols-2
                        sm:grid-cols-3
                        lg:grid-cols-[7fr_3fr_2.4fr] lg:grid-rows-[1.15fr_1fr_0.85fr]
                        lg:min-h-[calc(100dvh-4rem)]">

                {{-- Parsel sawit — komoditas dengan data --}}
                <div class="relative min-w-0 overflow-hidden bg-ink
                            col-span-2 sm:col-span-3 lg:col-span-1 lg:row-span-3
                            min-h-[34rem] sm:min-h-[30rem] lg:min-h-0
                            reveal"
                     style="--d:0ms">

                    <img src="{{ asset('assets/v1/sawitfull.png') }}" alt=""
                         class="absolute inset-0 h-full w-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-tr from-ink via-ink/90 to-ink/60"></div>

                    {{-- Tanda sudut: satu-satunya parsel yang aktif --}}
                    <span aria-hidden="true" class="absolute left-0 top-0 h-16 w-0.5 bg-cpo"></span>
                    <span aria-hidden="true" class="absolute left-0 top-0 h-0.5 w-16 bg-cpo"></span>

                    <div class="relative flex h-full min-w-0 flex-col justify-between gap-8 p-6 sm:p-8 lg:p-10">

                        <div class="min-w-0">
                            <p class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-cpo">
                                Komoditas aktif
                            </p>
                            <h2 class="mt-3 font-display font-bold tracking-tight text-white">
                                <span class="block text-4xl sm:text-5xl lg:text-6xl">Sawit</span>
                                <span class="block text-lg sm:text-xl lg:text-2xl text-white/65">Kalimantan Tengah</span>
                            </h2>
                        </div>

                        <div class="min-w-0">
                            {{-- Angka utama --}}
                            <p class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-white/55">
                                Luas tanam
                            </p>
                            <p class="mt-1 flex flex-wrap items-baseline gap-x-3 gap-y-1">
                                <span class="figure text-4xl sm:text-5xl lg:text-6xl font-medium tracking-tight text-cpo">
                                    {{ $ha($sawit['luas']) }}
                                </span>
                                <span class="font-mono text-sm uppercase tracking-[0.14em] text-white/55">ha</span>
                            </p>

                            {{-- Rincian. Baris sekunder disembunyikan di layar kecil. --}}
                            <div class="mt-6 max-w-md space-y-2">
                                <p class="annot annot-invert">
                                    <span class="annot-label">PBS</span>
                                    <span class="annot-rule"></span>
                                    <span class="annot-value figure">{{ $ha($sawit['pbs']) }} ha</span>
                                </p>
                                <p class="annot annot-invert">
                                    <span class="annot-label">PR</span>
                                    <span class="annot-rule"></span>
                                    <span class="annot-value figure">{{ $ha($sawit['pr']) }} ha</span>
                                </p>
                                <p class="annot annot-invert">
                                    <span class="annot-label">TM</span>
                                    <span class="annot-rule"></span>
                                    <span class="annot-value figure">{{ $ha($sawit['tm']) }} ha</span>
                                </p>
                                <p class="annot annot-invert hidden sm:flex">
                                    <span class="annot-label">TBM</span>
                                    <span class="annot-rule"></span>
                                    <span class="annot-value figure">{{ $ha($sawit['tbm']) }} ha</span>
                                </p>
                                <p class="annot annot-invert">
                                    <span class="annot-label">TR</span>
                                    <span class="annot-rule"></span>
                                    {{-- clay lightened: #a8422a on ink is ~1.9:1 and unreadable --}}
                                    <span class="annot-value figure text-[#e08a6e]">{{ $ha($sawit['tr']) }} ha</span>
                                </p>
                                <p class="annot annot-invert">
                                    <span class="annot-label">Produksi</span>
                                    <span class="annot-rule"></span>
                                    <span class="annot-value figure">{{ $ha($sawit['produksi']) }} ton</span>
                                </p>
                                <p class="annot annot-invert hidden sm:flex">
                                    <span class="annot-label">Petani</span>
                                    <span class="annot-rule"></span>
                                    <span class="annot-value figure">{{ $ha($sawit['petani']) }} orang</span>
                                </p>
                                <p class="annot annot-invert hidden sm:flex">
                                    <span class="annot-label">Pabrik</span>
                                    <span class="annot-rule"></span>
                                    <span class="annot-value figure">{{ $ha($sawit['pabrik']) }} unit</span>
                                </p>
                                <p class="annot annot-invert pt-2">
                                    <span class="annot-label">Data</span>
                                    <span class="annot-rule"></span>
                                    <span class="annot-value figure">{{ $sawit['tahun'] }}</span>
                                </p>
                            </div>

                            <a href="{{ url('/dashboard/sawit') }}"
                               class="mt-8 inline-flex items-center gap-2 rounded-sm border border-white/30 px-4 py-2.5
                                      font-mono text-xs uppercase tracking-[0.08em] text-white
                                      transition-colors hover:bg-white hover:text-ink">
                                Buka dashboard sawit
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Lima parsel tanpa data. Bukan tautan, bukan tombol. --}}
                @foreach ($kosong as $i => $komoditas)
                    <div class="relative flex min-w-0 flex-col justify-center gap-1
                                bg-paper-dim bg-survey p-5 sm:p-6
                                min-h-[7rem] sm:min-h-[8rem] lg:min-h-0
                                {{ $komoditas === 'Kakao' ? 'col-span-2 sm:col-span-2' : '' }}
                                reveal"
                         style="--d:{{ 120 + $i * 70 }}ms">
                        <span class="font-display text-base sm:text-lg lg:text-xl font-bold tracking-tight text-ink/70">
                            {{ $komoditas }}
                        </span>
                        <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-muted">
                            Belum ada data
                        </span>
                    </div>
                @endforeach
            </div>

            {{-- Legenda singkatan --}}
            <div class="border-b border-rule bg-paper-dim">
                <div class="max-w-[110rem] mx-auto px-5 sm:px-8 py-4">
                    <ul class="flex flex-wrap gap-x-6 gap-y-2 font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-muted">
                        @foreach ($singkatan as $kode => $arti)
                            <li><span class="text-ink">{{ $kode }}</span> &mdash; {{ $arti }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- Tiga pintu masuk --}}
            <section class="bg-survey" aria-labelledby="pintu-masuk">
                <div class="max-w-[110rem] mx-auto px-5 sm:px-8 py-14 sm:py-20">
                    <h2 id="pintu-masuk" class="sect-title text-xl sm:text-4xl">Telusuri data</h2>

                    </p>

                    <ul class="mt-10 border-t border-rule">
                        @foreach ($pintu as $i => $item)
                            <li class="border-b border-rule reveal" style="--d:{{ $i * 90 }}ms">
                                <a href="{{ $item['url'] }}"
                                   class="group flex min-w-0 flex-col gap-2 py-6
                                          sm:flex-row sm:items-baseline sm:gap-8
                                          transition-colors hover:bg-white/60">
                                    <h3 class="font-display text-lg sm:text-xl font-bold tracking-tight text-ink
                                               sm:w-64 sm:shrink-0 group-hover:text-teal-deep transition-colors">
                                        {{ $item['label'] }}
                                    </h3>
                                    <p class="min-w-0 flex-1 text-sm sm:text-base leading-relaxed text-ink/80">
                                        {{ $item['desc'] }}
                                    </p>
                                    <span aria-hidden="true"
                                          class="font-mono text-xs text-muted group-hover:text-teal-deep transition-colors">
                                        &rarr;
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </main>

        @include('partials.footer')
    </div>
@endsection
