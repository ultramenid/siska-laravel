<div class=" bg-gray-900  w-full z-20 absolute  lg:block hidden">
            <div class="flex sm:flex-row flex-col sm:space-y-0 space-y-4 items-center mx-auto max-w-7xl justify-between px-8 py-4">
                <div class="">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/v1/web-logo-ok.png') }}" alt="" class="w-40">
                    </a>
                </div>
                <div class="flex  sm:space-x-12 space-x-4">
                    <div class="flex-col flex items-center" x-data="{peta:false}">
                        <a @click="peta = ! peta" @click.away="peta=false" class="z-20 @if($nav === 'tentang') border-b border-white @endif  text-white cursor-pointer inline-flex  items-center sm:text-base text-xs" >
                        Tentang
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 ml-1 -mb-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <div class="absolute mt-8 z-20 bg-white rounded px-4 py-4" x-show="peta" x-cloak style="display: none !important">
                            <div class=" py-1" >
                                <a href="{{ url('/tentang/siska') }}" class="text-sm text-gray-900">
                                SISKA
                                </a>
                            </div>
                            <div class=" py-1" >
                                <a href="{{ url('/tentang/tim') }}" class="text-sm text-gray-900">
                                Tim
                                </a>
                            </div>
                            <div class=" py-1" >
                                <a href="#" class="text-sm text-gray-900">
                                Petunjuk Penggunaan
                                </a>
                            </div>
                            <div class=" py-1" >
                                <a href="{{ url('/tentang/faq') }}" class="text-sm text-gray-900">
                                FAQ
                                </a>
                            </div>

                        </div>
                    </div>
                    @if(session('username'))
                        <div class="flex-col flex items-center whitespace-nowrap" x-data="{peta:false}">
                            <a @click="peta = ! peta" @click.away="peta=false" class="z-20 @if($nav === 'frontendDashboard') border-b border-white @endif text-white cursor-pointer inline-flex  items-center sm:text-base text-xs" >
                            Dashboard
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 ml-1 -mb-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <div class="absolute mt-8 z-20 bg-white rounded px-4 py-4 w-56 " x-show="peta" x-cloak style="display: none !important">
                                <div class=" py-1" >
                                    <a href="{{ url('/dashboard/pabrik') }}" class="text-sm text-gray-900">
                                    Pabrik
                                    </a>
                                </div>
                                <div class=" py-1" >
                                    <a href="{{ url('/dashboard/izin') }}" class="text-sm text-gray-900">
                                    Izin
                                    </a>
                                </div>
                                <div class=" py-1" >
                                    <a href="{{ url('/dashboard/produksi') }}" class="text-sm text-gray-900">
                                    Produksi
                                    </a>
                                </div>
                                <div class=" py-1" >
                                    <a href="{{ url('/dashboard/sawitrakyat') }}" class="text-sm text-gray-900">
                                    Sawit Rakyat
                                    </a>
                                </div>
                                <div class=" py-1" >
                                    <a href="{{ url('/dashboard/analisistutupansawit') }}" class="text-sm text-gray-900">
                                        Analisis Tutupan Sawit
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="flex-col flex items-center" x-data="{peta:false}">
                        <a @click="peta = ! peta" @click.away="peta=false" class="z-20  text-white cursor-pointer inline-flex  items-center sm:text-base text-xs" >
                        Peta & Data
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 ml-1 -mb-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <div class="absolute mt-8 z-20 bg-white rounded px-4 py-4 w-44" x-show="peta" x-cloak style="display: none !important">
                            <div class=" py-1" >
                                <a href="{{ url('/map') }}" class="text-sm text-gray-900">
                                Platform Map
                                </a>
                            </div>
                            <div class=" py-1" >
                                <a href="" class="text-sm text-gray-900">
                                Data
                                </a>
                            </div>
                            <div class=" py-1" >
                                <a href="" class="text-sm text-gray-900">
                                Infografik
                                </a>
                            </div>
                            <div class=" py-1" >
                                <a href="{{ url('/daftaristilah') }}" class="text-sm text-gray-900">
                                Daftar Istilah
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- <a href="" class="text-white sm:text-base text-xs">FAQ</a> -->
                    @if(!session('username'))
                        <a href="{{ url('/login') }}" class="text-white sm:text-base text-xs">Login</a>
                    @else
                        <a href="{{ url('/logout') }}" class="text-white sm:text-base text-xs">Logout</a>
                    @endif
                </div>
                <div class="">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/v1/web-logo-ok-disbun.png') }}" alt="" class="w-56 ">
                    </a>
                </div>
            </div>
        </div>
