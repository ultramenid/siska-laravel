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

              <h1 class="">Perkebunan Rakyat - Sawit</h1>

        </div>

        <div id=container></div>
    </div>
    <div style="height: 50vh">

    </div>


    @include('partials.footer')
    <script>
        var data = JSON.parse('<?php echo $data  ?>');
        console.log(data)

        Highcharts.chart('container', {
            chart: {
                type: 'spline',
                height:  470,
            },
            credits:false,
            title: {
                text: ''
            },

            xAxis: {
                categories: data.tahun,

            },
            yAxis: {
                title: {
                    text: ''
                },
                labels: {
                    format: '{value} ton'
                }
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                name: 'Perkebunan Rakyar ',
                marker: {
                    symbol: 'diamond'
                },
                data: data.produksi

            }]
        });


    </script>
@endsection
