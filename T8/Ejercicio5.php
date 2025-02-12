<?php

// Configuración inicial del evento
$inicio = new DateTime('2025-02-16 15:30:00'); // Fecha de inicio del evento
$duracionDias = 0;
$duracionHoras = 3;
$duracionMinutos = 15;
$intervaloRepeticion = 7; // Días entre repeticiones (1 semana)
$periodoMeses = 2; // Duración total del periodo en meses

// Calcular la fecha de fin del evento
$fin = clone $inicio;
$fin->modify("+{$duracionDias} days +{$duracionHoras} hours +{$duracionMinutos} minutes");

// Mostrar información del evento inicial
echo "Evento inicial:<br>";
echo "Inicio: " . $inicio->format('d/m/Y H:i:s') . " - Fin: " . $fin->format('d/m/Y H:i:s') . "<br>";
echo "Duración: {$duracionDias} días, {$duracionHoras} horas, {$duracionMinutos} minutos<br><br>";

// Generar eventos recurrentes
$fechaActual = clone $inicio;
$fechaLimite = clone $inicio;
$fechaLimite->modify("+{$periodoMeses} months");

echo "Eventos recurrentes:<br>";
while ($fechaActual < $fechaLimite) {
    $fechaFin = clone $fechaActual;
    $fechaFin->modify("+{$duracionDias} days +{$duracionHoras} hours +{$duracionMinutos} minutes");
    
    echo "Inicio: " . $fechaActual->format('d/m/Y H:i:s') . " - Fin: " . $fechaFin->format('d/m/Y H:i:s') . "<br>";
    
    $fechaActual->modify("+{$intervaloRepeticion} days");
}
?>
