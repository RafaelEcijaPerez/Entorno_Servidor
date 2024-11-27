<?php 
$dimension1;
$dimension2;
$figura;
function calculararea($dimension1,$dimension2 =null,$figura="Cuadrado"){
    
    if ($figura=="cuadrado") {
        return $dimension1*$dimension1;
    }
    if($figura=="Rectangulo")
    {
        return $dimension2 * $dimension1;
    }
    
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
    <?=calculararea(4,3,"Rectangulo")?>
</body>
</html>