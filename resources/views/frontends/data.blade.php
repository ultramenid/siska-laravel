@extends('layouts.indexLayout')

@php
    $komoditas = [
        'sawit'  => ['label' => 'Sawit',  'ada' => true],
        'karet'  => ['label' => 'Karet',  'ada' => false],
        'kelapa' => ['label' => 'Kelapa', 'ada' => false],
        'lada'   => ['label' => 'Lada',   'ada' => false],
        'kopi'   => ['label' => 'Kopi',   'ada' => false],
        'kakao'  => ['label' => 'Kakao',  'ada' => false],
    ];
@endphp

@section('content')
    <div class="min-h-screen flex flex-col">
        @include('partials.nav')

        <main id="content" class="flex-1">

            {{-- Header band --}}
            <section class="bg-ink text-white border-b border-ink-line">
                <div class="max-w-[110rem] mx-auto px-5 sm:px-8 py-10 sm:py-14 text-center">
                    <p class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-white/50">Register data</p>

                    <h1 class="mt-3 font-display text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-white">
                        Tabel data perkebunan
                    </h1>

                    <p class="mt-4 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed text-white/70">
                        Luas tanam, produksi dan produktivitas komoditas perkebunan Kalimantan Tengah,
                        dirinci per tahun dan per bentuk pengusahaan.
                    </p>

                    <div class="mt-8 grid gap-2.5 sm:grid-cols-2 max-w-3xl mx-auto">
                        <p class="annot annot-invert justify-center">
                            <span class="annot-label">Periode</span>
                            <span class="annot-rule"></span>
                            <span class="annot-value figure">2010–2021</span>
                        </p>
                        <p class="annot annot-invert justify-center">
                            <span class="annot-label">Sumber</span>
                            <span class="annot-rule"></span>
                            <span class="annot-value">Disbun Kalteng</span>
                        </p>
                    </div>
                </div>
            </section>

            {{-- Register + commodity index --}}
            <div class="max-w-[110rem] mx-auto px-5 sm:px-8 py-10 sm:py-14" x-data="{ sidenav: 'sawit' }">
                <div class="flex flex-col sm:flex-row gap-8 lg:gap-12">

                    {{-- Commodity index: ruled list on desktop, scrolling strip on mobile --}}
                    <div class="sm:w-56 shrink-0 sm:sticky sm:top-6 sm:self-start">
                        <p class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-muted">Komoditas</p>

                        <nav
                            aria-label="Pilih komoditas"
                            class="mt-3 -mx-5 px-5 sm:mx-0 sm:px-0 overflow-x-auto sm:overflow-visible"
                        >
                            <div class="flex sm:flex-col w-max sm:w-auto border-rule sm:border-t">
                                @foreach ($komoditas as $key => $item)
                                    <button
                                        type="button"
                                        @if ($item['ada'])
                                            @click="sidenav = '{{ $key }}'"
                                            :aria-current="sidenav === '{{ $key }}' ? 'true' : 'false'"
                                            :class="sidenav === '{{ $key }}'
                                                ? 'bg-ink text-white border-l-cpo'
                                                : 'bg-white text-ink hover:bg-teal-wash border-l-transparent'"
                                            class="shrink-0 whitespace-nowrap border-b border-r sm:border-r-0 border-rule border-l-2 px-4 py-2.5 text-left font-mono text-xs tracking-[0.04em] transition-colors duration-150 cursor-pointer"
                                        @else
                                            disabled
                                            class="shrink-0 whitespace-nowrap border-b border-r sm:border-r-0 border-rule border-l-2 border-l-transparent bg-paper-dim px-4 py-2.5 text-left font-mono text-xs tracking-[0.04em] text-muted/60 cursor-not-allowed"
                                        @endif
                                    >
                                        <span class="flex items-center justify-between gap-3">
                                            <span>{{ $item['label'] }}</span>
                                            @unless ($item['ada'])
                                                <span class="font-mono text-[0.5625rem] uppercase tracking-[0.1em] text-muted/60">belum ada</span>
                                            @endunless
                                        </span>
                                    </button>
                                @endforeach
                            </div>
                        </nav>
                    </div>

                    {{-- Panels --}}
                    <div class="flex-1 min-w-0">

                        @if (session('username'))
                            <div x-show="sidenav === 'sawit'" x-cloak>
                                <div class="mb-5">
                                    <h2 class="sect-title text-xl sm:text-2xl">Kelapa sawit</h2>
                                    <p class="mt-3 annot">
                                        <span class="annot-label">Satuan</span>
                                        <span class="annot-rule"></span>
                                        <span class="annot-value figure">ha · ton · ton/ha</span>
                                    </p>
                                </div>

                                <livewire:table-sawit/>
                            </div>

                            @foreach ($komoditas as $key => $item)
                                @continue($item['ada'])
                                <div x-show="sidenav === '{{ $key }}'" x-cloak>
                                    <div class="border border-rule bg-white bg-survey px-6 py-16 sm:py-24 text-center">
                                        <p class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-muted">Belum tersedia</p>

                                        <h2 class="mt-3 sect-title text-xl sm:text-2xl">Data {{ $item['label'] }}</h2>

                                        <p class="mx-auto mt-4 max-w-md text-sm leading-relaxed text-ink/70">
                                            Halaman ini akan memuat luas tanam, produksi, produktivitas dan jumlah petani
                                            {{ strtolower($item['label']) }} per tahun — dalam format yang sama dengan tabel sawit,
                                            segera setelah datanya dihimpun Dinas Perkebunan.
                                        </p>

                                        <button
                                            type="button"
                                            @click="sidenav = 'sawit'"
                                            class="btn btn-ghost mt-7 border-rule"
                                        >
                                            Lihat tabel sawit
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="border border-rule bg-white bg-survey px-6 py-16 sm:py-24 text-center">
                                <p class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-muted">Akses terbatas</p>

                                <h2 class="mt-3 sect-title text-xl sm:text-2xl">Masuk untuk melihat tabel</h2>

                                <p class="mx-auto mt-4 max-w-md text-sm leading-relaxed text-ink/70">
                                    Tabel rinci memerlukan kredensial. Gunakan tombol di atas untuk membuka dialog masuk,
                                    atau tunggu dialog ini terbuka secara otomatis.
                                </p>

                                <button
                                    type="button"
                                    x-on:click="$dispatch('open-login')"
                                    class="btn mt-7 border-rule"
                                >
                                    Masuk
                                </button>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </main>

        @include('partials.footer')
    </div>
@endsection
