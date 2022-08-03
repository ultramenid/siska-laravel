@extends('layouts.indexLayout')

@section('content')
    <section class="w-full relative" >
        @include('partials.navMobile')
        @include('partials.nav')
        <div class="flex flex-col  max-w-3xl mx-auto sm:py-32 py-4 text-sm px-4">
            <div class="text-center">
                <h1 class="font-bold text-xl">Frequently Asked Questions (FAQ)</h1>
                <h2 class="font-bold sm:text-xl text-sm">Sistem Informasi Perkebunan Kelapa Sawit (SISKA) Kalimantan Tengah</h2>
            </div>
            <p class="mt-12">Hal yang sering ditanyakan berikut jawaban terkait Sistem Informasi Perkebunan Kelapa Sawit (SISKA) Kalimantan Tengah.</p>
            <ol class="list-decimal px-4 mt-4" >
                <li class="mt-2"> <p>Apa itu SISKA?</p>  SISKA adalah platform yang menyajikan data dan informasi perkembangan perkebunan sawit di Provinsi Kalimantan Tengah.
                </li>
                <li class="mt-2"> <p>Sumber Data?</p>  Data yang ditampilkan dalam SISKA bersumber dari Dinas Perkebunan Provinsi Kalimantan Tengah dan Dinas Perkebunan Kabupaten-Kota di Kalimantan Tengah.
                </li>
                <li class="mt-2"> <p>Akses SISKA?</p>  Akses SISKA dibuka untuk publik. Akses kredensial (nama pengguna dan kata sandi) diberikan kepada instansi atau lembaga yang mengajukan akses kredensial. Akses ini diajukan secara formal kepada pengelola SISKA.

                </li>
                <li class="mt-2"> <p>Pemutakhiran SISKA?</p> Pemutakhiran data dilakukan secara periodik. Data yang ditampilkan disertai dengan informasi waktu atau usia data.


                </li>
            </ol>
        </div>
        @include('partials.footer')
    </section>
@endsection


 