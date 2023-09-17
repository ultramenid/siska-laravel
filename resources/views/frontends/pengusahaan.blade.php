@extends('layouts.indexLayout')


@section('content')
    @include('partials.navMobile')
    @include('partials.nav')

    <div class="sm:mt-32 mt-4 container mx-auto px-4 py-4">
        <div class="flex space-x-3 items-center mb-12 sm:text-3xl text-1xl">
            <a href="{{ url('/dashboard/sawit') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7 ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </a>

              <h1 class="">Pengusahaan - Sawit</h1>

        </div>

        <div id=container></div>
    </div>
    <div style="height: 50vh">

    </div>


    @include('partials.footer')
    <script>
        var pbs = JSON.parse('<?php echo $pengusahaanPBS  ?>');
        var pbr = JSON.parse('<?php echo $pengusahaanPBR  ?>');
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
                name: 'Perkebunan Swasta Besar',
                data: pbs.totalluas
            }, {
                name: 'Perkebunan Rakyat',
                data: pbr.totalluas

            }]
        });

    </script>
@endsection
