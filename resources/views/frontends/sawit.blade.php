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

        {{-- Cards --}}
        <div class="max-w-6xl mx-auto px-6 py-12">
            <div class="grid sm:grid-cols-3 grid-cols-1 gap-6">

                <a href="{{ url('/dashboard/sawit/pengusahaan') }}" class="group block bg-white rounded-xl border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center mb-4" style="background-color: #e6f4f2;">
                        <svg class="w-5 h-5" style="color: #009180;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-gray-900 mb-1 group-hover:text-teal-700 transition-colors">Pengusahaan</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Perkembangan luas pengusahaan perkebunan besar swasta dan rakyat.</p>
                    <div class="mt-4 flex items-center text-xs font-medium" style="color: #009180;">
                        Lihat Data
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </a>

                <a href="{{ url('/dashboard/sawit/perkebunanbesar') }}" class="group block bg-white rounded-xl border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center mb-4" style="background-color: #e6f4f2;">
                        <svg class="w-5 h-5" style="color: #009180;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-gray-900 mb-1 group-hover:text-teal-700 transition-colors">Perkebunan Besar</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Data produksi perkebunan besar swasta kelapa sawit.</p>
                    <div class="mt-4 flex items-center text-xs font-medium" style="color: #009180;">
                        Lihat Data
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </a>

                <a href="{{ url('/dashboard/sawit/perkebunanrakyat') }}" class="group block bg-white rounded-xl border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center mb-4" style="background-color: #e6f4f2;">
                        <svg class="w-5 h-5" style="color: #009180;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-gray-900 mb-1 group-hover:text-teal-700 transition-colors">Perkebunan Rakyat</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Data produksi perkebunan rakyat kelapa sawit.</p>
                    <div class="mt-4 flex items-center text-xs font-medium" style="color: #009180;">
                        Lihat Data
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </a>

                <a href="{{ url('/dashboard/sawit/mutasitanaman') }}" class="group block bg-white rounded-xl border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center mb-4" style="background-color: #e6f4f2;">
                        <svg class="w-5 h-5" style="color: #009180;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-gray-900 mb-1 group-hover:text-teal-700 transition-colors">Mutasi Tanaman</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Perkembangan mutasi tanaman TBM, TM, dan TR perkebunan sawit.</p>
                    <div class="mt-4 flex items-center text-xs font-medium" style="color: #009180;">
                        Lihat Data
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </a>

                <a href="{{ url('/dashboard/sawit/pabrik') }}" class="group block bg-white rounded-xl border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center mb-4" style="background-color: #e6f4f2;">
                        <svg class="w-5 h-5" style="color: #009180;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-gray-900 mb-1 group-hover:text-teal-700 transition-colors">Pabrik</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Sebaran dan kapasitas pabrik kelapa sawit di Kalimantan Tengah.</p>
                    <div class="mt-4 flex items-center text-xs font-medium" style="color: #009180;">
                        Lihat Data
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </a>

                <a href="{{ url('/dashboard/sawit/produksi') }}" class="group block bg-white rounded-xl border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center mb-4" style="background-color: #e6f4f2;">
                        <svg class="w-5 h-5" style="color: #009180;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-gray-900 mb-1 group-hover:text-teal-700 transition-colors">Produksi</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Realisasi produksi TBS dan CPO kelapa sawit Kalimantan Tengah.</p>
                    <div class="mt-4 flex items-center text-xs font-medium" style="color: #009180;">
                        Lihat Data
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </a>

            </div>
        </div>

        @include('partials.footer')
    </section>
@endsection
