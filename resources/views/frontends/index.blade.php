@extends('layouts.indexLayout')

@section('content')
    <section class="w-full">
        @include('partials.navMobile')
        @include('partials.nav')

        {{-- Hero --}}
        <div class="w-full flex items-center justify-center" style="background-color: #132822; min-height: 45vh;">
            <div class="text-center px-6 py-16">
                <h1 class="text-4xl sm:text-6xl font-bold text-white mb-4">SISKA</h1>
                <p class="text-white text-base sm:text-xl opacity-80 max-w-xl mx-auto">Sistem Informasi Komoditas Perkebunan Kalimantan Tengah</p>
            </div>
        </div>

        {{-- Commodities Grid --}}
        <div class="max-w-6xl mx-auto px-6 py-12">
            <div class="grid sm:grid-cols-3 grid-cols-2 gap-4">

                {{-- Sawit --}}
                <a href="{{ url('/dashboard/sawit') }}" class="group relative overflow-hidden rounded-xl" style="height: 260px;">
                    <img src="{{ asset('assets/v1/sawitfull.png') }}" alt="Sawit" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black opacity-40 group-hover:opacity-30 transition-opacity duration-300"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-5">
                        <h3 class="text-white text-2xl font-bold">Sawit</h3>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-white text-xs opacity-80">Lihat Data</span>
                            <svg class="w-4 h-4 text-white opacity-80 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                {{-- Karet --}}
                <div class="group relative overflow-hidden rounded-xl cursor-not-allowed" style="height: 260px;">
                    <img src="{{ asset('assets/v1/karetfull.png') }}" alt="Karet" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-40 transition-opacity duration-300"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-5">
                        <h3 class="text-white text-2xl font-bold">Karet</h3>
                        <span class="text-white text-xs opacity-60 mt-1">Segera hadir</span>
                    </div>
                </div>

                {{-- Kelapa --}}
                <div class="group relative overflow-hidden rounded-xl cursor-not-allowed" style="height: 260px;">
                    <img src="{{ asset('assets/v1/kelapafull.png') }}" alt="Kelapa" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-40 transition-opacity duration-300"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-5">
                        <h3 class="text-white text-2xl font-bold">Kelapa</h3>
                        <span class="text-white text-xs opacity-60 mt-1">Segera hadir</span>
                    </div>
                </div>

                {{-- Lada --}}
                <div class="group relative overflow-hidden rounded-xl cursor-not-allowed" style="height: 260px;">
                    <img src="{{ asset('assets/v1/ladafull.png') }}" alt="Lada" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-40 transition-opacity duration-300"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-5">
                        <h3 class="text-white text-2xl font-bold">Lada</h3>
                        <span class="text-white text-xs opacity-60 mt-1">Segera hadir</span>
                    </div>
                </div>

                {{-- Kopi --}}
                <div class="group relative overflow-hidden rounded-xl cursor-not-allowed" style="height: 260px;">
                    <img src="{{ asset('assets/v1/kopifull.png') }}" alt="Kopi" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-40 transition-opacity duration-300"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-5">
                        <h3 class="text-white text-2xl font-bold">Kopi</h3>
                        <span class="text-white text-xs opacity-60 mt-1">Segera hadir</span>
                    </div>
                </div>

                {{-- Kakao --}}
                <div class="group relative overflow-hidden rounded-xl cursor-not-allowed" style="height: 260px;">
                    <img src="{{ asset('assets/v1/kakaufull.png') }}" alt="Kakao" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-40 transition-opacity duration-300"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-5">
                        <h3 class="text-white text-2xl font-bold">Kakao</h3>
                        <span class="text-white text-xs opacity-60 mt-1">Segera hadir</span>
                    </div>
                </div>

            </div>
        </div>

        @include('partials.footer')
    </section>
@endsection
