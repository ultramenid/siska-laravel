@extends('layouts.indexLayout')


@section('content')
    @include('partials.navMobile')
    @include('partials.nav')

    <div class="max-w-7xl mx-auto px-4 py-4 sm:mt-32" x-data="{sidenav:'sawit'}">
        {{-- data --}}
        <h1 class="text-4xl font-bold">Data</h1>
        <div class="flex sm:flex-row flex-col justify-between  sm:space-x-10 space-x-0 mt-6">
            <div class="sm:w-1/12 w-full flex flex-col mt-6">
                <div class="sticky top-5 ">
                    <div  :class="(sidenav == 'sawit') ? 'py-1 text-white bg-nav px-4' :'py-1  px-4'" @click="sidenav = 'sawit' " >
                        <a class="cursor-pointer   text-sm">Sawit</a>
                    </div>
                    <div  :class="(sidenav == 'karet') ? 'py-1 text-white bg-nav px-4' :'py-1  px-4'"  @click="sidenav = 'karet'">
                        <a class="cursor-pointer   text-sm">Karet</a>
                    </div>
                    <div  :class="(sidenav == 'kelapa') ? 'py-1 text-white bg-nav px-4' :'py-1  px-4'"  @click="sidenav = 'kelapa'">
                        <a class="cursor-pointer   text-sm">Kelapa</a>
                    </div>
                    <div  :class="(sidenav == 'lada') ? 'py-1 text-white bg-nav px-4' :'py-1  px-4'"  @click="sidenav = 'lada'">
                        <a class="cursor-pointer   text-sm">Lada</a>
                    </div>
                    <div  :class="(sidenav == 'kopi') ? 'py-1 text-white bg-nav px-4' :'py-1  px-4'"  @click="sidenav = 'kopi'">
                        <a class="cursor-pointer   text-sm">Kopi</a>
                    </div>
                    <div  :class="(sidenav == 'kakao') ? 'py-1 text-white bg-nav px-4' :'py-1  px-4'"  @click="sidenav = 'kakao'">
                        <a class="cursor-pointer   text-sm">Kakao</a>
                    </div>
                </div>
            </div>
            <div class="sm:w-11/12 w-full mt-6 font-light">
                <div>
                    <div x-show="sidenav==='sawit'" style="display: none !important;">
                        <livewire:table-sawit/>
                    </div>
                    <div x-show="sidenav==='karet'" style="display: none !important;">
                        <a>[Coming soon]</a>
                    </div>
                    <div x-show="sidenav==='kelapa'" style="display: none !important;">
                        <a>[Coming soon]</a>
                    </div>
                    <div x-show="sidenav==='lada'" style="display: none !important;">
                        <a>[Coming soon]</a>
                    </div>
                    <div x-show="sidenav==='kopi'" style="display: none !important;">
                        <a>[Coming soon]</a>
                    </div>
                    <div x-show="sidenav==='kakao'" >
                        <a>[Coming soon]</a>
                    </div>
                </div>

            </div>
        </div>

    </div>



    {{-- @include('partials.footer') --}}

@endsection
