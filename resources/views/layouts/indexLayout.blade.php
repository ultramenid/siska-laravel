<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css">
    <link href="css/Control.MiniMap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@drustack/leaflet.resetview/dist/L.Control.ResetView.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @livewireScripts
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <link
    rel="stylesheet"
    href="https://unpkg.com/swiper@6.8.4/swiper-bundle.min.css"
      />
    <script src="https://unpkg.com/swiper@6.8.4/swiper-bundle.min.js"></script>
</head>

<body class="font-sans">

    @yield('content')

</body>
    @stack('script')
</html>
