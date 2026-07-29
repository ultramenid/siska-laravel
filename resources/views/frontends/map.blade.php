@extends('layouts.indexLayout')

@push('head')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css">
    <link rel="stylesheet" href="{{ asset('css/Control.MiniMap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@drustack/leaflet.resetview/dist/L.Control.ResetView.min.css">
@endpush

@push('head')
    <style>
        /* Leaflet chrome, redrawn as survey instrumentation: hairlines, 2px radii, no shadows. */
        .leaflet-container {
            font-family: var(--font-sans);
            background: var(--color-paper-dim);
        }

        .leaflet-bar,
        .leaflet-control-minimap {
            border: 1px solid var(--color-ink) !important;
            border-radius: 2px !important;
            box-shadow: 0 2px 0 rgb(19 40 34 / 0.08) !important;
            overflow: hidden;
        }

        /* Make the minimap stand out: white paper backing, ink border, teal viewport. */
        .leaflet-control-minimap {
            background: #fff !important;
        }

        .leaflet-control-minimap .leaflet-control-minimap-map {
            background: var(--color-paper);
        }

        .leaflet-control-minimap .leaflet-control-minimap-viewport {
            border: 1px solid var(--color-ink) !important;
            background: rgb(0 145 128 / 0.08) !important;
        }

        .leaflet-bar a,
        .leaflet-control-resetview a {
            font-family: var(--font-mono);
            font-weight: 500;
            color: var(--color-ink) !important;
            background: #fff;
            border-bottom: 1px solid var(--color-rule) !important;
        }

        .leaflet-bar a:last-child {
            border-bottom: none !important;
        }

        .leaflet-bar a:hover,
        .leaflet-control-resetview a:hover {
            background-color: var(--color-teal) !important;
            color: #fff !important;
        }

        /* cpo marks the active press — the only warm colour in the chrome. */
        .leaflet-bar a:active,
        .leaflet-control-resetview a:active,
        .leaflet-control-minimap-toggle-display:hover {
            background-color: var(--color-cpo) !important;
            color: #fff !important;
        }

        .leaflet-bar a.leaflet-disabled {
            color: var(--color-muted) !important;
            background: var(--color-paper-dim);
        }

        .leaflet-control-scale-line {
            padding: 2px 7px;
            border: 1px solid var(--color-rule) !important;
            border-top: none !important;
            border-radius: 0 0 2px 2px !important;
            background: rgb(255 255 255 / 0.9) !important;
            color: var(--color-ink) !important;
            font-family: var(--font-mono);
            font-variant-numeric: tabular-nums;
            font-size: 10px;
            letter-spacing: 0.06em;
            line-height: 1.4;
            box-shadow: none !important;
        }

        /* betterWms renders permit attributes into these popups. */
        .leaflet-popup-content-wrapper {
            border: 1px solid var(--color-ink) !important;
            border-radius: 2px !important;
            box-shadow: none !important;
            background: #fff;
        }

        .leaflet-popup-tip {
            border: 1px solid var(--color-ink);
            background: #fff;
            box-shadow: none !important;
        }

        .leaflet-popup-content {
            margin: 0.75rem 1rem;
        }

        .leaflet-popup-content p {
            margin: 0;
            font-family: var(--font-mono);
            font-size: 0.75rem;
            line-height: 1.45;
            letter-spacing: 0.04em;
            color: var(--color-ink);
        }

        .leaflet-container a.leaflet-popup-close-button {
            color: var(--color-muted) !important;
        }

        .leaflet-container a.leaflet-popup-close-button:hover {
            color: var(--color-cpo) !important;
            background: transparent !important;
        }

        .leaflet-attribution-flag { display: none !important; }

        .leaflet-control-attribution {
            border-top: 1px solid var(--color-rule);
            border-left: 1px solid var(--color-rule);
            border-radius: 0 !important;
            background: rgb(255 255 255 / 0.85) !important;
            font-family: var(--font-mono);
            font-size: 9px;
            letter-spacing: 0.04em;
            color: var(--color-muted);
        }
    </style>
@endpush

@section('content')
    <section class="w-full flex flex-col" style="height: 100dvh;">
        @include('partials.nav')

        <main id="content" class="relative flex-1 min-h-0">

            <div id="map" class="absolute inset-0" role="region"
                aria-label="Peta interaktif perkebunan Kalimantan Tengah"></div>

            @php
                $geoserverUrl = 'https://geoserver.sawitkalteng.id/geoserver';
                $mapLayers = [
                    ['key' => 'pabrik', 'name' => 'Pabrik Kelapa Sawit', 'wms' => 'sawitkalteng:Pabrik_Kelapa_Sawit_New_1', 'hasLegend' => true],
                    ['key' => 'kawasan', 'name' => 'Kawasan Hutan', 'wms' => 'sawitkalteng:KH2025', 'hasLegend' => true],
                    ['key' => 'izin', 'name' => 'Izin Usaha', 'wms' => 'sawitkalteng:Update_Ijin_Kalteng 2021', 'hasLegend' => true],
                    ['key' => 'tutupan', 'name' => 'Tutupan Sawit', 'wms' => 'sawitkalteng:kalteng_tutupan_sawit_20190918', 'hasLegend' => true],
                    ['key' => 'batas', 'name' => 'Batas Wilayah', 'wms' => 'sawitkalteng:kalteng_boundaries', 'hasLegend' => true],
                ];

                $kawasanClasses = [
                    ['label' => 'APL', 'color' => '#f5f0e6'],
                    ['label' => 'Hutan Lindung (HL)', 'color' => '#2e8b2e'],
                    ['label' => 'Hutan Produksi (HP)', 'color' => '#f7f45c'],
                    ['label' => 'HP Konversi (HPK)', 'color' => '#e060e0'],
                    ['label' => 'HP Terbatas (HPT)', 'color' => '#8be060'],
                    ['label' => 'KSA/KPA', 'color' => '#8b5cf6'],
                    ['label' => 'KSA/KPA Air', 'color' => '#a78bfa'],
                    ['label' => 'Tubuh Air', 'color' => '#0000ff'],
                ];
            @endphp

            {{-- Layers register, top-right: mono instrument readout (label · dashed leader · active count) --}}
            <div class="absolute right-3 top-3 sm:right-5 sm:top-5 w-auto sm:w-[15rem] max-w-[calc(100vw-1.5rem)] reveal"
                style="z-index: 1000; --d: 90ms;">
                <div class="bg-white/95 border border-rule rounded-sm">
                    <section x-data="{ open: window.innerWidth >= 640 }">
                        <button type="button" x-on:click="open = !open"
                            :aria-expanded="open ? 'true' : 'false'" aria-controls="layer-panel-body"
                            class="w-full flex items-center justify-between gap-2 px-3 py-2.5 hover:text-teal-deep focus:outline-hidden focus-visible:ring-1 focus-visible:ring-teal-deep">
                            <span class="font-mono text-[0.6875rem] uppercase tracking-[0.16em] text-ink">Layers</span>
                            <svg class="w-3.5 h-3.5 shrink-0 transition-transform text-ink" :class="open ? 'rotate-180' : ''"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="square" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div id="layer-panel-body" x-show="open" x-cloak class="border-t border-rule px-3 pb-1">
                            @foreach ($mapLayers as $layer)
                                <div class="flex items-center gap-2.5 py-2 {{ ! $loop->last ? 'border-b border-rule/70' : '' }}">
                                    <label for="layer-{{ $layer['key'] }}"
                                        class="flex flex-1 items-center gap-2.5 cursor-pointer font-mono text-[0.6875rem] uppercase tracking-[0.08em] text-ink hover:text-teal-deep">
                                        <span>{{ $layer['name'] }}</span>
                                    </label>
                                    <input type="checkbox" id="layer-{{ $layer['key'] }}" checked
                                        class="shrink-0 w-3.5 h-3.5 cursor-pointer accent-[#009180]"
                                    >
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>

            {{-- Legend register, top-left: same instrument-readout pattern as Layers --}}
            <div class="absolute left-3 top-3 sm:left-5 sm:top-5 w-auto sm:w-[16.5rem] max-w-[calc(100vw-1.5rem)] reveal"
                style="z-index: 1000; --d: 120ms;">
                <div class="bg-white/95 border border-rule rounded-sm">
                    <section x-data="{ open: window.innerWidth >= 640 }">
                        <button type="button" x-on:click="open = !open"
                            :aria-expanded="open ? 'true' : 'false'" aria-controls="legend-panel-body"
                            class="w-full flex items-center justify-between gap-2 px-3 py-2.5 hover:text-teal-deep focus:outline-hidden focus-visible:ring-1 focus-visible:ring-teal-deep">
                            <span class="font-mono text-[0.6875rem] uppercase tracking-[0.16em] text-ink">Legenda</span>
                            <svg class="w-3.5 h-3.5 shrink-0 transition-transform text-ink" :class="open ? 'rotate-180' : ''"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="square" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div id="legend-panel-body" x-show="open" x-cloak class="border-t border-rule px-3 pb-2">
                            <p id="legend-empty" class="hidden font-mono text-[0.6875rem] uppercase tracking-[0.08em] text-muted py-2">
                                Tidak ada layer aktif.
                            </p>
                            @foreach ($mapLayers as $layer)
                                <div id="legend-{{ $layer['key'] }}" class="legend-item py-2 {{ ! $loop->last ? 'border-b border-rule/70' : '' }}">
                                    <p class="font-mono text-[0.6875rem] uppercase tracking-[0.08em] text-ink mb-2">{{ $layer['name'] }}</p>

                                    @if ($layer['key'] === 'kawasan')
                                        {{-- Land-use key: vertical ribbon swatches, the surveyor's color register --}}
                                        <ul class="grid grid-cols-1 gap-y-1.5">
                                            @foreach ($kawasanClasses as $class)
                                                <li class="flex items-center gap-2.5">
                                                    <span class="shrink-0 w-1.5 h-5 rounded-sm border border-rule"
                                                          style="background-color: {{ $class['color'] }};"
                                                          aria-hidden="true"></span>
                                                    <span class="font-mono text-[0.8125rem] leading-tight text-ink">{{ $class['label'] }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <img
                                            src="{{ $geoserverUrl }}/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER={{ urlencode($layer['wms']) }}"
                                            alt="Legenda {{ $layer['name'] }}"
                                            loading="lazy"
                                            class="max-w-full h-auto border border-rule rounded-sm bg-white"
                                            onerror="this.style.display='none'"
                                        >
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>

        </main>
    </section>
@endsection

@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
    <script src="{{ asset('js/Control.MiniMap.min.js') }}"></script>
    <script src="{{ asset('js/wms.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@drustack/leaflet.resetview/dist/L.Control.ResetView.min.js"></script>

    <script>
        var map = new L.Map('map', { zoomControl: false });
        var osmUrl = 'http://services.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}';
        var osm = new L.TileLayer(osmUrl, { minZoom: 5, maxZoom: 18, attribution: ' Dinas Perkebunan Kalteng' });

        map.addLayer(osm);
        map.setView(new L.LatLng(-1.2193, 113.6213), 8);

        new L.Control.Zoom({ position: 'bottomleft' }).addTo(map);
        L.control.resetView({
            position: 'bottomleft',
            title: 'Reset tampilan',
            latlng: L.latLng([-1.2193, 114.0213]),
            zoom: 8,
        }).addTo(map);

        L.control.scale({ imperial: false, position: 'bottomright' }).addTo(map);

        var osm2 = new L.TileLayer(osmUrl, { minZoom: 0, maxZoom: 13 });
        new L.Control.MiniMap(osm2, {
            toggleDisplay: true,
            position: 'bottomright',
            width: 140,
            height: 140,
            collapsedWidth: 24,
            collapsedHeight: 24,
            zoomLevelFixed: 4,
            strings: { hideText: 'Sembunyikan mini peta', showText: 'Tampilkan mini peta' },
        }).addTo(map);

        var layers = {
            pabrik: L.tileLayer.wms('https://geoserver.sawitkalteng.id/geoserver/wms', {
                layers: 'sawitkalteng:Pabrik_Kelapa_Sawit_New_1', transparent: true, format: 'image/png'
            }),
            kawasan: L.tileLayer.wms('https://geoserver.sawitkalteng.id/geoserver/wms', {
                layers: 'sawitkalteng:KH2025', transparent: true, format: 'image/png'
            }),
            izin: L.tileLayer.betterWms('https://geoserver.sawitkalteng.id/geoserver/wms', {
                layers: 'sawitkalteng:Update_Ijin_Kalteng 2021', transparent: true, format: 'image/png'
            }),
            tutupan: L.tileLayer.wms('https://geoserver.sawitkalteng.id/geoserver/wms', {
                layers: 'sawitkalteng:kalteng_tutupan_sawit_20190918', transparent: true, format: 'image/png'
            }),
            batas: L.tileLayer.wms('https://geoserver.sawitkalteng.id/geoserver/wms', {
                layers: 'sawitkalteng:kalteng_boundaries', transparent: true, format: 'image/png'
            }),
        };

        // Add default layers
        layers.izin.addTo(map);
        layers.pabrik.addTo(map);
        layers.kawasan.addTo(map);
        layers.tutupan.addTo(map);
        layers.batas.addTo(map);

        // Wire legend checkboxes to layers and legend items by id
        var legendEmpty = document.getElementById('legend-empty');
        Object.keys(layers).forEach(function (key) {
            var checkbox = document.getElementById('layer-' + key);
            var legend = document.getElementById('legend-' + key);

            checkbox.addEventListener('change', function () {
                this.checked ? layers[key].addTo(map) : map.removeLayer(layers[key]);
                if (legend) legend.style.display = this.checked ? 'block' : 'none';
                syncPanelState();
            });

            // Sync initial state
            if (legend) legend.style.display = checkbox.checked ? 'block' : 'none';
        });

        function syncPanelState() {
            var anyActive = Object.keys(layers).some(function (k) {
                var cb = document.getElementById('layer-' + k);
                return cb && cb.checked;
            });
            if (legendEmpty) legendEmpty.classList.toggle('hidden', anyActive);
        }
        syncPanelState();

        window.addEventListener('resize', function() { map.invalidateSize(); });
    </script>
@endpush
