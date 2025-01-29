<?php
//Recoger los numeros
$num1 = $_GET['num1'];
$num2 = $_GET['num2'];
$operacion = $_GET['operacion'];

// Realizar la operación según la opción seleccionada
    switch ($operacion) {
        case'suma':
            $result = $num1 + $num2;
            break;
        case'resta':
            $result = $num1 - $num2;
            break;
        case'multiplicacion':
            $result = $num1 * $num2;
            break;
        case 'division':
            if ($num2 == 0) {
                $error = "No se puede dividir por cero";
                break;
            }
            $result = $num1 / $num2;
            break;
        default:
            $error = "Operación no válida";
            break;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Básica</title>
</head>
<body>
    <h1>Calculadora Básica</h1>
    <form action="" method="get">
        <label for="num1">Número 1:</label>
        <input type="number" name="num1" id="num1" required>
        <br><br>

        <label for="num2">Número 2:</label>
        <input type="number" name="num2" id="num2" required>
        <br><br>

        <label for="operacion">Operación:</label>
        <select name="operacion" id="operacion">
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplicacion">Multiplicación</option>
            <option value="division">División</option>
        </select>
        <br><br>

        <button type="submit">Calcular</button>
    </form>
    
    <?php if (isset($error)):?>
        <h2>Error: <?= $error ?></h2>
    <?php else: ?>
        <h2>Resultado: <?= $result ?></h2>
    <?php endif; ?>

</body>
</html>
