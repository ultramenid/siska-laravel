@extends('layouts.indexLayout')

@php
    $prinsip = [
        ['nama' => 'Terukur',      'teks' => 'Perencanaan, pengendalian dan pengawasan perkebunan menjadi lebih terukur dengan basis data yang kredibel dan terintegrasi.'],
        ['nama' => 'Berkeadilan',  'teks' => 'Perkembangan usaha perkebunan tidak hanya terpusat pada perkebunan skala besar, tetapi berdampak langsung pada perkebunan rakyat.'],
        ['nama' => 'Berkelanjutan','teks' => 'Pengembangan perkebunan selaras dengan daya dukung dan daya tampung lingkungan, sebagai bentuk komitmen pembangunan berkelanjutan.'],
    ];

    $manfaat = [
        ['bagi' => 'Pemerintah Daerah', 'teks' => 'Memudahkan Pemerintah Provinsi dan Kabupaten/Kota menghimpun serta menyajikan data secara cepat untuk mendukung perencanaan, pengawasan dan pengendalian perizinan.'],
        ['bagi' => 'Pemerintah Pusat',  'teks' => 'Memudahkan Pemerintah Pusat mengintegrasikan data untuk pengawasan kepatuhan perizinan, kewajiban keuangan dan kewajiban lingkungan.'],
        ['bagi' => 'Pelaku Usaha',      'teks' => 'Memungkinkan pelaku usaha mengidentifikasi potensi pasokan bahan baku dan mengawasi rantai pasok dari perkebunan rakyat.'],
    ];

    $faqs = [
        ['q' => 'Apa itu SISKA?',
         'a' => 'SISKA adalah platform yang menyajikan data dan informasi perkembangan perkebunan sawit di Provinsi Kalimantan Tengah.'],
        ['q' => 'Sumber Data?',
         'a' => 'Data yang ditampilkan dalam SISKA bersumber dari Dinas Perkebunan Provinsi Kalimantan Tengah dan Dinas Perkebunan Kabupaten/Kota di Kalimantan Tengah.'],
        ['q' => 'Bagaimana cara mengakses SISKA?',
         'a' => 'Akses SISKA dibuka untuk publik. Kredensial akses (nama pengguna dan kata sandi) diberikan kepada instansi atau lembaga yang mengajukannya secara formal kepada pengelola SISKA.'],
        ['q' => 'Seberapa sering data diperbarui?',
         'a' => 'Pemutakhiran data dilakukan secara periodik. Setiap data yang ditampilkan disertai informasi waktu atau usia data.'],
    ];
@endphp

@section('content')
    <div class="min-h-screen flex flex-col">
        @include('partials.nav')

        <main id="content" class="flex-1">

            {{-- Hero — centered ink band --}}
            <section class="bg-ink border-b border-ink-line">
                <div class="max-w-6xl mx-auto px-5 sm:px-8 py-16 sm:py-20 lg:py-24 text-center">
                    <div class="max-w-3xl mx-auto reveal">

                        <h1 class="mt-6 font-display text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-white">
                            Tentang SISKA
                        </h1>
                        <p class="mt-5 text-sm sm:text-base leading-relaxed text-white/70 max-w-prose mx-auto">
                            Sistem Informasi Komoditas Perkebunan Kalimantan Tengah — satu pintu data
                            perkebunan provinsi, dari perizinan hingga perkebunan rakyat.
                        </p>
                    </div>
                </div>
            </section>

            {{-- Tentang --}}
            <section class="max-w-6xl mx-auto px-5 sm:px-8 py-12 sm:py-16">
                <div class="grid gap-8 lg:grid-cols-[minmax(0,16rem)_1fr] lg:gap-14">
                    <div class="lg:pt-1">
                        <p class="annot">
                            <span class="annot-rule"></span>
                        </p>
                        <h2 class="sect-title text-xl sm:text-2xl mt-4">Tentang</h2>
                    </div>
                    <div class="max-w-prose space-y-4 text-sm sm:text-base leading-relaxed text-ink/80">
                        <p>
                            Sistem Informasi Komoditas Perkebunan Kalimantan Tengah menyajikan data dan
                            informasi komoditas perkebunan di Provinsi Kalimantan Tengah, meliputi sawit,
                            karet, kelapa, lada, kopi, kakao, pinang, aren, jambu mete, kemiri, kapuk randu,
                            dan cengkeh.
                        </p>
                        <p>
                            Platform ini dikelola oleh Dinas Perkebunan Provinsi Kalimantan Tengah sebagai
                            upaya mendukung transparansi dan aksesibilitas data perkebunan bagi seluruh
                            pemangku kepentingan.
                        </p>
                    </div>
                </div>
            </section>

            {{-- Tujuan — the page's one moment of weight --}}
            <section class="border-t border-rule">
                <div class="max-w-6xl mx-auto px-5 sm:px-8 py-12 sm:py-16">
                    <div class="grid gap-8 lg:grid-cols-[minmax(0,16rem)_1fr] lg:gap-14">
                        <div class="lg:pt-1">
                            <p class="annot">
                                <span class="annot-rule"></span>
                            </p>
                            <h2 class="sect-title text-xl sm:text-2xl mt-4">Tujuan</h2>
                        </div>
                        <div>
                            <p class="max-w-prose text-sm sm:text-base leading-relaxed text-ink/80">
                                Mendukung penerapan <em class="not-italic text-ink">decision support system</em>
                                untuk perencanaan, pengawasan dan pengendalian usaha perkebunan di Kalimantan
                                Tengah yang terukur, berkeadilan dan berkelanjutan.
                            </p>

                            <div class="mt-10 divide-y divide-rule border-t border-rule">
                                @foreach ($prinsip as $i => $p)
                                    <div class="py-7 reveal" style="--d:{{ $i * 90 }}ms">
                                        <h3 class="font-display text-2xl sm:text-3xl lg:text-4xl font-bold tracking-tight text-ink">
                                            {{ $p['nama'] }}
                                        </h3>
                                        <p class="mt-3 max-w-prose text-sm sm:text-base leading-relaxed text-ink/70">
                                            {{ $p['teks'] }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Produk & Pengguna --}}
            <section class="border-t border-rule">
                <div class="max-w-6xl mx-auto px-5 sm:px-8 py-12 sm:py-16">
                    <div class="grid gap-8 lg:grid-cols-[minmax(0,16rem)_1fr] lg:gap-14">
                        <div class="lg:pt-1">
                            <p class="annot">
                                <span class="annot-rule"></span>
                            </p>
                            <h2 class="sect-title text-xl sm:text-2xl mt-4">Produk &amp; Pengguna</h2>
                        </div>
                        <div class="divide-y divide-rule border-t border-rule">
                            <div class="py-7">
                                <h3 class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-muted">Produk</h3>
                                <p class="mt-3 max-w-prose text-sm sm:text-base leading-relaxed text-ink/80">
                                    Basis data perizinan, pabrik, dan perkebunan rakyat, disajikan sebagai
                                    dashboard data dan peta. Pengguna dapat menelusuri perkembangan perkebunan
                                    berdasarkan kabupaten, subyek perizinan, status lahan, dan parameter lainnya.
                                </p>
                            </div>
                            <div class="py-7">
                                <h3 class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-muted">Pengguna</h3>
                                <p class="mt-3 max-w-prose text-sm sm:text-base leading-relaxed text-ink/80">
                                    Internal Dinas Perkebunan Provinsi Kalimantan Tengah, instansi pemerintah
                                    lainnya, dan publik.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Manfaat --}}
            <section class="border-t border-rule">
                <div class="max-w-6xl mx-auto px-5 sm:px-8 py-12 sm:py-16">
                    <div class="grid gap-8 lg:grid-cols-[minmax(0,16rem)_1fr] lg:gap-14">
                        <div class="lg:pt-1">
                            <p class="annot">
                                <span class="annot-rule"></span>
                            </p>
                            <h2 class="sect-title text-xl sm:text-2xl mt-4">Manfaat</h2>
                        </div>
                        <div class="divide-y divide-rule border-t border-rule">
                            @foreach ($manfaat as $m)
                                <div class="py-7">
                                    <h3 class="font-display text-lg sm:text-xl font-bold tracking-tight text-ink">
                                        {{ $m['bagi'] }}
                                    </h3>
                                    <p class="mt-3 max-w-prose text-sm sm:text-base leading-relaxed text-ink/80">
                                        {{ $m['teks'] }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            {{-- FAQ --}}
            <section class="border-t border-rule">
                <div class="max-w-6xl mx-auto px-5 sm:px-8 py-12 sm:py-16">
                    <div class="grid gap-8 lg:grid-cols-[minmax(0,16rem)_1fr] lg:gap-14">
                        <div class="lg:pt-1">
                            <p class="annot">
                                <span class="annot-rule"></span>
                            </p>
                            <h2 class="sect-title text-xl sm:text-2xl mt-4">Pertanyaan Umum</h2>
                        </div>
                        <div class="divide-y divide-rule border-t border-b border-rule">
                            @foreach ($faqs as $i => $faq)
                                <div x-data="{ open: false }">
                                    <h3>
                                        <button type="button"
                                                id="faq-q-{{ $i }}"
                                                x-on:click="open = ! open"
                                                :aria-expanded="open ? 'true' : 'false'"
                                                aria-expanded="false"
                                                aria-controls="faq-p-{{ $i }}"
                                                class="w-full flex items-start justify-between gap-6 py-5 text-left group">
                                            <span class="font-display text-base sm:text-lg font-semibold tracking-tight text-ink group-hover:text-teal-deep transition-colors">
                                                {{ $faq['q'] }}
                                            </span>
                                            <svg class="w-5 h-5 shrink-0 mt-0.5 text-muted transition-transform duration-200"
                                                 :class="open && 'rotate-180'"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                                                <path stroke-linecap="round" d="M6 9l6 6 6-6"/>
                                            </svg>
                                        </button>
                                    </h3>
                                    <div id="faq-p-{{ $i }}"
                                         role="region"
                                         aria-labelledby="faq-q-{{ $i }}"
                                         x-show="open"
                                         x-collapse
                                         x-cloak>
                                        <p class="pb-6 pr-6 max-w-prose text-sm sm:text-base leading-relaxed text-ink/75">
                                            {{ $faq['a'] }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

        </main>

        @include('partials.footer')
    </div>
@endsection
