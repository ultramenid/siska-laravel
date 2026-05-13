@extends('layouts.indexLayout')

@section('content')
    <div class="min-h-screen flex">

        {{-- Left panel — background image --}}
        <div class="hidden sm:flex sm:w-1/2 relative flex-col justify-end p-12">
            <img src="{{ asset('assets/v1/sawitfull.png') }}" alt="SISKA" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(19,40,34,0.95) 0%, rgba(19,40,34,0.4) 60%, transparent 100%);"></div>
            <div class="relative">
                <img src="{{ asset('assets/v1/web-logo-ok-disbun.png') }}" alt="SISKA" class="h-12 mb-6">
                <h1 class="text-white text-3xl font-bold mb-2">SISKA</h1>
                <p class="text-white opacity-70 text-sm leading-relaxed">Sistem Informasi Komoditas Perkebunan Kalimantan Tengah</p>
            </div>
        </div>

        {{-- Right panel — form --}}
        <div class="w-full sm:w-1/2 flex flex-col justify-center px-8 sm:px-16 py-12" style="background-color: #f9fafb;">
            <div class="max-w-sm w-full mx-auto">

                {{-- Mobile logo --}}
                <div class="sm:hidden mb-8 text-center">
                    <img src="{{ asset('assets/v1/web-logo-ok-disbun.png') }}" alt="SISKA" class="h-12 mx-auto mb-3">
                    <p class="text-gray-500 text-sm">Sistem Informasi Komoditas Perkebunan Kalimantan Tengah</p>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 mb-1">Masuk</h2>
                <p class="text-gray-500 text-sm mb-8">Masukkan kredensial Anda untuk melanjutkan</p>

                <livewire:login-component />

                <p class="mt-6 text-center text-sm text-gray-500">
                    <a href="{{ url('/') }}" class="font-medium hover:underline" style="color: #009180;">Kembali ke beranda</a>
                </p>
            </div>
        </div>

    </div>
@endsection
