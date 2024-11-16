<?php 
//Escribe un script que usa un bucle whilepara mostrar la tabla de multiplicar de un número almacenado en la variable $number. 
//El bucle debe continuar hasta que la multiplicación llegue a 10 veces el número.

$num =3;
$contador =0;

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
        <?
        while($contador<11){
            echo $num .' * '.$contador.' = '.($num*$contador);
            echo '<br>';
            $contador = $contador +1;
        }
        ?>
    </p>
</body>
</html>