<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora de Consumo de Gasolina</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style3.css">

</head>

<body>
  <div class="row">
    <div class="col-sm-12">
      <div class="Encabezado">
        <h1>Calculo de Consumo de Gasolina</h1>
      </div>
    </div>

  </div>

  <div class="row">

    <div class="col-sm-6">
      <div class="Centro">
        <form method="POST">
          <label for="vehiculo">Seleccione un vehículo:</label>
          <select name="vehiculo" id="vehiculo" required>
            <option value="camion_5ton">Camión 5 Ton</option>
            <option value="camion_3ton">Camión 3 Ton</option>
            <option value="pickup">Pickup</option>
            <option value="panel">Panel</option>
            <option value="moto">Moto</option>
          </select><br><br>

          <label for="distancia">Ingrese la distancia a recorrer (km):</label>
          <input type="number" name="distancia" id="distancia" required min="0.001" step="any"><br><br>

          <button class="Calc" type="submit">Calcular Consumo</button>
          <br>

        </form>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="Centro"><?php echo "<h2>Resultado:</h2>" ?>
        <?php
        if (isset($_POST['distancia'])) {
          // Tabla de consumo de gasolina (gal/km)
          $consumo = [
            "camion_5ton" => 12,
            "camion_3ton" => 16,
            "pickup" => 22,
            "panel" => 28,
            "moto" => 42
          ];

          //  datos del formulario
          $vehiculo = $_POST['vehiculo'];
          $distancia = $_POST['distancia'];

          // Ver si el vehículo seleccionado existe en la tabla de consumo
          if (array_key_exists($vehiculo, $consumo)) {
            // Calcular el consumo de gasolina
            $litros_consumo = $distancia / $consumo[$vehiculo];

            // Mostrar el resultado
        
            echo "<p>Vehículo seleccionado: " . ucfirst(str_replace('_', ' ', $vehiculo)) . "</p>";
            echo "<p>Distancia recorrida: " . $distancia . " km</p>";
            echo "<p>Consumo de gasolina: " . number_format($litros_consumo, 2) . " Galones</p>";
          } else {
            echo "<p>Vehículo no válido.</p>";
          }
        }
        ?>
      </div>
    </div>


  </div>

  <br>
  <div class="row">
    <div class="col-sm-12">
      <div class="Encabezado">
        <h3>Integrantes: HM220373 y TR220316</h3>
      </div>
    </div>

  </div>
</body>

</html>