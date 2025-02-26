<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Longitudes</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
    <div class="row">
        <div class="col-sm-12">
            <div class="Encabezado">
                <h1>Conversor de Longitudes</h1>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-6">

            <div class="Centro">
                <form method="POST">
                    <br>
                    <br>

                    <label for="cantidad">Cantidad:</label>
                    <input type="number" min="0.01" step="any" name="cantidad" required>

                    <label for="unidad">Unidad:</label>
                    <select name="unidad">
                        <option value="metros">Metros</option>
                        <option value="pulgadas">Pulgadas</option>
                        <option value="yardas">Yardas</option>
                        <option value="pies">Pies</option>
                    </select>
                    <br>
                    <br>
                    <button class="Conv" type="submit">Convertir</button>

                </form>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="Centro"> <?php echo "<h3>Resultados:</h3>";
            ?>


                <?php
                if (isset($_POST['unidad'])) {
                    $cantidad = floatval($_POST["cantidad"]);
                    $unidad = $_POST["unidad"];

                    // Factores de conversión
                    $conversiones = [
                        "metros" => ["pulgadas" => 39.3701, "yardas" => 1.09361, "pies" => 3.28084],
                        "pulgadas" => ["metros" => 0.0254, "yardas" => 0.0277778, "pies" => 0.0833333],
                        "yardas" => ["metros" => 0.9144, "pulgadas" => 36, "pies" => 3],
                        "pies" => ["metros" => 0.3048, "pulgadas" => 12, "yardas" => 0.333333]
                    ];


                    echo "<p>{$cantidad} {$unidad} equivale a:</p>";

                    foreach ($conversiones[$unidad] as $destino => $factor) {
                        echo "<li>" . round($cantidad * $factor, 2) . " " . $destino . "</li>";
                    }

                    echo "<ul>";
                    echo "</ul>";
                }
                ?>
            </div>


        </div>
    </div>
    <br>
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