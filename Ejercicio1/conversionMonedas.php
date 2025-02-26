<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertidor de Bases Numéricas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/conversor.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">

        <div class="row">
            <div class="col">
                <h1 class="titulo">Mi conversor</h1>
            </div>
            <div class="col">
                <img class="imagenCalcu" src="img/calculadora.jpg" alt="calculadora">
            </div>
        </div>

        <form id="frmConversion" method="POST" class="mt-4">


            <div class="mb-3 centrado">
                <input type="number" name="valorEntrada" id="valorEntrada" class="form-control campoNumero" required
                    min="1" step="0.01"
                    value="<?php echo isset($_POST['valorEntrada']) ? $_POST['valorEntrada'] : ''; ?>">
            </div>



            <div class="mb-3" style="margin-left:32%">
                <select name="monedaActual" id="monedaActual" class="form-select campoMoneda" required>
                    <option value="USD" <?php echo (isset($_POST['monedaActual']) && $_POST['monedaActual'] == 'USD') ? 'selected' : ''; ?>>Dólar Estadounidense ($)</option>
                    <option value="EUR" <?php echo (isset($_POST['monedaActual']) && $_POST['monedaActual'] == 'EUR') ? 'selected' : ''; ?>>Euro (€)</option>
                    <option value="JPY" <?php echo (isset($_POST['monedaActual']) && $_POST['monedaActual'] == 'JPY') ? 'selected' : ''; ?>>Yen Japonés (¥)</option>
                    <option value="GBP" <?php echo (isset($_POST['monedaActual']) && $_POST['monedaActual'] == 'GBP') ? 'selected' : ''; ?>>Libra Esterlina (£)</option>
                </select>
            </div>





            <div class="row" style="margin-right: 70px;">
                <div class="col-12">
                    <button id="cambiar" type="button">
                        <h1 class="flecha">↕</h1>
                    </button>

                </div>
            </div>
            <br>





            <div class="mb-3" style="margin-left:32%">
                <select name="monedaDestino" id="monedaDestino" class="form-select campoMoneda" required>
                    <option value="USD" <?php echo (isset($_POST['monedaDestino']) && $_POST['monedaDestino'] == 'USD') ? 'selected' : ''; ?>>Dólar Estadounidense ($)</option>
                    <option value="EUR" <?php echo (isset($_POST['monedaDestino']) && $_POST['monedaDestino'] == 'EUR') ? 'selected' : ''; ?>>Euro (€)</option>
                    <option value="JPY" <?php echo (isset($_POST['monedaDestino']) && $_POST['monedaDestino'] == 'JPY') ? 'selected' : ''; ?>>Yen Japonés (¥)</option>
                    <option value="GBP" <?php echo (isset($_POST['monedaDestino']) && $_POST['monedaDestino'] == 'GBP') ? 'selected' : ''; ?>>Libra Esterlina (£)</option>
                </select>
            </div>

            <div class="mb-3" style="margin-left:39%">
                <button type="submit" class="btn btn-primary btnConvertir">Convertir</button>
            </div>

        </form>



        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <div class="mt-4">
                <?php
                $valorEntrada = (float) $_POST['valorEntrada'];
                $monedaActual = $_POST['monedaActual'];
                $monedaDestino = $_POST['monedaDestino'];

                //Tasas de conversion
                $tasaConversion = [
                    'USD' => ['USD' => 1, 'EUR' => 0.95, 'JPY' => 149.42, 'GBP' => 0.79], // 1 USD = 1 USD,    1 USD = 0.95 EUR,     1 USD = 149.42 JPY,     1 USD = 0.79 GBP
                    'EUR' => ['USD' => 1.05, 'EUR' => 1, 'JPY' => 156.63, 'GBP' => 0.83],
                    'JPY' => ['USD' => 0.0067, 'EUR' => 0.0064, 'JPY' => 1, 'GBP' => 0.0053],
                    'GBP' => ['USD' => 1.26, 'EUR' => 1.21, 'JPY' => 189.01, 'GBP' => 1]
                ];

                // Verificacion de que las monedas existan en el array
                if (isset($tasaConversion[$monedaActual]) && isset($tasaConversion[$monedaActual][$monedaDestino])) {
                    $tasa = $tasaConversion[$monedaActual][$monedaDestino];
                    $valorConvertido = $valorEntrada * $tasa;
                } else {
                    echo "Moneda no válida.";
                }

                $nombres = ['USD' => 'Dolares Americanos', 'EUR' => 'Euros', 'JPY' => 'Yenes Japonenes', 'GBP' => 'Libras esterlinas'];

                echo "<div class='alert alert-success respuesta'><strong>$valorEntrada $nombres[$monedaActual]</strong>  =  <strong>$valorConvertido $nombres[$monedaDestino]</strong> </div>";

                ?>
            </div>
        <?php endif; ?>

        <div class="carnets">
            <h3>Hecho por HM220373 y TR220316</h3>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="js/convertir.js"></script>
</body>

</html>