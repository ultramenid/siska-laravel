@extends('layouts.indexLayout')

@section('content')
    <section class="w-full relative" >
        @include('partials.navMobile')
        @include('partials.nav')
         <div class="absolute w-full bg-pabrik">
            <iframe class="py-12" style="height:100vh; width:100%;" src="https://datastudio.google.com/embed/reporting/d72b87aa-45b2-48c2-b9e2-315f98e5e41a/page/rTMvC" frameborder="0" style="border:0" allowfullscreen></iframe>
            <footer class="w-full bg-gray-100 py-2  z-50">
                <div class="mx-auto max-w-7xl flex flex-col justify-center items-center text-center px-4 py-4">
                    <h1 class="text-color-siska font-bold sm:text-2xl text-sm">Terukur. Berkeadilan. Berkelanjutan.</h1>
                </div>
            </footer>
        </div>
    </section>
@endsection


