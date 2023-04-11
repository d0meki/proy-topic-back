
@extends('layouts.myLayout')
@section('title','Mapa Basico')
@section('content')
<h1>Mapa de Google</h1>
<!-- Div donde se mostrará el mapa -->
<div id="map"></div>
<!-- Inicializa el mapa -->

@endsection
@section('style')
<style>
    /* Establece el tamaño del mapa */
    #map {
        height: 400px;
        width: 100%;
    }
</style>
@endsection
@section('script')
<!-- Carga la API de Google Maps con tu clave de API -->
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"></script>
<script>
    function initMap() {
        // Crea el mapa con las opciones de configuración
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 37.7749,
                lng: -122.4194
            },
            zoom: 8
        });
    }
</script>
<script>
    initMap();
</script>
@endsection