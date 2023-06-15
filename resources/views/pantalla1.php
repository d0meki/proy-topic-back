

<!DOCTYPE html>
<html>
<head>
  <title>Pantalla de Bienvenida</title>
  <style>
    body {
      background-image: url('assets/concejo-municipal-de-santa-cruz-de-la-sierra.jpg');
      background-size: cover;
      background-position: center;
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    h1 {
      color: black;
      font-size: 48px;
      text-align: left;
      position: absolute;
      top: 0;
      left: 0;
      margin: 20px;
    }
    .btn {
      display: block;
      width: 200px;
      margin: 20px;
      padding: 10px;
      background-color: #4CAF50;
      color: black;
      text-align: center;
      text-decoration: none;
      font-size: 18px;
      border-radius: 4px;
      position: absolute;
      top: 0;
      right: 0;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>
<body>
  <h1>Bienvenido</h1>
  <a class="btn" href="{{route('mapaCiudadano.getvistaCiudadano')}}">Ver Mapa</a>
</body>
</html>
