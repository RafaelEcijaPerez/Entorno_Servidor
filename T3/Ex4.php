<?php 
/*
Haz una función que genere contraseñas aleatorias. Usa una variable estática para contar
cuántas contraseñas se han generado y un parámetro opcional para especificar la longitud
de la contraseña.

*/
function generarcontraseña($longitud = 10) {
    // Declaramos una variable estática para contar las contraseñas generadas
    static $contador = 0;
    
    // Definimos los caracteres que pueden formar parte de la contraseña
    $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+[]{}|;:,.<>/?';
    
    // Generamos la contraseña
    $contraseña = '';
    for ($i = 0; $i < $longitud; $i++) {
        $contraseña.= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    
    // Incrementamos el contador de contraseñas generadas
    $contador++;
    
    // Devolvemos la contraseña y el número de contraseñas generadas
    return array('contraseña' => $contraseña, 'contador' => $contador);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Generador de contraseñas</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            h1 {
                text-align: center;
            }
            #contraseña {
                margin-top: 20px;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 20px;
            }
            #contador {
                margin-top: 10px;
                font-size: 16px;
            }
        </style>
    </head>
    <body>
        <h1>Generador de contraseñas</h1>
        
        <?php
        // Generamos y mostramos una contraseña
        $contraseña = generarcontraseña();
        echo '<p id="contraseña">'. $contraseña['contraseña']. '</p>';

        $contraseña = generarcontraseña();
        echo '<p id="contraseña">'. $contraseña['contraseña']. '</p>';

        $contraseña = generarcontraseña();
        echo '<p id="contraseña">'. $contraseña['contraseña']. '</p>';
        
        // Mostramos el número de contraseñas generadas
        echo '<p id="contador">Contraseñas generadas: '. $contraseña['contador']. '</p>';
       ?>
       
    </body>
</html>