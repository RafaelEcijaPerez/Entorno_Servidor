<?php
$valor = $_GET['valor'];
$unidad_origen = $_GET['unidad_origen'];
$unidad_destino = $_GET['unidad_destino'];

// Conversiones
    switch ($unidad_origen) {
        case 'metros':
            $valor_en_metros = $valor;
            break;
        case 'kilometros':
            $valor_en_metros = $valor * 1000;
            break;
        case 'centimetros':
            $valor_en_metros = $valor * 0.01;
            break;
        case'milimetros':
            $valor_en_metros = $valor * 0.001;
            break;
    }
    switch ($unidad_destino) {
        case 'metros':
            $valor_en_destino = $valor_en_metros;
            break;
        case 'kilometros':
            $valor_en_destino = $valor_en_metros / 1000;
            break;
        case 'centimetros':
            $valor_en_destino = $valor_en_metros * 100;
            break;
        case'milimetros':
            $valor_en_destino = $valor_en_metros * 1000;
            break;
    }
    $resultado = $valor_en_destino;
    echo "El valor convertido es: ". $resultado. " ". $unidad_destino;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Unidades</title>
</head>
<body>
    <h1>Conversor de Unidades</h1>
    <form action="" method="get">
        <label for="valor">Valor a convertir:</label>
        <input type="number" step="any" name="valor" id="valor" required>
        <br><br>

        <label for="unidad_origen">Convertir de:</label>
        <select name="unidad_origen" id="unidad_origen" required>
            <option value="metros">Metros</option>
            <option value="kilometros">Kilómetros</option>
            <option value="centimetros">Centímetros</option>
            <option value="milimetros">Milímetros</option>
        </select>
        <br><br>

        <label for="unidad_destino">A:</label>
        <select name="unidad_destino" id="unidad_destino" required>
            <option value="metros">Metros</option>
            <option value="kilometros">Kilómetros</option>
            <option value="centimetros">Centímetros</option>
            <option value="milimetros">Milímetros</option>
        </select>
        <br><br>

        <button type="submit">Convertir</button>
    </form>

    <?php     
        
    ?>
</body>
</html>
