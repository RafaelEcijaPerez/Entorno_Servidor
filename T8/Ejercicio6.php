<?php

// Configuración inicial del evento con zona horaria
$zonaHorariaEvento = new DateTimeZone('Europe/London'); // Zona horaria del evento
$inicio = new DateTime('2024-10-16 15:30:00', $zonaHorariaEvento);
$duracionDias = 0;
$duracionHoras = 3;
$duracionMinutos = 15;
$intervaloRepeticion = 7; // Días entre repeticiones (1 semana)
$periodoMeses = 2; // Duración total del periodo en meses

// Calcular la fecha de fin del evento
$fin = clone $inicio;
$fin->modify("+{$duracionDias} days +{$duracionHoras} hours +{$duracionMinutos} minutes");

// Zonas horarias de conversión
$zonasHorarias = [
    'Nueva York' => new DateTimeZone('America/New_York'),
    'Tokio' => new DateTimeZone('Asia/Tokyo'),
];

// Mostrar información del evento inicial en diferentes zonas horarias
echo "Evento inicial:<br>";
foreach ($zonasHorarias as $ciudad => $zona) {
    $inicioLocal = clone $inicio;
    $inicioLocal->setTimezone($zona);
    $finLocal = clone $fin;
    $finLocal->setTimezone($zona);
    echo "$ciudad: Inicio: " . $inicioLocal->format('d/m/Y H:i:s T') . " - Fin: " . $finLocal->format('d/m/Y H:i:s T') . "<br>";
}

echo "<br>Eventos recurrentes:<br>";
$fechaActual = clone $inicio;
$fechaLimite = clone $inicio;
$fechaLimite->modify("+{$periodoMeses} months");

while ($fechaActual < $fechaLimite) {
    $fechaFin = clone $fechaActual;
    $fechaFin->modify("+{$duracionDias} days +{$duracionHoras} hours +{$duracionMinutos} minutes");
    
    foreach ($zonasHorarias as $ciudad => $zona) {
        $fechaActualLocal = clone $fechaActual;
        $fechaActualLocal->setTimezone($zona);
        $fechaFinLocal = clone $fechaFin;
        $fechaFinLocal->setTimezone($zona);
        echo "$ciudad: Inicio: " . $fechaActualLocal->format('d/m/Y H:i:s T') . " - Fin: " . $fechaFinLocal->format('d/m/Y H:i:s T') . "<br>";
    }
    
    $fechaActual->modify("+{$intervaloRepeticion} days");
}
?>
