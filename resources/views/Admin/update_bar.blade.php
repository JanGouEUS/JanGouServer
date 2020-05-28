@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>{{ __('createTaberna.title') }}</h1> --}}

@stop

@section('content')

<update-taberna> </update-taberna>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.css' rel='stylesheet' />
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    {{-- <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.js"></script> --}}
    <script src="vue-mapbox-gl.min.js"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.js'></script>
    <script>
  
  mapboxgl.accessToken = 'pk.eyJ1IjoiYXJrYWl0enNrdXJhIiwiYSI6ImNqdzdlbHN5ZTAzamg0OXAyeW13Mm12dGMifQ.YGh-O7mP9Dv4sGTtg2hsIw';
    var lat =document.getElementById('lat').value 
    var lng =document.getElementById('lng').value 
    var zoom = 13
   
    document.getElementById('mapa').addEventListener('click', (event) => {
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/dark-v9',
            center: [lat, lng],
            zoom: 6
            });
            console.log('lista',lat,lng)
        var latREACT =document.getElementById('lat').value 
        var lngREACT =document.getElementById('lng').value 
        map.flyTo({
            center: [latREACT,lngREACT],
            zoom:17,
            essential: true // this animation is considered essential with respect to prefers-reduced-motion
        });
        console.log('lista',latREACT,lngREACT)
        var marker = new mapboxgl.Marker().setLngLat([latREACT, lngREACT]).addTo(map);
        map.on('click', function(e) {
            // document.getElementById('info').innerHTML =
            // JSON.stringify(e.lngLat.wrap().lat)+JSON.stringify(e.lngLat.wrap().lng);
            // // JSON.stringify(e.point) +
            // // '<br />' +
            var LAT = JSON.stringify(e.lngLat.wrap().lat);
            var LNG = JSON.stringify(e.lngLat.wrap().lng);
            document.getElementById('lat').value= JSON.stringify(e.lngLat.wrap().lng) 
            document.getElementById('lng').value=JSON.stringify(e.lngLat.wrap().lat)
            marker.setLngLat([LNG, LAT])
            .addTo(map);
        });
    })
    var marker = new mapboxgl.Marker().setLngLat([lat, lng]).addTo(map);
    document.getElementById('place').addEventListener('change', (event) => {
        console.log(event)
        marker.setLngLat([lat, lng]).addTo(map);
   
    })

    document.getElementById('lista').addEventListener('click', (event) => {
        console.log('lista',lat,lng)
        var latREACT =document.getElementById('lat').value 
        var lngREACT =document.getElementById('lng').value 
        map.flyTo({
            center: [latREACT,lngREACT],
            zoom:17,
            essential: true // this animation is considered essential with respect to prefers-reduced-motion
        });
        console.log('lista',latREACT,lngREACT)
        marker.setLngLat([latREACT, lngREACT]).addTo(map);
        
    })

    // map.on('click', function(e) {
    //         // document.getElementById('info').innerHTML =
    //         // JSON.stringify(e.lngLat.wrap().lat)+JSON.stringify(e.lngLat.wrap().lng);
    //         // // JSON.stringify(e.point) +
    //         // // '<br />' +
    //         var LAT = JSON.stringify(e.lngLat.wrap().lat);
    //         var LNG = JSON.stringify(e.lngLat.wrap().lng);
    //         document.getElementById('lat').value= JSON.stringify(e.lngLat.wrap().lng) 
    //         document.getElementById('lng').value=JSON.stringify(e.lngLat.wrap().lat)
    //         marker.setLngLat([LNG, LAT])
    //         .addTo(map);
    //     });
  
    </script>
    
@stop
