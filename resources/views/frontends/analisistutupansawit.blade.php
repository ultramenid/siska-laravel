@extends('layouts.indexLayout')

@section('content')
    <section class="w-full relative" >
        @include('partials.navMobile')
        @include('partials.nav')
         <div class="absolute w-full bg-pabrik">
            <iframe class="py-12 sm:mt-12 mt-0" style="height:100vh; width:100%;" src="https://datastudio.google.com/embed/reporting/71033252-d5e4-4ec2-8138-875a4e24ec3d/page/FAYxC" frameborder="0" style="border:0" allowfullscreen></iframe>
            <footer class="w-full bg-gray-100 py-2  z-50">
                <div class="mx-auto max-w-7xl flex flex-col justify-center items-center text-center px-4 py-4">
                    <div class="flex items-center space-x-2">
                        <h1 class="text-black font-light sm:text-2xl text-sm">TERUKUR</h1>
                        <span class="h-1 w-1 rounded-full bg-black"></span>
                        <h1 class="text-black font-light sm:text-2xl text-sm">BERKEADILAN</h1>
                        <span class="h-1 w-1 rounded-full bg-black"></span>
                        <h1 class="text-black font-light sm:text-2xl text-sm">BERKELANJUTAN</h1>
                    </div>
                </div>
            </footer>
        </div>
    </section>
@endsection


