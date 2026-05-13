@extends('layouts.indexLayout')

@section('content')
    <section class="w-full flex flex-col" style="min-height: 100dvh;">
        @include('partials.nav')

        {{-- Full-screen commodity grid --}}
        <div class="flex-1 grid grid-cols-2 sm:grid-cols-3 siska-grid">

            {{-- Sawit — desktop: CSS hover, mobile: tap to toggle --}}
            <div x-data="{ open: false }" class="group relative overflow-hidden">
                <a href="{{ url('/dashboard/sawit') }}"
                   @click.prevent="
                       if (window.matchMedia('(hover: none)').matches) {
                           open = !open;
                           if (!open) window.location.href = '{{ url('/dashboard/sawit') }}';
                       } else {
                           window.location.href = '{{ url('/dashboard/sawit') }}';
                       }
                   "
                   class="block absolute inset-0">
                    <img src="{{ asset('assets/v1/sawitfull.png') }}" alt="Sawit" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" :class="open ? 'scale-105' : ''">
                </a>
                <div class="absolute inset-0 bg-black transition-opacity duration-300"
                     :class="open ? 'opacity-60' : 'opacity-40 group-hover:opacity-60'"></div>

                {{-- Default label --}}
                <div class="absolute inset-0 flex flex-col items-center justify-center transition-opacity duration-300 pointer-events-none"
                     :class="open ? 'opacity-0' : 'opacity-100 group-hover:opacity-0'">
                    <h3 class="text-white text-2xl sm:text-4xl font-bold drop-shadow">Sawit</h3>
                </div>

                {{-- Summary panel --}}
                <div class="absolute inset-0 flex flex-col justify-end p-2 sm:p-5 transition-opacity duration-300 overflow-y-auto pointer-events-none"
                     :class="open ? 'opacity-100' : 'opacity-0 group-hover:opacity-100'">
                    <h3 class="text-white text-xs sm:text-xl font-bold mb-1 sm:mb-2">Sawit</h3>
                    <p class="text-white opacity-80 mb-1 leading-relaxed hidden sm:block" style="font-size: 11px;">Telusuri data dan informasi industri pengolahan kelapa sawit di Kalimantan Tengah.</p>
                    <div class="grid grid-cols-2 gap-0.5 sm:gap-1 text-white">
                        <div class="bg-black bg-opacity-40 rounded p-1 sm:p-2">
                            <p class="opacity-70 leading-tight" style="font-size: 9px;">Perkebunan Sawit</p>
                            <p class="font-semibold leading-tight" style="font-size: 10px;">2.029.319 ha</p>
                        </div>
                        <div class="bg-black bg-opacity-40 rounded p-1 sm:p-2">
                            <p class="opacity-70 leading-tight" style="font-size: 9px;">Izin Usaha (280)</p>
                            <p class="font-semibold leading-tight" style="font-size: 10px;">2.936.486 ha</p>
                        </div>
                        <div class="bg-black bg-opacity-40 rounded p-1 sm:p-2">
                            <p class="opacity-70 leading-tight" style="font-size: 9px;">TM</p>
                            <p class="font-semibold leading-tight" style="font-size: 10px;">1.949.146 ha</p>
                        </div>
                        <div class="bg-black bg-opacity-40 rounded p-1 sm:p-2">
                            <p class="opacity-70 leading-tight" style="font-size: 9px;">TBM</p>
                            <p class="font-semibold leading-tight" style="font-size: 10px;">13.319 ha</p>
                        </div>
                        <div class="bg-black bg-opacity-40 rounded p-1 sm:p-2">
                            <p class="opacity-70 leading-tight" style="font-size: 9px;">TR</p>
                            <p class="font-semibold leading-tight" style="font-size: 10px;">66.854 ha</p>
                        </div>
                        <div class="bg-black bg-opacity-40 rounded p-1 sm:p-2">
                            <p class="opacity-70 leading-tight" style="font-size: 9px;">PBS</p>
                            <p class="font-semibold leading-tight" style="font-size: 10px;">1.731.586 ha</p>
                        </div>
                        <div class="bg-black bg-opacity-40 rounded p-1 sm:p-2">
                            <p class="opacity-70 leading-tight" style="font-size: 9px;">PR</p>
                            <p class="font-semibold leading-tight" style="font-size: 10px;">297.733 ha</p>
                        </div>
                        <div class="bg-black bg-opacity-40 rounded p-1 sm:p-2">
                            <p class="opacity-70 leading-tight" style="font-size: 9px;">Pabrik</p>
                            <p class="font-semibold leading-tight" style="font-size: 10px;">127 Unit</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-1 mt-1 sm:mt-2 text-white font-medium pointer-events-auto" style="font-size: 9px;">
                        <a href="{{ url('/dashboard/sawit') }}" class="flex items-center gap-1">
                            Selengkapnya
                            <svg class="w-2.5 h-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Karet --}}
            <div class="group relative overflow-hidden cursor-not-allowed">
                <img src="{{ asset('assets/v1/karetfull.png') }}" alt="Karet" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-40 transition-opacity duration-300"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <h3 class="text-white text-2xl sm:text-4xl font-bold drop-shadow">Karet</h3>
                    <span class="text-white text-xs opacity-60 mt-2 bg-black bg-opacity-30 px-3 py-1 rounded-full">Segera hadir</span>
                </div>
            </div>

            {{-- Kelapa --}}
            <div class="group relative overflow-hidden cursor-not-allowed">
                <img src="{{ asset('assets/v1/kelapafull.png') }}" alt="Kelapa" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-40 transition-opacity duration-300"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <h3 class="text-white text-2xl sm:text-4xl font-bold drop-shadow">Kelapa</h3>
                    <span class="text-white text-xs opacity-60 mt-2 bg-black bg-opacity-30 px-3 py-1 rounded-full">Segera hadir</span>
                </div>
            </div>

            {{-- Lada --}}
            <div class="group relative overflow-hidden cursor-not-allowed">
                <img src="{{ asset('assets/v1/ladafull.png') }}" alt="Lada" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-40 transition-opacity duration-300"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <h3 class="text-white text-2xl sm:text-4xl font-bold drop-shadow">Lada</h3>
                    <span class="text-white text-xs opacity-60 mt-2 bg-black bg-opacity-30 px-3 py-1 rounded-full">Segera hadir</span>
                </div>
            </div>

            {{-- Kopi --}}
            <div class="group relative overflow-hidden cursor-not-allowed">
                <img src="{{ asset('assets/v1/kopifull.png') }}" alt="Kopi" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-40 transition-opacity duration-300"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <h3 class="text-white text-2xl sm:text-4xl font-bold drop-shadow">Kopi</h3>
                    <span class="text-white text-xs opacity-60 mt-2 bg-black bg-opacity-30 px-3 py-1 rounded-full">Segera hadir</span>
                </div>
            </div>

            {{-- Kakao --}}
            <div class="group relative overflow-hidden cursor-not-allowed">
                <img src="{{ asset('assets/v1/kakaufull.png') }}" alt="Kakao" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-40 transition-opacity duration-300"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <h3 class="text-white text-2xl sm:text-4xl font-bold drop-shadow">Kakao</h3>
                    <span class="text-white text-xs opacity-60 mt-2 bg-black bg-opacity-30 px-3 py-1 rounded-full">Segera hadir</span>
                </div>
            </div>

        </div>
    </section>
@endsection
