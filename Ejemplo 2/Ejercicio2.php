<?php 
// Crea un programa que verifique si un artículo está en stock.
// Usa una variable $stockpara almacenar la cantidad de artículos. 
//Si hay artículos disponibles, muestra "En stock"; si no, muestra "Agotado".

$stockpara = 0;

$existencias =$stockpara>0? "En stock" : "Agotado";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?= $existencias?></p>
</body>
</html>