@extends('layouts.myLayout')
@section('title','Mapa Marcadores')
@section('style')

<!-- <title>Mapa con marcadores y polígono</title> -->
<style>
  #map {
    height: 400px;
    width: 100%;
  }
</style>
@endsection
@section('content')
<h1>Mapa con marcadores</h1>
<div id="map"></div>
@endsection
@section('script')
<script>
  let map;
  let markers = [];

  function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
      center: {
        lat: 37.7749,
        lng: -122.4194
      },
      zoom: 8,
    });

    // Añadir listener al mapa para crear marcadores al hacer click
    map.addListener("click", (event) => {
      addMarker(event.latLng);
    });
  }

  function addMarker(location) {
    // Crear un marcador con la ubicación especificada
    const marker = new google.maps.Marker({
      position: location,
      map: map,
    });

    // Añadir el marcador al array de marcadores
    markers.push(marker);

    // Si hay 3 o más marcadores, dibujar el polígono
    if (markers.length >= 3) {
      drawPolygon();
    }
  }

  function drawPolygon() {
    // Crear un array de coordenadas a partir de los marcadores
    const polygonCoords = markers.map((marker) => {
      return {
        lat: marker.getPosition().lat(),
        lng: marker.getPosition().lng(),
      };
    });

    // Crear el polígono con las coordenadas
    const polygon = new google.maps.Polygon({
      paths: polygonCoords,
      strokeColor: "#FF0000",
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: "#FF0000",
      fillOpacity: 0.35,
    });

    // Dibujar el polígono en el mapa
    polygon.setMap(map);
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
@endsection