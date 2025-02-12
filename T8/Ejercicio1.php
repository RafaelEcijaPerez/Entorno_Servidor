<?php

// Obtener la fecha actual
$fecha_actual = time();
$fecha_actual_formateada = date("Y-m-d", $fecha_actual);

//Definir fecha de inicio del evento
$fecha_inicio_evento = strtotime("2025-4-01");

//Definir fecha de fin del evento
$fecha_fin_evento = strtotime("2025-4-02");

// Calcular diferencia en días entre la fecha actual y la fecha de inicio del evento
//Rendodear la diferencia a un número entero
$diferencia_inicio = round(($fecha_inicio_evento - $fecha_actual) / (60 * 60 * 24));

// Calcular diferencia en días entre la fecha actual y la fecha de fin del evento
$diferencia_fin = round(($fecha_fin_evento - $fecha_actual) / (60 * 60 * 24));

//Mensajes condicionales
if($diferencia_inicio > 0){
    echo "Faltan $diferencia_inicio días para el evento";
} else if($diferencia_fin > 0){
    echo "El evento está en curso";
} else {
    echo "El evento ha finalizado";
}
?>
