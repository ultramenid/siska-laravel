@extends('layouts.indexLayout')

@section('content')
    <section class="w-full relative">
        @include('partials.navMobile')
        @include('partials.nav')

        <!-- Hero Section -->
        <div class="max-w-4xl mx-auto px-6 pt-24 pb-8 text-center">
            <h1 class="text-3xl font-bold text-forest mb-4">Tentang SISKA</h1>
            <p class="text-gray-700 text-base leading-relaxed max-w-2xl mx-auto">
                Sistem Informasi Komoditas Perkebunan Kalimantan Tengah merupakan platform yang menyajikan data dan informasi mengenai komoditas perkebunan meliputi perkebunan sawit, karet, kelapa, lada, kopi, kakau, pinang, aren, jambu mete, kemiri, kapuk randu, dan cengkeh yang ada di Provinsi Kalimantan Tengah.
            </p>
        </div>

        <!-- Tujuan Section -->
        <div class="bg-sage-light py-12 px-6">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-2xl font-bold text-forest mb-6 text-center">Tujuan</h2>
                <p class="text-gray-700 leading-relaxed mb-8 text-center max-w-2xl mx-auto">
                    Mendukung penerapan decision support system untuk perencanaan, pengawasan dan pengendalian usaha perkebunan di Kalimantan Tengah yang terukur, berkeadilan dan berkelanjutan.
                </p>
                <div class="grid md:grid-cols-3 gap-4">
                    <div class="bg-white organic-card p-5 text-center nature-pattern">
                        <div class="w-14 h-14 bg-sage rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-forest mb-2">Terukur</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Perencanaan, pengendalian dan pengawasan perkebunan akan lebih terukur dengan basis data yang kredibel dan terintegrasi.</p>
                    </div>
                    <div class="bg-white organic-card p-5 text-center nature-pattern">
                        <div class="w-14 h-14 bg-forest rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-forest mb-2">Berkeadilan</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Perkembangan usaha perkebunan tidak hanya fokus pada perkebunan skala besar namun juga berdampak langsung pada perkebunan rakyat.</p>
                    </div>
                    <div class="bg-white organic-card p-5 text-center nature-pattern">
                        <div class="w-14 h-14 bg-terracotta rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-forest mb-2">Berkelanjutan</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Pengembangan perkebunan selaras dengan daya dukung dan daya tampung lingkungan sebagai bentuk komitmen pembangunan berkelanjutan.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Produk & Pengguna Section -->
        <div class="py-12 px-6">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-2xl font-bold text-forest mb-8 text-center">Produk & Pengguna</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-sage-light organic-card p-6">
                        <h3 class="text-xl font-semibold text-forest mb-3">Produk</h3>
                        <p class="text-gray-700 leading-relaxed text-sm">
                            Basis data perizinan, pabrik, dan perkebunan rakyat yang disajikan dalam dashboard data dan peta yang memungkinkan pengguna mengakses dan mengeksplor perkembangan perkebunan berdasarkan kabupaten, subyek perizinan, status lahan dan lainnya.
                        </p>
                    </div>
                    <div class="bg-cream organic-card p-6">
                        <h3 class="text-xl font-semibold text-forest mb-3">Pengguna</h3>
                        <p class="text-gray-700 leading-relaxed text-sm">
                            Internal Dinas Perkebunan Provinsi Kalimantan Tengah, Instansi Pemerintah lainnya, dan Publik.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manfaat Section -->
        <div class="bg-cream py-12 px-6">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-2xl font-bold text-forest mb-8 text-center">Manfaat</h2>
                <div class="grid md:grid-cols-3 gap-4">
                    <div class="bg-white organic-card p-5 text-center">
                        <div class="w-12 h-12 bg-forest rounded-lg flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m0 0h16m-16 0h16"></path>
                            </svg>
                        </div>
                        <h3 class="text-base font-semibold text-forest mb-2">Pemerintah Daerah</h3>
                        <p class="text-gray-600 text-sm">Memudahkan Pemerintah Provinsi dan Kabupaten/Kota menghimpun dan menyajikan data secara cepat untuk mendukung perencanaan, pengawasan dan pengendalian perizinan.</p>
                    </div>
                    <div class="bg-white organic-card p-5 text-center">
                        <div class="w-12 h-12 bg-sage rounded-lg flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v-7a2 2 0 012 2v7a2 2 0 002-2 2 2 0 012-2 2 2 0 002 2v-1a2 2 0 012-2h2.945"></path>
                            </svg>
                        </div>
                        <h3 class="text-base font-semibold text-forest mb-2">Pemerintah Pusat</h3>
                        <p class="text-gray-600 text-sm">Memudahkan Pemerintah Pusat mengintegrasikan data untuk pengawasan kepatuhan perizinan, kewajiban keuangan dan lingkungan.</p>
                    </div>
                    <div class="bg-white organic-card p-5 text-center">
                        <div class="w-12 h-12 bg-terracotta rounded-lg flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-3-3h-4m-2 5h2v-2a3 3 0 00-3-3H7a3 3 0 00-3 3v2h2v-2a3 3 0 013-3h4a3 3 0 013 3v2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-base font-semibold text-forest mb-2">Pelaku Usaha</h3>
                        <p class="text-gray-600 text-sm">Memungkinkan Pelaku Usaha untuk mengidentifikasi potensi pasokan bahan baku dan pengawasan rantai pasok dari perkebunan rakyat.</p>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.footer')
    </section>
@endsection