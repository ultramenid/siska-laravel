@extends('layouts.indexLayout')


@section('content')
    @include('partials.navMobile')
    @include('partials.nav')

    <div class="sm:mt-32 mt-4 container mx-auto px-4 py-4">
        <div class="flex space-x-3 items-center mb-6 sm:text-3xl text-1xl">
            <a href="{{ url('/dashboard/sawit') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7 ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </a>

              <h1 class="">Mutasi Tanaman - Sawit</h1>

        </div>
        <div class="flex w-full justify-end mb-4">
            <div class="flex space-x-4">
                <a  class="font-semibold border-b-2 border-black">
                    <span>Perkebunan Besar Swasta</span>
                </a>

                <a href="{{ url('/dashboard/sawit/mutasitanamanrakyat') }}" class='font-light'>Perkebunan Rakyat</a>
            </div>
        </div>
        <div id=container></div>
    </div>
    <div style="height: 50vh">

    </div>


    @include('partials.footer')
    <script>
        var pbs = JSON.parse('<?php echo $pbs  ?>');
        console.log(pbs)
        Highcharts.chart('container', {
            chart: {
                type: 'area',
                height:  470,
            },
            credits:false,
            title: {
                text: '',
            },
            subtitle: {
                text: '',
                align: 'left'
            },
            yAxis: {
                title: {

                    text: ''
                }
            },
            tooltip: {
                shared: true,
                headerFormat: '<span style="font-size:12px"><b>{point.key}</b></span><br>'
            },
            plotOptions: {
                series: {
                    pointStart: 2010
                },
                area: {
                    stacking: 'normal',
                    lineColor: '#666666',
                    lineWidth: 1,
                    marker: {
                        lineWidth: 1,
                        lineColor: '#666666'
                    }
                }
            },
            series: [{
                name: 'Tanaman Belum Menghasilkan (ha)',
                data: pbs.tbm
            }, {
                name: 'Tanaman Menghasilkan (ha)',
                data: pbs.tm

            }, {
                name: 'Tanaman Rusak (ha)',
                data: pbs.tr
            }, ]
        });

    </script>
@endsection
