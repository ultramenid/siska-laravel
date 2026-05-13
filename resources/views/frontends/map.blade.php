@extends('layouts.indexLayout')

@section('content')
    <section class="w-full flex flex-col" style="height: 100dvh;">
        @include('partials.nav')

        {{-- Map wrapper fills remaining height --}}
        <div class="relative flex-1 min-h-0">

            {{-- Map --}}
            <div id="map" class="absolute inset-0"></div>

            {{-- Title overlay --}}
            <div class="absolute top-4 left-4 z-20 pointer-events-none">
                <div class="bg-white bg-opacity-90 rounded-xl px-4 py-3 shadow-md">
                    <h1 class="text-sm font-bold" style="color: #132822;">Peta Perkebunan</h1>
                    <p class="text-xs text-gray-500">Kalimantan Tengah</p>
                </div>
            </div>

            {{-- Custom layer panel --}}
            <div class="absolute top-4 right-4 z-20" x-data="{ open: true }">
                <div class="bg-white rounded-xl shadow-md overflow-hidden" style="min-width: 180px;">
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between px-4 py-3 text-sm font-semibold focus:outline-none"
                        style="color: #132822;">
                        <span>Layer</span>
                        <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="border-t border-gray-100 px-4 py-3 space-y-2.5">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Overlay</p>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="layer-pabrik" class="rounded" style="accent-color: #009180;">
                            <span class="text-xs text-gray-700">Pabrik Kelapa Sawit</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="layer-kawasan" class="rounded" style="accent-color: #009180;">
                            <span class="text-xs text-gray-700">Kawasan Hutan</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="layer-izin" checked class="rounded" style="accent-color: #009180;">
                            <span class="text-xs text-gray-700">Izin Usaha</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="layer-tutupan" class="rounded" style="accent-color: #009180;">
                            <span class="text-xs text-gray-700">Tutupan Sawit</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="layer-batas" checked class="rounded" style="accent-color: #009180;">
                            <span class="text-xs text-gray-700">Batas Wilayah</span>
                        </label>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
    <script src="js/Control.MiniMap.min.js"></script>
    <script src="js/wms.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@drustack/leaflet.resetview/dist/L.Control.ResetView.min.js"></script>

    <style>
        .leaflet-control-zoom a {
            color: #132822 !important;
            font-weight: 600;
        }
        .leaflet-control-zoom a:hover {
            background-color: #009180 !important;
            color: #fff !important;
        }
        .leaflet-bar {
            border-radius: 10px !important;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.12) !important;
            border: none !important;
        }
        .leaflet-bar a {
            border-bottom-color: #e5e7eb !important;
        }
        .leaflet-control-resetview a {
            color: #132822 !important;
        }
        .leaflet-control-resetview a:hover {
            background-color: #009180 !important;
            color: #fff !important;
        }
        .leaflet-control-minimap {
            border-radius: 10px !important;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15) !important;
            border: 2px solid #fff !important;
        }
        .leaflet-popup-content-wrapper {
            border-radius: 10px !important;
            box-shadow: 0 4px 16px rgba(0,0,0,0.15) !important;
            font-family: inherit;
            font-size: 13px;
        }
        .leaflet-attribution-flag { display: none !important; }
        .leaflet-control-attribution {
            font-size: 10px;
            background: rgba(255,255,255,0.8) !important;
            border-radius: 6px !important;
        }
    </style>

    <script>
        var map = new L.Map('map', { zoomControl: false });
        var osmUrl = 'http://services.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}';
        var osm = new L.TileLayer(osmUrl, { minZoom: 5, maxZoom: 18, attribution: 'SISKA — Dinas Perkebunan Kalteng' });

        map.addLayer(osm);
        map.setView(new L.LatLng(-1.2193, 113.6213), 8);

        new L.Control.Zoom({ position: 'bottomleft' }).addTo(map);
        L.control.resetView({
            position: 'bottomleft',
            title: 'Reset tampilan',
            latlng: L.latLng([-1.2193, 114.0213]),
            zoom: 8,
        }).addTo(map);

        var osm2 = new L.TileLayer(osmUrl, { minZoom: 0, maxZoom: 13 });
        new L.Control.MiniMap(osm2, { toggleDisplay: true, position: 'bottomleft' }).addTo(map);

        var layers = {
            pabrik: L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
                layers: 'siska:Pabrik_Kelapa_Sawit_New', transparent: true, format: 'image/png'
            }),
            kawasan: L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
                layers: 'siska:Penunjukan_Kawasan_Hutan_Update2021_Trial', transparent: true, format: 'image/png'
            }),
            izin: L.tileLayer.betterWms('https://aws.simontini.id/geoserver/wms', {
                layers: 'siska:Update_Ijin_Kalteng 2021', transparent: true, format: 'image/png'
            }),
            tutupan: L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
                layers: 'siska:kalteng_tutupan_sawit_20190918', transparent: true, format: 'image/png'
            }),
            batas: L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
                layers: 'siska:kalteng_adm_line', transparent: true, format: 'image/png'
            }),
        };

        // Add default layers
        layers.izin.addTo(map);
        layers.batas.addTo(map);

        // Wire custom checkboxes to layers
        document.getElementById('layer-pabrik').addEventListener('change', function() {
            this.checked ? layers.pabrik.addTo(map) : map.removeLayer(layers.pabrik);
        });
        document.getElementById('layer-kawasan').addEventListener('change', function() {
            this.checked ? layers.kawasan.addTo(map) : map.removeLayer(layers.kawasan);
        });
        document.getElementById('layer-izin').addEventListener('change', function() {
            this.checked ? layers.izin.addTo(map) : map.removeLayer(layers.izin);
        });
        document.getElementById('layer-tutupan').addEventListener('change', function() {
            this.checked ? layers.tutupan.addTo(map) : map.removeLayer(layers.tutupan);
        });
        document.getElementById('layer-batas').addEventListener('change', function() {
            this.checked ? layers.batas.addTo(map) : map.removeLayer(layers.batas);
        });

        window.addEventListener('resize', function() { map.invalidateSize(); });
    </script>
@endpush
