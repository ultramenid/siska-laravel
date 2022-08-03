@extends('layouts.indexLayout')

@section('content')
    <section class="w-full relative" >
        @include('partials.navMobile')
        @include('partials.nav')
         <div class="absolute w-full bg-pabrik">
            <iframe style="height:100vh; width:100%;" src="https://datastudio.google.com/embed/reporting/4028590d-f7fc-4c97-a226-d847e7fe492d/page/XdVvC"  frameborder="0" style="border:0" allowfullscreen></iframe>
            <footer class="w-full bg-gray-100 py-2  z-50">
                <div class="mx-auto max-w-7xl flex flex-col justify-center items-center text-center px-4 py-4">
                    <h1 class="text-color-siska font-bold sm:text-2xl text-sm">Terukur. Berkeadilan. Berkelanjutan.</h1>
                </div>
            </footer>
        </div>
    </section>
@endsection


 