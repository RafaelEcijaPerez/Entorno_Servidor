<?php 
$number = 7;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <h1>Tabla de multiplicar del <?= $number ?></h1>
    <table>
        <?php
        // Declaracion del bucle
        for ($i = 1; $i <= 10; $i++) { ?>
            <tr>
                <!-- Mostrar el numero de la tabla que va a multiplicar -->
                <td><?= $number ?></td>

                <!-- Mostrar el símbolo * -->
                <td>*</td>

                <!-- Mostrar el número del bucle -->
                <td><?= $i ?></td>

                <!-- Mostrar el símbolo = -->
                <td>=</td>

                <!-- Mostrar el resultado de la multiplicación -->
                <td><?= $number * $i ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
