<?php
// Declarar evento inicial
$evento = new DateTime('2024-10-16 15:30:00');
$formato = 'Y-m-d H:i:s'; // Definir formato de fecha

echo "Fecha inicial: " . $evento->format($formato) . "<br>";

// Cambiar la fecha del evento usando setDate()
$evento->setDate(2024, 10, 14);
echo "Después de setDate(): " . $evento->format($formato) . "<br>"; 

// Cambiar la hora del evento usando setTime()
$evento->setTime(20, 0, 0);
echo "Después de setTime(): " . $evento->format($formato) . "<br>";

// Ajustar la fecha del evento usando setTimestamp()
$nuevoTimestamp = 1735754400;
$evento->setTimestamp($nuevoTimestamp);
echo "Después de setTimestamp(): " . $evento->format($formato) . "<br>";

// Modificar la fecha con modify()
$evento->modify('+1 day');
echo "Después de modify('+1 day'): " . $evento->format($formato) . "<br>";

$evento->modify('+2 hours');
echo "Después de modify('+2 hours'): " . $evento->format($formato) . "<br>";
?>
