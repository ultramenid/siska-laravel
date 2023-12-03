@extends('layouts.indexLayout')

@section('content')
    <section class="w-full relative">
        <div class="bg-white py-2 sm:block hidden">
            <div class="max-w-7xl mx-auto flex justify-between space-x-6 items-center">
                <div class="flex sm:flex-row flex-col space-x-4 sm:items-end items-center sm:w-3/5 w-full">
                    <img class="sm:h-24 h-12" src="{{ asset('assets/v1/gubernur.png') }}" alt="">
                    <div class="flex flex-col">
                        <h1 class="font-bold sm:text-base text-xs">H. Sugianto Sabran</h1>
                        <p class="sm:text-xs text-xss">Gubernur Kalimantan Tengah</p>
                    </div>
                </div>
                <div class="sm:w- w-full sm:block hidden">
                    <h1 class="font-bold sm:text-2xl text-sm text-center "> Sistem Informasi Komoditas Perkebunan Kalimantan Tengah</h1>
                </div>
                <div class="flex sm:flex-row  flex-col-reverse space-x-4 sm:items-end items-center sm:w-3/5 w-full">
                    <div class="flex flex-col">
                        <h1 class="font-bold sm:text-base text-xs">H. Edy Pratowo</h1>
                        <p class="sm:text-xs text-xss">Wakil Gubernur Kalimantan Tengah</p>
                    </div>
                    <img class="sm:h-24 h-12" src="{{ asset('assets/v1/wagub.png') }}" alt="">
                </div>

            </div>
            <div class="max-w-7xl mx-auto flex justify-center items-center">
                <div class="  px-4 py-2 sm:hidden block">
                    <h1 class="font-bold text-xs  text-center"> Terwujud perkebunan yang produktif, berdaya saing dan berkelanjutan</h1>
                </div>
            </div>
        </div>
        @include('partials.navMobile')
        @include('partials.nav')

        <div class="flex sm:flex-row flex-col flex-nowrap bg-gray-200 overflow-x-scroll h-full" id="element" x-data="{open:false}">
            <div  :class="open ? 'sm:w-7/12 w-full h-screen  bg-img-siska1hover flex-none transition-all ease-in-out duration-700' : 'transition-all ease-in-out duration-700 sm:w-3/12 w-full  bg-img-siska1 flex-none'" style="background-image: url({{asset('assets/v1/sawitfull.png')}});">
                <div :class="open ? 'h-full w-full flex flex-col  items-left justify-center px-12 ' : 'h-full w-full flex flex-col  items-center justify-center cursor-pointer'"  @click="open=!open" >
                    <div class="" >
                        <a  :class="open ? 'text-4xl font-extrabold text-white cursor-pointer' : 'text-5xl font-extrabold text-white cursor-pointer'">Sawit</a>
                    </div>

                    <div x-show="open" style="display: none;" class="flex sm:flex-col flex-row justify-between " @click.outside="open=false">
                        <div class="sm:flex hidden mt-6">
                            <p class="text-white  text-xs  ">
                                Telusuri data dan informasi industri pengolahan kelapa sawit meliputi jumlah, sebaran, serta kapasitas pengolahan pabrik di Kalimantan Tengah. <a href="{{ url('/dashboard/sawit') }}" class="underline">Selengkapnya</a>
                            </p>

                        </div>


                        <div class="flex sm:flex-row flex-col w-full justify-between mt-6 transition-all  delay-700">
                            <div class="flex flex-col space-y-6 sm:w-5/12 w-full">
                                <div class="w-full">
                                    <div class="px-4">
                                        <div class="bg-white rounded-full px-1 py-1 flex space-x-2 items-center ">
                                            <img src="{{ asset('assets/measure.png') }}" alt="sawitkalteng">
                                            <a class="font-semibold pr-4">Luas Total</a>
                                        </div>
                                        <div class=" flex w-full justify-between space-x-4 text-white mt-2">
                                            <a class="font-semibold">Perkebunan Sawit</a>
                                            <a class="font-semibold">2.029.319 ha</a>
                                        </div>
                                        <div class=" flex w-full justify-between space-x-4 text-white ">
                                            <a class="font-semibold">Izin Usaha(280 Izin)</a>
                                            <a class="font-semibold">2.936.486 ha</a>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="px-4">
                                        <div class="bg-white rounded-full px-1 py-1 flex space-x-2 items-center">
                                            <img src="{{ asset('assets/measure.png') }}" alt="sawitkalteng">
                                            <a href="{{ url('/dashboard/sawit/mutasitanaman') }}" class="font-semibold pr-4 hover:underline">Mutasi Tanaman</a>
                                        </div>
                                        <div class=" flex w-full justify-between text-white mt-2">
                                            <a class="font-semibold">TM</a>
                                            <a class="font-semibold">1.949.146 ha</a>
                                        </div>
                                        <div class=" flex w-full justify-between text-white ">
                                            <a class="font-semibold">TBM</a>
                                            <a class="font-semibold">13.319 ha</a>
                                        </div>
                                        <div class=" flex w-full justify-between text-white ">
                                            <a class="font-semibold">TR</a>
                                            <a class="font-semibold">66.854 ha</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col space-y-6 sm:w-5/12 w-full">
                                <div>
                                    <div class="px-4">
                                        <div class="bg-white rounded-full px-1 py-1 flex space-x-2 items-center">
                                            <img src="{{ asset('assets/measure.png') }}" alt="sawitkalteng">
                                            <a href="{{ url('/dashboard/sawit/pengusahaan') }}" class="font-semibold pr-4 hover:underline">Pengusahaan</a>
                                        </div>
                                        <div class=" flex w-full justify-between text-white mt-2">
                                            <a class="font-semibold">PBN</a>
                                            <a class="font-semibold">- ha</a>
                                        </div>
                                        <div class=" flex w-full justify-between text-white ">
                                            <a class="font-semibold">PBS</a>
                                            <a class="font-semibold">1.731.586 ha</a>
                                        </div>
                                        <div class=" flex w-full justify-between text-white ">
                                            <a class="font-semibold">PR</a>
                                            <a class="font-semibold">297.733 ha</a>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="px-4">
                                        <div class="bg-white rounded-full px-1 py-1 flex space-x-2 items-center">
                                            <img src="{{ asset('assets/measure.png') }}" alt="sawitkalteng">
                                            <a href="{{ url('/dashboard/sawit/produksi') }}" class="font-semibold pr-4 hover:underline">Produksi</a>
                                        </div>
                                        <div class=" flex w-full justify-between text-white mt-2">
                                            <a class="font-semibold">TBS</a>
                                            <a class="font-semibold">2.512.651 Ton</a>
                                        </div>
                                        <div class=" flex w-full justify-between text-white ">
                                            <a class="font-semibold">CPO</a>
                                            <a class="font-semibold">2.453.631 ha</a>
                                        </div>
                                        <div class=" flex w-full justify-between text-white ">
                                            <a class="font-semibold">Jumlah Pabrik</a>
                                            <a class="font-semibold">127 Unit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="flex justify-center items-center sm:mt-12 mt-0">
                            <div id="chart4" ></div>
                        </div> --}}

                    </div>

                </div>
            </div>
            <div x-data="{open1:false}" :class="open1 ? 'sm:w-5/12 w-full  bg-img-siska2hover ' : 'sm:w-3/12 w-full  bg-img-siska2 flex-none'" style="background-image: url({{asset('assets/v1/karetfull.png')}})">
                <div :class="open1 ? 'h-full w-full flex flex-col  items-left justify-center px-12' : 'h-full w-full flex flex-col  items-center justify-center '"   >
                    <div class="" >
                        <a  :class="open1 ? 'text-4xl font-extrabold text-white' : 'text-5xl font-extrabold text-white'">Karet</a>
                    </div>
                    <div x-show="open1" style="display: none;" class="flex sm:flex-col flex-row justify-between px-4" @click.outside="open1=false">
                        <div class="flex flex-col justify-center" >
                            <div class="sm:flex hidden  justify-center px-4 mt-6">
                                <p class="text-white text-center text-xs  ">
                                    Telusuri data dan informasi potensi dan realisasi produksi kelapa sawit di Kalimantan Tengah. <a href="{{ url('/dashboard/produksi') }}" class="underline">Selengkapnya</a>
                                </p>
                            </div>
                            <div class="flex justify-center items-end mt-6" >
                                <a href="{{ url('/dashboard/produksi') }}" class="sm:text-8xl text-4xl font-extrabold text-white" >2,45</a>
                                <a class="text-white mt-2">Juta</a>
                            </div>
                            <a class="text-white inline-flex justify-center mt-2">Ton</a>
                            <a class="text-white  inline-flex justify-center mt-2">(Januari - Mei 2022)</a>
                        </div>
                        <div class="flex justify-center items-center sm:mt-12 mt-0">
                            <div id="chart" ></div>
                        </div>

                    </div>

                </div>
            </div>
            <div  x-data="{open2:false}" :class="open2 ? 'sm:w-5/12 w-full  bg-img-siska3hover ' : 'sm:w-3/12 w-full  bg-img-siska3 flex-none'" style="background-image: url({{asset('assets/v1/kelapafull.png')}});">
                <div class="h-full w-full flex flex-col  items-center justify-center " >
                    <div class="" >
                        <a  :class="open2 ? 'text-4xl font-extrabold text-white' : 'text-5xl font-extrabold text-white'">Kelapa</a>
                    </div>
                    <div x-show="open2" style="display: none;" class="flex sm:flex-col flex-row justify-between px-4">
                        <div class="sm:flex hidden  justify-center px-4 mt-6">
                            <p class="text-white text-center text-xs  ">
                                Terlusuri data dan informasi usaha perkebunan kelapa sawit meliputi jumlah, luas, sebaran perizinan serta perkembangan tanamanannya di Kalimantan Tengah. <a href="{{ url('/dashboard/izin') }}" class="underline">Selengkapnya</a>
                            </p>
                        </div>
                        <div class="flex flex-col justify-center items-center mt-6" >
                            <a href="{{ url('/dashboard/izin') }}"  class="sm:text-8xl text-4xl font-extrabold text-white" ></a>
                            <a class="text-white">Izin</a>
                        </div>
                        <div class="flex justify-center items-center sm:mt-12 mt-0">
                            <div id="chart2" ></div>
                        </div>

                    </div>
                </div>
            </div>
            <div x-data="{open3:false}" :class="open3 ? 'sm:w-5/12 w-full  bg-img-siska4hover ' : 'sm:w-3/12 w-full  bg-img-siska4 flex-none'" style="background-image: url({{asset('assets/v1/ladafull.png')}});">
                <div class="h-full w-full flex flex-col  items-center justify-center " >
                    <div class="flex justify-center" >
                        <a   :class="open3 ? 'text-4xl font-extrabold text-white text-center' : 'text-5xl font-extrabold text-white text-center'">Lada</a>
                    </div>
                    <div x-show="open3" style="display: none;" class="flex sm:flex-col flex-row justify-between px-4">

                        <div class="flex flex-col justify-center items-center" x-show="open3" style="display: none;">
                            <div class="sm:flex hidden  justify-center px-4 mt-6">
                                <p class="text-white text-center text-xs  ">
                                    Telusuri data dan informasi perkembangan pendataan sawit rakyat meliputi jumlah, luas, sebaran kebun di Kalimantan Tengah. <a href="{{ url('/dashboard/sawitrakyat') }}" class="underline">Selengkapnya</a>
                                </p>
                            </div>
                            <div class="flex items-end mt-6" >
                                <a href="{{ url('/dashboard/sawitrakyat') }}"  class="sm:text-8xl text-4xl font-extrabold text-white" >39</a>
                                <a class="text-white mt-2">ribu</a>
                            </div>
                            <a class="text-white mt-2">Hektare</a>
                        </div>
                        <div class="flex justify-center items-center sm:mt-12 mt-0">
                            <div id="chart3" ></div>
                        </div>

                    </div>
                </div>
            </div>
            <div x-data="{open3:false}" :class="open3 ? 'sm:w-5/12 w-full  bg-img-siska4hover ' : 'sm:w-3/12 w-full  bg-img-siska4 flex-none'" style="background-image: url({{asset('assets/v1/kopifull.png')}});">
                <div class="h-full w-full flex flex-col  items-center justify-center " >
                    <div class="flex justify-center" >
                        <a   :class="open3 ? 'text-4xl font-extrabold text-white text-center' : 'text-5xl font-extrabold text-white text-center'">Kopi</a>
                    </div>
                    <div x-show="open3" style="display: none;" class="flex sm:flex-col flex-row justify-between px-4">

                        <div class="flex flex-col justify-center items-center" x-show="open3" style="display: none;">
                            <div class="sm:flex hidden  justify-center px-4 mt-6">
                                <p class="text-white text-center text-xs  ">
                                    Telusuri data dan informasi perkembangan pendataan sawit rakyat meliputi jumlah, luas, sebaran kebun di Kalimantan Tengah. <a href="{{ url('/dashboard/sawitrakyat') }}" class="underline">Selengkapnya</a>
                                </p>
                            </div>
                            <div class="flex items-end mt-6" >
                                <a href="{{ url('/dashboard/sawitrakyat') }}"  class="sm:text-8xl text-4xl font-extrabold text-white" >39</a>
                                <a class="text-white mt-2">ribu</a>
                            </div>
                            <a class="text-white mt-2">Hektare</a>
                        </div>
                        <div class="flex justify-center items-center sm:mt-12 mt-0">
                            <div id="chart3" ></div>
                        </div>

                    </div>
                </div>
            </div>
            <div x-data="{open3:false}" :class="open3 ? 'sm:w-5/12 w-full  bg-img-siska4hover ' : 'sm:w-3/12 w-full  bg-img-siska4 flex-none'" style="background-image: url({{asset('assets/v1/kakaufull.png')}});">
                <div class="h-full w-full flex flex-col  items-center justify-center " >
                    <div class="flex justify-center" >
                        <a   :class="open3 ? 'text-4xl font-extrabold text-white text-center' : 'text-5xl font-extrabold text-white text-center'">Kakao</a>
                    </div>
                    <div x-show="open3" style="display: none;" class="flex sm:flex-col flex-row justify-between px-4">

                        <div class="flex flex-col justify-center items-center" x-show="open3" style="display: none;">
                            <div class="sm:flex hidden  justify-center px-4 mt-6">
                                <p class="text-white text-center text-xs  ">
                                    Telusuri data dan informasi perkembangan pendataan sawit rakyat meliputi jumlah, luas, sebaran kebun di Kalimantan Tengah. <a href="{{ url('/dashboard/sawitrakyat') }}" class="underline">Selengkapnya</a>
                                </p>
                            </div>
                            <div class="flex items-end mt-6" >
                                <a href="{{ url('/dashboard/sawitrakyat') }}"  class="sm:text-8xl text-4xl font-extrabold text-white" >39</a>
                                <a class="text-white mt-2">ribu</a>
                            </div>
                            <a class="text-white mt-2">Hektare</a>
                        </div>
                        <div class="flex justify-center items-center sm:mt-12 mt-0">
                            <div id="chart3" ></div>
                        </div>

                    </div>
                </div>
            </div>

          </div>
        {{-- @include('partials.footer') --}}
        <div class="sm:block hidden">
            <div id="down">
                <div class="fixed z-20 inset-x-0 bottom-5 cursor-pointer " >
                    <div class="sm:px-4 px-2 sm:py-4 py-2  flex items-center justify-center">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-7 w-7 text-white animate-bounce">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
                          </svg>

                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('script')
    <script>

        element.addEventListener('wheel', (event) => {
            var down = document.getElementById("down");
            const delta = event.deltaY;

            if(delta >= 0 ){
                console.log(delta)

                console.log('Munculin <<')
                down.style.display = 'none'
                if(delta >> 3){
                    window.scrollTo({
                    top: document.body.scrollHeight,
                    behavior: 'smooth',
                    })
                }
            }else if (delta >> -1){
                console.log('Munculin >>>')
                console.log(delta)
                down.style.display = 'block'

                if(delta >> -40){
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }

            }
            event.preventDefault();

            element.scrollBy({
                left: event.deltaY < 0 ? -20 : 20,
            });



        });
    </script>
@endpush

