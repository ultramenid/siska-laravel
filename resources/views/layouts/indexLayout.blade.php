<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <meta name="description" content="@yield('description', 'Data dan informasi komoditas perkebunan Provinsi Kalimantan Tengah — Dinas Perkebunan Provinsi Kalimantan Tengah.')">
    {{-- <link rel="icon" href="{{ asset('assets/v1/web-logo-ok.png') }}"> --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@600;700;800&family=IBM+Plex+Mono:wght@400;500&family=IBM+Plex+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts

    {{-- Page-specific assets: Leaflet on /map, Highcharts on /dashboard/sawit. --}}
    @stack('head')
</head>

<body class="font-sans antialiased">
    <a href="#content" class="sr-only focus:not-sr-only focus:fixed focus:top-3 focus:left-3 focus:z-[2000] focus:bg-ink focus:text-white focus:px-4 focus:py-2 focus:font-mono focus:text-xs focus:tracking-widest focus:uppercase">
        Lewati ke konten
    </a>

    @yield('content')

    @include('partials.login-modal')

    @stack('script')
</body>
</html>
