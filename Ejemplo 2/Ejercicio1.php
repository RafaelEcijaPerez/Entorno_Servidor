<?php 
//Enunciado: Escribe un script en PHP que salude al usuario de manera diferente si está logueado o no. 
//Usa una variable $logged_inpara indicar si el usuario ha iniciado sesión y muestra un saludo correspondiente.

$logged_inpara = false

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
    <? if($logged_inpara==true){
        echo "Bienbenido";
    }else{
        echo "Inicie sesion";
    }
    ?>
    </p>
</body>
</html>