@extends('layouts.indexLayout')

@section('content')
    <section class="w-full">
        @include('partials.navMobile')
        @include('partials.nav')

        {{-- Hero --}}
        <div class="w-full flex items-center justify-center" style="background-color: #132822; min-height: 20vh;">
            <div class="text-center px-6 py-10">
                <h1 class="text-4xl sm:text-5xl font-bold text-white mb-3">Peta Perkebunan</h1>
                <p class="text-white text-base sm:text-lg opacity-80">Kalimantan Tengah</p>
            </div>
        </div>

        {{-- Map --}}
        <div id="map" class="w-full" style="height: calc(100vh - 20vh - 64px); min-height: 400px;"></div>

    </section>
@endsection

@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
    <script src="js/Control.MiniMap.min.js"></script>
    <script src="js/wms.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@drustack/leaflet.resetview/dist/L.Control.ResetView.min.js"></script>

    <style>
        /* Override Leaflet controls to match brand */
        .leaflet-control-zoom a,
        .leaflet-control-resetview a {
            color: #132822 !important;
            font-weight: 600;
        }
        .leaflet-control-zoom a:hover,
        .leaflet-control-resetview a:hover {
            background-color: #009180 !important;
            color: #fff !important;
        }
        .leaflet-control-layers {
            border: none !important;
            border-radius: 8px !important;
            box-shadow: 0 2px 12px rgba(0,0,0,0.12) !important;
            font-family: inherit;
            font-size: 12px;
            max-height: 60vh;
            overflow-y: auto;
        }
        .leaflet-control-layers-toggle {
            background-color: #009180 !important;
        }
        .leaflet-control-layers-expanded {
            padding: 10px 14px !important;
            min-width: 180px;
        }
        .leaflet-control-layers-separator {
            border-top-color: #e5e7eb !important;
        }
        .leaflet-control-layers label {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 3px 0;
            cursor: pointer;
            color: #374151;
        }
        .leaflet-control-layers label:hover {
            color: #009180;
        }
        .leaflet-control-layers input[type="checkbox"],
        .leaflet-control-layers input[type="radio"] {
            accent-color: #009180;
        }
        .leaflet-bar {
            border-radius: 8px !important;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.12) !important;
            border: none !important;
        }
        .leaflet-bar a {
            border-bottom-color: #e5e7eb !important;
        }
        .leaflet-popup-content-wrapper {
            border-radius: 8px !important;
            box-shadow: 0 4px 16px rgba(0,0,0,0.15) !important;
            font-family: inherit;
            font-size: 13px;
        }
        .leaflet-popup-tip {
            box-shadow: none !important;
        }
        /* Minimap */
        .leaflet-control-minimap {
            border-radius: 8px !important;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15) !important;
            border: 2px solid #fff !important;
        }
    </style>

    <script>
        var map = new L.Map('map', { zoomControl: false });
        var osmUrl = 'http://services.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}';
        var osmAttrib = 'SISKA — Dinas Perkebunan Kalteng';
        var osm = new L.TileLayer(osmUrl, { minZoom: 5, maxZoom: 18, attribution: osmAttrib });

        map.addLayer(osm);
        map.setView(new L.LatLng(-1.2193, 113.6213), 8);

        new L.Control.Zoom({ position: 'bottomleft' }).addTo(map);
        L.control.resetView({
            position: 'bottomleft',
            title: 'Reset tampilan',
            latlng: L.latLng([-1.2193, 114.0213]),
            zoom: 8,
        }).addTo(map);

        var osm2 = new L.TileLayer(osmUrl, { minZoom: 0, maxZoom: 13, attribution: osmAttrib });
        var miniMap = new L.Control.MiniMap(osm2, { toggleDisplay: true, position: 'bottomleft' }).addTo(map);

        var pabrik = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
            layers: 'siska:Pabrik_Kelapa_Sawit_New',
            transparent: true,
            format: 'image/png'
        });
        var tutupanSawit = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
            layers: 'siska:kalteng_tutupan_sawit_20190918',
            transparent: true,
            format: 'image/png'
        });
        var kawasanKalteng = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
            layers: 'siska:Penunjukan_Kawasan_Hutan_Update2021_Trial',
            transparent: true,
            format: 'image/png'
        });
        var izinUsaha = L.tileLayer.betterWms('https://aws.simontini.id/geoserver/wms', {
            layers: 'siska:Update_Ijin_Kalteng 2021',
            transparent: true,
            format: 'image/png'
        }).addTo(map);
        var admKalteng = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
            layers: 'siska:kalteng_adm_line',
            transparent: true,
            format: 'image/png'
        }).addTo(map);

        var baseLayers = { 'Base Map': osm };
        var overlays = {
            'Pabrik Kelapa Sawit': pabrik,
            'Kawasan Hutan': kawasanKalteng,
            'Izin Usaha': izinUsaha,
            'Tutupan Sawit': tutupanSawit,
            'Batas Wilayah': admKalteng,
        };
        L.control.layers(baseLayers, overlays, { collapsed: false, position: 'topright' }).addTo(map);

        // Invalidate map size on window resize for responsiveness
        window.addEventListener('resize', function() { map.invalidateSize(); });
    </script>
@endpush
