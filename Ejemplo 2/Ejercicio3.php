<?php 
//Diseña un script en PHP que calcula si un cliente es elegible para un descuento basado en su edad. 
//Usa una variable $agey un operador ternario para determinar si es menor de 18 años. 
//Si lo es, almacena "Descuento aplicable" en una variable, y si no, almacena "Sin descuento".

$age = 12;

$descuento = $age>18 ?"Descuento aplicable" :"No se puede aplicar descuento";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
        <?=$descuento?>
    </p>
</body>
</html>