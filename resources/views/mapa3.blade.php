@extends('layouts.myLayout')
@section('title','Mapa Poligonos')
@section('style')
<style>
  /* CSS para el mapa */
  #map {
    height: 500px;
    width: 100%;
  }
</style>
@endsection
@section('content')
<h1>Mapa con Poligonos</h1>
<div id="map"></div>

@endsection

@section('script')
<script>
  // Función para inicializar el mapa
  function initMap() {
    // Coordenadas iniciales del mapa
    var initialPosition = {
      lat: -17.783181,
      lng: -63.181252
    };



    // Configuración del mapa
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
      center: initialPosition

    });

    // Variable para almacenar los marcadores
    var markers = [];

    // Variable para almacenar el polígono
    var polygon = null;

    // Función para dibujar el polígono
    function drawPolygon() {
      // Si ya hay un polígono, lo eliminamos
      if (polygon) {
        polygon.setMap(null);
      }

      // Si hay al menos 3 marcadores, dibujamos el polígono
      if (markers.length >= 3) {
        var polygonPoints = markers.map(function(marker) {
          return marker.getPosition();
        });

        polygon = new google.maps.Polygon({
          paths: polygonPoints,
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.35,
          map: map
        });
      }
    }

    // Evento click en el mapa para agregar marcadores
    const image =
    "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";
    map.addListener('click', function(event) {
      // Creamos un nuevo marcador en la posición del click
      var marker = new google.maps.Marker({
        position: event.latLng,
        map: map,
        icon: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
        // icon: image,
        size: new google.maps.Size(20, 32),
        // El origen para esta imagen es (0, 0).
        origin: new google.maps.Point(0, 0),
        // El ancla para esa imagen es la base del asta bandera en (0, 32).
        anchor: new google.maps.Point(0, 32)
      });

      // Agregamos el marcador al arreglo de marcadores
      markers.push(marker);

      // Dibujamos el polígono
      drawPolygon();
    });
  }
</script>
<!-- Carga la API de Google Maps con tu clave de API -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFd1Z-5KYgRDkK1cCOVYtMhHVkqH_I-8s&callback=initMap"></script>
@endsection