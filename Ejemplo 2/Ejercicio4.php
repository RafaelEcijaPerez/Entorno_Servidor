<?php 
//Crea un programa que utilice una estructura switch para determinar la oferta del día. 
//Usa una variable $day que almacene un día de la semana. 
//Dependiendo del día, se muestra una oferta distinta.
$day ="jueves";

switch ($day){
    case "Lunes":
        $descuento ="No hay";
        break;
    case "Martes":
        $descuento ="No hay";
        break;
    case "Miercoles":
        $descuento ="Descuento en putas";
        break;
    case "jueves":
        $descuento ="loco";
        break;
    default:
        $descuento ="Putas";
    break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?=$descuento?></p>
</body>
</html>