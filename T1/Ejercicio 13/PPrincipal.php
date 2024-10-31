<?php
// Paso 1: Definir variables
$prefix = "Bienvenido";
$name = "Manuel";

// Paso 2: Concatenación de variables para crear un mensaje
// Aquí se usa la concatenación para unir el prefijo y el nombre
$message = $prefix . ", " . $name;

// Paso 3: Asignación sin concatenación
// Usamos comillas dobles para definir el mensaje final sin concatenación
$message = "$prefix, $name. Gracias por visitar nuestro restaurante.";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo de Operadores de Cadenas</title>
</head>
<body>
    <h1>Restaurante El Sabor de Casa</h1>
    <p><?= $message ?></p>
</body>
</html>
