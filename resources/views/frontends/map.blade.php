@extends('layouts.indexLayout')

@section('content')
    <section class="w-full relative" >
        @include('partials.navMobile')
        @include('partials.nav')
         <div class=" w-full bg-pabrik">
            <div id="map" class="w-full h-screen z-10"></div>
        </div>

    </section>
@endsection


 @push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
     <script src="js/Control.MiniMap.min.js"></script>
     <script src="js/wms.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@drustack/leaflet.resetview/dist/L.Control.ResetView.min.js"></script>


     <script>

        var map = new L.Map('map');
		var osmUrl='http://services.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}';
		var osmAttrib='Siska';
		var osm = new L.TileLayer(osmUrl, {minZoom: 5, maxZoom: 18, attribution: osmAttrib});

		map.addLayer(osm);
		map.setView(new L.LatLng(-1.2193, 113.6213),8);

        //resetzoom control
        new L.Control.Zoom({ position: 'bottomleft' }).addTo(map);
        L.control.resetView({
            position: "bottomleft",
            title: "Reset view",
            latlng: L.latLng([-1.2193, 114.0213]),
            zoom: 8,
        }).addTo(map);
		//Plugin magic goes here! Note that you cannot use the same layer object again, as that will confuse the two map controls
		var osm2 = new L.TileLayer(osmUrl, {minZoom: 0, maxZoom: 13, attribution: osmAttrib });
		var miniMap = new L.Control.MiniMap(osm2, { toggleDisplay: true }).addTo(map);


          var pabrik = L.tileLayer.wms('https://geoserver.sawitkalteng.id/geoserver/wms', {
            layers: 'siska:Pabrik_Kelapa_Sawit_New',
            transparent: true,
            format: 'image/png'
          });
        var TutupanSawit = L.tileLayer.wms('https://geoserver.sawitkalteng.id/geoserver/wms', {
            layers: 'siska:kalteng_tutupan_sawit_20190918',
            transparent: true,
            format: 'image/png'
          });

          var kawasanKalteng = L.tileLayer.wms('https://geoserver.sawitkalteng.id/geoserver/wms', {
            layers: 'siska:Penunjukan_Kawasan_Hutan_Update2021_Trial',
            transparent: true,
            format: 'image/png'
          });
          var izinUsaha = L.tileLayer.betterWms('https://geoserver.sawitkalteng.id/geoserver/wms', {
            layers: 'siska:Update_Ijin_Kalteng 2021',
            transparent: true,
            format: 'image/png'
          }).addTo(map);
          var admKalteng = L.tileLayer.wms('https://geoserver.sawitkalteng.id/geoserver/wms', {
            layers: 'siska:kalteng_adm_line',
            transparent: true,
            format: 'image/png'
          }).addTo(map);


          var baseLayers = {
            'Base' : osm
          };

          var overlays = {
            'Pabrik Kelapa Sawit' : pabrik,
            'Kawasan Hutan' : kawasanKalteng,
            'Izin Usaha' : izinUsaha,
            'Tutupan Sawit' : TutupanSawit,
            'Batas Wilayah' : admKalteng,
          };
          L.control.layers(baseLayers, overlays , {collapsed:false, position:'bottomright'}).addTo(map);

     </script>
 @endpush
