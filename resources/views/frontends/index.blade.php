@extends('layouts.indexLayout')

@section('content')
    <section class="w-full h-screen flex flex-col overflow-hidden">
        @include('partials.navMobile')
        @include('partials.nav')

        {{-- Full-screen commodity grid --}}
        <div class="flex-1 grid grid-cols-2 sm:grid-cols-3 grid-rows-2 min-h-0">

            {{-- Sawit --}}
            <a href="{{ url('/dashboard/sawit') }}" class="group relative overflow-hidden">
                <img src="{{ asset('assets/v1/sawitfull.png') }}" alt="Sawit" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-black opacity-40 group-hover:opacity-20 transition-opacity duration-300"></div>

                {{-- Default label --}}
                <div class="absolute inset-0 flex flex-col items-center justify-center group-hover:opacity-0 transition-opacity duration-300">
                    <h3 class="text-white text-3xl sm:text-4xl font-bold drop-shadow">Sawit</h3>
                </div>

                {{-- Hover summary --}}
                <div class="absolute inset-0 flex flex-col justify-end p-5 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="text-white text-xl font-bold mb-3">Sawit</h3>
                    <p class="text-white text-xs opacity-80 mb-3 leading-relaxed">Telusuri data dan informasi industri pengolahan kelapa sawit meliputi jumlah, sebaran, serta kapasitas pengolahan pabrik di Kalimantan Tengah.</p>
                    <div class="grid grid-cols-2 gap-2 text-xs text-white">
                        <div class="bg-black bg-opacity-40 rounded-lg p-2">
                            <p class="opacity-70">Perkebunan Sawit</p>
                            <p class="font-semibold text-sm">2.029.319 ha</p>
                        </div>
                        <div class="bg-black bg-opacity-40 rounded-lg p-2">
                            <p class="opacity-70">Izin Usaha (280 Izin)</p>
                            <p class="font-semibold text-sm">2.936.486 ha</p>
                        </div>
                        <div class="bg-black bg-opacity-40 rounded-lg p-2">
                            <p class="opacity-70">TM</p>
                            <p class="font-semibold text-sm">1.949.146 ha</p>
                        </div>
                        <div class="bg-black bg-opacity-40 rounded-lg p-2">
                            <p class="opacity-70">TBM</p>
                            <p class="font-semibold text-sm">13.319 ha</p>
                        </div>
                        <div class="bg-black bg-opacity-40 rounded-lg p-2">
                            <p class="opacity-70">TR</p>
                            <p class="font-semibold text-sm">66.854 ha</p>
                        </div>
                        <div class="bg-black bg-opacity-40 rounded-lg p-2">
                            <p class="opacity-70">PBS</p>
                            <p class="font-semibold text-sm">1.731.586 ha</p>
                        </div>
                        <div class="bg-black bg-opacity-40 rounded-lg p-2">
                            <p class="opacity-70">PR</p>
                            <p class="font-semibold text-sm">297.733 ha</p>
                        </div>
                        <div class="bg-black bg-opacity-40 rounded-lg p-2">
                            <p class="opacity-70">Jumlah Pabrik</p>
                            <p class="font-semibold text-sm">127 Unit</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-1 mt-3 text-white text-xs font-medium">
                        <span>Selengkapnya</span>
                        <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </div>
            </a>

            {{-- Karet --}}
            <div class="group relative overflow-hidden cursor-not-allowed">
                <img src="{{ asset('assets/v1/karetfull.png') }}" alt="Karet" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-40 transition-opacity duration-300"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <h3 class="text-white text-3xl sm:text-4xl font-bold drop-shadow">Karet</h3>
                    <span class="text-white text-xs opacity-60 mt-2 bg-black bg-opacity-30 px-3 py-1 rounded-full">Segera hadir</span>
                </div>
            </div>

            {{-- Kelapa --}}
            <div class="group relative overflow-hidden cursor-not-allowed">
                <img src="{{ asset('assets/v1/kelapafull.png') }}" alt="Kelapa" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-40 transition-opacity duration-300"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <h3 class="text-white text-3xl sm:text-4xl font-bold drop-shadow">Kelapa</h3>
                    <span class="text-white text-xs opacity-60 mt-2 bg-black bg-opacity-30 px-3 py-1 rounded-full">Segera hadir</span>
                </div>
            </div>

            {{-- Lada --}}
            <div class="group relative overflow-hidden cursor-not-allowed">
                <img src="{{ asset('assets/v1/ladafull.png') }}" alt="Lada" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-40 transition-opacity duration-300"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <h3 class="text-white text-3xl sm:text-4xl font-bold drop-shadow">Lada</h3>
                    <span class="text-white text-xs opacity-60 mt-2 bg-black bg-opacity-30 px-3 py-1 rounded-full">Segera hadir</span>
                </div>
            </div>

            {{-- Kopi --}}
            <div class="group relative overflow-hidden cursor-not-allowed">
                <img src="{{ asset('assets/v1/kopifull.png') }}" alt="Kopi" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-40 transition-opacity duration-300"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <h3 class="text-white text-3xl sm:text-4xl font-bold drop-shadow">Kopi</h3>
                    <span class="text-white text-xs opacity-60 mt-2 bg-black bg-opacity-30 px-3 py-1 rounded-full">Segera hadir</span>
                </div>
            </div>

            {{-- Kakao --}}
            <div class="group relative overflow-hidden cursor-not-allowed">
                <img src="{{ asset('assets/v1/kakaufull.png') }}" alt="Kakao" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-40 transition-opacity duration-300"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <h3 class="text-white text-3xl sm:text-4xl font-bold drop-shadow">Kakao</h3>
                    <span class="text-white text-xs opacity-60 mt-2 bg-black bg-opacity-30 px-3 py-1 rounded-full">Segera hadir</span>
                </div>
            </div>

        </div>
    </section>
@endsection
