<?php 
//Diseña un programa que utiliza un bucle for para mostrar los precios de varios paquetes de un producto. 
//Usa una variable $pricepara el precio por unidad y repite el bucle 10 veces, mostrando el precio total de los paquetes.

$pricepara = 10
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><? 
        for ($i=1; $i <11 ; $i++) { 
            echo $pricepara *$i;
            echo '<br>';
        }
    
    ?></p>
</body>
</html>