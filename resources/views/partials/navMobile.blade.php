<header class="bg-color-siska sticky top-0 z-50">
            <div x-data="{ open: false }" class="px-6 py-2 bg-color-siska z-10 lg:hidden block">
                <div class="flex justify-between">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white " viewBox="0 0 20 20" fill="currentColor" @click="open = true">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                      </svg>
                    <div class=" flex space-x-6 text-white text-sm ">
                        <img src="{{ asset('assets/logo-siska-ok1.png') }}" alt="" class="h-5">
                        <img src="{{asset('assets/logoprovinsi.png')}}" alt="" class="h-5">
                    </div>
                </div>


                <div class="fixed w-full h-screen z-50 bg-color-siska inset-0 overflow-y-auto " x-show="open"
                x-transition:enter="transition ease-in-out duration-150"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in-out duration-150"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click.outside="open = false"
                x-cloak style="display: none !important">
                    <button class="absolute px-6 py-2 focus:outline-none text-white" @click="open = false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="white" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                    </button>

                    <div class="mt-12 space-y-3">
                        <div class=" px-6">
                            <a href="{{ url('/') }}"class="mb-4 px-4 inline-block text-base leading-5 text-white font-semibold uppercase">Home<a>
                            <p class="border-b border-gray-300"></p>
                        </div>
                        <div class="  px-6" x-data="{open:false}">
                            <div class="flex items-center px-4" @click="open=!open" @clic.away="open=false">
                                <a class="inline-block text-base leading-5 text-gray-100 font-semibold uppercase">
                                    Tentang</a>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 ml-1 -mb-1 text-gray-100" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                            </div>
                            <div x-show="open" class="mt-3 flex flex-col justify-center px-6 space-y-1 py-2 bg-white">
                                        <div class="" >
                                            <a href="{{ url('/tentang/siska') }}" class=" text-siska text-sm  uppercase">
                                            SISKA</a>
                                        </div>
                                        <div class="" >
                                            <a href="{{ url('/tentang/tim') }}" class=" text-siska text-sm uppercase">
                                            Tim</a>
                                        </div>
                                        <div class="" >
                                            <a href="#" class=" text-siska text-sm uppercase">
                                            Petunjuk Penggunaan</a>
                                        </div>
                                        <div class="" >
                                            <a href="{{ url('/tentang/faq') }}" class=" text-siska text-sm uppercase">
                                            FAQ</a>
                                        </div>
                            </div>
                            <p class="border-b border-gray-300 mt-4"></p>
                        </div>
                        @if(session('username'))
                            <div class="  px-6" x-data="{open:false}">
                                <div class="flex items-center px-4" @click="open=!open" @clic.away="open=false">
                                    <a class="inline-block text-base leading-5 text-gray-100 font-semibold uppercase">
                                        Dashboard</a>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 ml-1 -mb-1 text-gray-100" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                </div>
                                <div x-show="open" class="mt-3 flex flex-col justify-center px-6 space-y-1 py-2 bg-white">
                                            <div class="" >
                                                <a href="{{ url('/dashboard/pabrik') }}" class=" text-siska text-sm  uppercase">
                                                Pabrik</a>
                                            </div>
                                            <div class="" >
                                                <a href="{{ url('/dashboard/izin') }}" class=" text-siska text-sm uppercase">
                                                Izin</a>
                                            </div>
                                            <div class="" >
                                                <a href="{{ url('/dashboard/produksi') }}" class=" text-siska text-sm uppercase">
                                                Produksi</a>
                                            </div>
                                            <div class="" >
                                                <a href="{{ url('/dashboard/sawitrakyat') }}" class=" text-siska text-sm uppercase">
                                                Sawit Rakyat</a>
                                            </div>

                                            <div class="" >
                                                <a href="{{ url('/dashboard/analisistutupansawit') }}" class=" text-siska text-sm uppercase">
                                                Analisis Tutupan Sawit</a>
                                            </div>

                                </div>
                                <p class="border-b border-gray-300 mt-4"></p>
                            </div>
                        @endif
                        <div class="  px-6" x-data="{open:false}">
                            <div class="flex items-center px-4" @click="open=!open" @clic.away="open=false">
                                <a class="inline-block text-base leading-5 text-gray-100 font-semibold uppercase">
                                    Peta & Data</a>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 ml-1 -mb-1 text-gray-100" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                            </div>
                            <div x-show="open" class="mt-3 flex flex-col justify-center px-6 space-y-1 py-2 bg-white">
                                        <div class="" >
                                            <a href="{{ url('/map') }}" class=" text-siska text-sm  uppercase">
                                            Platform Map</a>
                                        </div>
                                        <div class="" >
                                            <a href="#" class=" text-siska text-sm uppercase">
                                            Data</a>
                                        </div>
                                        <div class="" >
                                            <a href="#" class=" text-siska text-sm uppercase">
                                            Infografik</a>
                                        </div>
                                        <div class="" >
                                            <a href="{{ url('/daftaristilah') }}" class=" text-siska text-sm uppercase">
                                            Daftar Istilah</a>
                                        </div>
                            </div>
                            <p class="border-b border-gray-300 mt-4"></p>
                        </div>

                        @if(!session('username'))
                        <div class=" px-6">
                            <a href="{{ url('/login') }}"class="mb-4 px-4 inline-block text-base leading-5 text-white font-semibold uppercase">Login<a>
                            <p class="border-b border-gray-300"></p>
                        </div>
                        @else
                        <div class=" px-6">
                            <a href="{{ url('/logout') }}"class="mb-4 px-4 inline-block text-base leading-5 text-white font-semibold uppercase">Login<a>
                            <p class="border-b border-gray-300"></p>
                        </div>
                        @endif

                        <div class="px-6 flex space-x-6 text-white text-sm  bottom-5 fixed z-30">
                            <img src="{{ asset('assets/logo-siska-ok1.png') }}" alt="" class="h-10">
                            <img src="{{ asset('assets/logoprovinsi.png') }}" alt="" class="h-10">
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-6xl mx-auto px-6 -py-2 sm:block hidden">
                <div class="flex justify-between px-3">
                    <a></a>
                </div>
            </div>
        </header>
