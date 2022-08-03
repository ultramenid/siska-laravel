@extends('layouts.indexLayout')

@section('content')
    <section class="w-full relative" >
        @include('partials.navMobile')
        @include('partials.nav')
        <div class="max-w-4xl mx-auto py-4 px-4 sm:mt-32">
            <h1 class="text-center text-3xl font-black text-black">Dinas Perkebunan Provinsi Kalimantan Tengah</h1>
            <p class="text-center">JL. Jenderal Soedirman No.18, Jekan Raya, Palangka Raya, Kalimantan Tengah, 74874</p>
        </div>
        @include('partials.footer')
    </section>
@endsection


 