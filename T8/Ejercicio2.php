<?php
// Fecha ingresada por el usuario
$fecha_ingresada = '16/10/2024 15:30:00';

// Convertir la fecha en un objeto DateTime
$fecha_objeto = date_create_from_format('d/m/Y H:i:s', $fecha_ingresada);

// Mostrar la fecha en formato Y-m-d H:i:s
echo "Fecha ingresada: " . $fecha_objeto->format('Y-m-d H:i:s') . "\n <br/>"; ;

// Obtener el timestamp UNIX
$timestamp = $fecha_objeto->getTimestamp();
echo "Timestamp UNIX: " . $timestamp . "\n <br>";

// Mostrar la fecha en formato legible
echo "Fecha en formato legible: " . $fecha_objeto->format('d \d\e F \d\e Y, H:i') . "\n";
?>