<?php
//Definicion de la fechas
$inicio = new DateTime('2024-10-16 15:30:00');
$fin = new DateTime('2024-10-18 18:45:00');

// Diferencia entre las dos fechas en días, horas y minutos
$intervalo = $inicio->diff($fin);

// Mostrar las fechas y la duración en días, horas y minutos
echo "Inicio: " . $inicio->format('d/m/Y H:i:s') . " - Fin: " . $fin->format('d/m/Y H:i:s') . "<br>";
echo "Duración: {$intervalo->d} días, {$intervalo->h} horas, {$intervalo->i} minutos<br>";

//calcular cuantas horas se producen
$totalMinutos = ($intervalo->days * 24 * 60) + ($intervalo->h * 60) + $intervalo->i;
$horas = round($totalMinutos/ 60);
$minutos = $totalMinutos % 60;

echo "Duración total en horas: {$horas} horas, {$minutos} minutos<br>";

?>