@extends('layouts.indexLayout')

@section('content')
    @include('partials.navMobile')
    @include('partials.nav')

    <div class="container mx-auto px-4 py-4 sm:mt-28 mt-4">
        <h1 class="text-center font-bold text-black text-3xl">Data Visualisasi Sawit</h1>
        <div class="mt-4 flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 sm:space-y-0 space-y-4">
            <div class="sm:w-4/12 w-full relative">
                <img src="{{ asset('assets/v1/pengusahaanv2.png') }}" alt="" class="object-cover object-center w-full h-full">
                <div class="absolute bottom-5 w-full px-6">
                        <div class="flex w-full justify-between items-center">
                            <div class="">
                                <img src="{{ asset('assets/v1/iconpengusahaan.png') }}" alt="" class="h-6 mb-2">
                                <span class="text-white text-xl font-semibold">Pengusahaan</span>
                            </div>

                            <a href="{{ url('/dashboard/sawit/pengusahaan') }}" class="rounded-full px-4 py-2 bg-white font-semibold cursor-pointer sm:text-base text-xs">
                                Lihat Data
                            </a>
                        </div>
                </div>
            </div>

            <div class="sm:w-4/12 w-full relative">
                <img src="{{ asset('assets/v1/pekerbunanbesar.png') }}" alt="" class="object-cover object-center w-full h-full">
                <div class="absolute bottom-5 w-full px-6">
                        <div class="flex w-full justify-between items-center">
                            <div class="">
                                <img src="{{ asset('assets/v1/iconperkebunan.png') }}" alt="" class="h-6 mb-2">
                                <span class="text-white text-xl font-semibold">Perkebunan Besar</span>
                            </div>

                            <a href="{{ url('/dashboard/sawit/perkebunanbesar') }}" class="rounded-full px-4 py-2 bg-white font-semibold cursor-pointer sm:text-base text-xs">
                                Lihat Data
                            </a>
                        </div>
                </div>
            </div>

            <div class="sm:w-4/12 w-full relative">
                <img src="{{ asset('assets/v1/perkebunanrakyat.png') }}" alt="" class="object-cover object-center w-full h-full">
                <div class="absolute bottom-5 w-full px-6">
                        <div class="flex w-full justify-between items-center">
                            <div class="">
                                <img src="{{ asset('assets/v1/iconperkebunan.png') }}" alt="" class="h-6 mb-2">
                                <span class="text-white text-xl font-semibold">Perkebunan Rakyat</span>
                            </div>

                            <a href="{{ url('/dashboard/sawit/perkebunanrakyat') }}" class="rounded-full px-4 py-2 bg-white font-semibold cursor-pointer sm:text-base text-xs">
                                Lihat Data
                            </a>
                        </div>
                </div>
            </div>


        </div>

        <div class="mt-4 flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 sm:space-y-0 space-y-4">
            <div class="sm:w-4/12 w-full relative">
                <img src="{{ asset('assets/v1/mutasitanaman.png') }}" alt="" class="object-cover object-center w-full h-full">
                <div class="absolute bottom-5 w-full px-6">
                        <div class="flex w-full justify-between items-center">
                            <div class="">
                                <img src="{{ asset('assets/v1/iconmutasi.png') }}" alt="" class="h-6 mb-2">
                                <span class="text-white text-xl font-semibold">Mutasi Tanaman</span>
                            </div>

                            <a href="{{ url('/dashboard/sawit/mutasitanaman') }}" class="rounded-full px-4 py-2 bg-white font-semibold cursor-pointer sm:text-base text-xs">
                                Lihat Data
                            </a>
                        </div>
                </div>
            </div>

            <div class="sm:w-4/12 w-full relative">
                <img src="{{ asset('assets/v1/pabrikv2.png') }}" alt="" class="object-cover object-center w-full h-full">
                <div class="absolute bottom-5 w-full px-6">
                        <div class="flex w-full justify-between items-center">
                            <div class="">
                                <img src="{{ asset('assets/v1/iconpabrik.png') }}" alt="" class="h-6 mb-2">
                                <span class="text-white text-xl font-semibold">Pabrik</span>
                            </div>

                            <a href="{{ url('/dashboard/sawit/pabrik') }}" class="rounded-full px-4 py-2 bg-white font-semibold cursor-pointer sm:text-base text-xs">
                                Lihat Data
                            </a>
                        </div>
                </div>
            </div>

            <div class="sm:w-4/12 w-full relative">
                <img src="{{ asset('assets/v1/produksiv2.png') }}" alt="" class="object-cover object-center w-full h-full">
                <div class="absolute bottom-5 w-full px-6">
                        <div class="flex w-full justify-between items-center">
                            <div class="">
                                <img src="{{ asset('assets/v1/iconproduksi.png') }}" alt="" class="h-6 mb-2">
                                <span class="text-white text-xl font-semibold">Produksi</span>
                            </div>

                            <a href="{{ url('/dashboard/sawit/produksi') }}" class="rounded-full px-4 py-2 bg-white font-semibold cursor-pointer sm:text-base text-xs">
                                Lihat Data
                            </a>
                        </div>
                </div>
            </div>


        </div>


    </div>

    <div style="height: 50vh"></div>

    @include('partials.footer')

@endsection
