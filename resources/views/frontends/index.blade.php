@extends('layouts.indexLayout')

@section('content')
    <section class="w-full relative">
        @include('partials.navMobile')
        @include('partials.nav')
         <div class="flex sm:flex-row flex-col  justify-between items-center " x-data="{open:false}">
            <div  :class="open ? 'sm:w-3/12 w-full  bg-img-siska1hover ' : 'sm:w-3/12 w-full  bg-img-siska1'" style="background-image: url({{asset('assets/pabrik1.jpeg')}});">
                <div class="h-full w-full flex flex-col  items-center justify-center " @mouseover="open=true" @mouseout="open=false">
                    <div class="" >
                        <a href="dashboardpabrik.html" :class="open ? 'text-4xl font-extrabold text-white' : 'text-5xl font-extrabold text-white'">Pabrik</a>
                    </div>
                   
                    <div x-show="open" style="display: none;" class="flex sm:flex-col flex-row justify-between px-4">
                        <div class="sm:flex hidden  justify-center px-4 mt-6">
                            <p class="text-white text-center text-xs  ">
                                Telusuri data dan informasi industri pengolahan kelapa sawit meliputi jumlah, sebaran, serta kapasitas pengolahan pabrik di Kalimantan Tengah. <a href="dashboardpabrik.html" class="underline">Selengkapnya</a>
                            </p>
                            
                        </div>
                        <div class="flex justify-center items-end mt-6" >
                            <a href="dashboardpabrik.html" class="sm:text-8xl text-4xl font-extrabold text-white" >100</a>
                            <a class="text-white mt-2">unit</a>
                        </div>
                        <div class="flex justify-center items-center sm:mt-12 mt-0">
                            <div id="chart4" ></div>
                        </div>
                        
                    </div>

                </div>
            </div>
            
            <div x-data="{open1:false}" :class="open1 ? 'sm:w-3/12 w-full  bg-img-siska2hover ' : 'sm:w-3/12 w-full  bg-img-siska2'" style="background-image: url({{asset('assets/produksi2.jpeg')}})">
                <div class="h-full w-full flex flex-col  items-center justify-center " @mouseover="open1=true" @mouseout="open1=false">
                    <div class="" >
                        <a href="#" :class="open1 ? 'text-4xl font-extrabold text-white' : 'text-5xl font-extrabold text-white'">Produksi</a>
                    </div>
                    <div x-show="open1" style="display: none;" class="flex sm:flex-col flex-row justify-between px-4">
                        <div class="flex flex-col justify-center" >
                            <div class="sm:flex hidden  justify-center px-4 mt-6">
                                <p class="text-white text-center text-xs  ">
                                    Telusuri data dan informasi potensi dan realisasi produksi kelapa sawit di Kalimantan Tengah. <a href="#" class="underline">Selengkapnya</a>
                                </p>
                            </div>
                            <div class="flex justify-center items-end mt-6" >
                                <a href="#" class="sm:text-8xl text-4xl font-extrabold text-white" >45</a>
                                <a class="text-white mt-2">ribu</a>
                            </div>
                            <a class="text-white inline-flex justify-center mt-2">Ton/Jam</a>
                        </div>
                        <div class="flex justify-center items-center sm:mt-12 mt-0">
                            <div id="chart" ></div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            <div  x-data="{open2:false}" :class="open2 ? 'sm:w-3/12 w-full  bg-img-siska3hover ' : 'sm:w-3/12 w-full  bg-img-siska3'" style="background-image: url({{asset('assets/sawit.jpeg')}});">
                <div class="h-full w-full flex flex-col  items-center justify-center " @mouseover="open2=true" @mouseout="open2=false">
                    <div class="" >
                        <a href="dashboardizin.html" :class="open2 ? 'text-4xl font-extrabold text-white' : 'text-5xl font-extrabold text-white'">Izin</a>
                    </div>
                    <div x-show="open2" style="display: none;" class="flex sm:flex-col flex-row justify-between px-4">
                        <div class="sm:flex hidden  justify-center px-4 mt-6">
                            <p class="text-white text-center text-xs  ">
                                Terlusuri data dan informasi usaha perkebunan kelapa sawit meliputi jumlah, luas, sebaran perizinan serta perkembangan tanamanannya di Kalimantan Tengah. <a href="dashboardpabrik.html" class="underline">Selengkapnya</a>
                            </p>
                        </div>
                        <div class="flex flex-col justify-center items-center mt-6" >
                            <a href="dashboardizin.html"  class="sm:text-8xl text-4xl font-extrabold text-white" >280</a>
                            <a class="text-white">Izin</a>
                        </div>
                        <div class="flex justify-center items-center sm:mt-12 mt-0">
                            <div id="chart2" ></div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div x-data="{open3:false}" :class="open3 ? 'sm:w-3/12 w-full  bg-img-siska4hover ' : 'sm:w-3/12 w-full  bg-img-siska4'" style="background-image: url({{asset('assets/izin.jpeg')}});">
                <div class="h-full w-full flex flex-col  items-center justify-center " @mouseover="open3=true" @mouseout="open3=false">
                    <div class="flex justify-center" >
                        <a href="sawitrakyat.html"  :class="open3 ? 'text-4xl font-extrabold text-white text-center' : 'text-5xl font-extrabold text-white text-center'">Sawit Rakyat</a>
                    </div>
                    <div x-show="open3" style="display: none;" class="flex sm:flex-col flex-row justify-between px-4">
                    
                        <div class="flex flex-col justify-center items-center" x-show="open3" style="display: none;">
                            <div class="sm:flex hidden  justify-center px-4 mt-6">
                                <p class="text-white text-center text-xs  ">
                                    Telusuri data dan informasi perkembangan pendataan sawit rakyat meliputi jumlah, luas, sebaran kebun di Kalimantan Tengah. <a href="sawitrakyat.html" class="underline">Selengkapnya</a>
                                </p>
                            </div>
                            <div class="flex items-end mt-6" >
                                <a href="sawitrakyat.html"  class="sm:text-8xl text-4xl font-extrabold text-white" >30</a>
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
        @include('partials.footer')
    </section>
@endsection

@push('script')
    <script>
        var options = {
            series: [{{$ispo}}, {{$nonispo}}],
            chart: {
            fontFamily: 'Montserrat',
            width: '100%',
            type: 'pie',
            
          },
          legend: {
            position: 'bottom',
            labels: {
                colors: 'white',
                
            }
            
          },
          stroke: {
            show: false,
        },
        
          colors: ['#8ccfc2','#009180' ],
          labels: ['ISPO', 'NON ISPO'],
          responsive: [{
            breakpoint: 480,
            options: {
              chart: {
                width: 160
              },
              legend: {
                position: 'bottom',
                fontSize: '6px',
              }
            }
          }]
          };
    
          var chart = new ApexCharts(document.querySelector("#chart"), options);
          chart.render();
          var chart2 = new ApexCharts(document.querySelector("#chart2"), options);
          chart2.render();
          var chart3 = new ApexCharts(document.querySelector("#chart3"), options);
          chart3.render();
          var chart4 = new ApexCharts(document.querySelector("#chart4"), options);
          chart4.render();
    </script>
@endpush

 