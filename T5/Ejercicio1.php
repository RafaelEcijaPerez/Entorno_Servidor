<?php
// Texto de entrada
$entradaBlog = "Bienvenido a nuestro blog. Aprende y comparte conocimiento.";

// Transformaciones
$textoMayusculas = strtoupper($entradaBlog);
$textoCapitalizado = ucwords($entradaBlog);
$longitudTexto = strlen($entradaBlog);
$longitudSinEspacios = strlen(str_replace(' ', '', $entradaBlog));
$totalPalabras = str_word_count($entradaBlog);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Análisis del texto de la entrada del blog</h2>
    <strong>Texto original:</strong><?=$entradaBlog ?><br>
    <strong>Texto en mayúsculas:</strong><?= $textoMayusculas ?><br>
    <strong>Texto capitalizado:</strong><?= $textoCapitalizado ?><br>
    <strong>Longitud total del texto:</strong><?= $longitudTexto?> caracteres<br>
    <strong>Longitud sin espacios:</strong><?=$longitudSinEspacios ?> caracteres<br>
    <strong>Total de palabras:</strong><?= $totalPalabras ?> palabras<br>
</body>

</html>