<?php
// Texto del artículo
$texto = 'El ejercicio no solo mejora la condición física, sino que también tiene un impacto significativo en la salud mental. Actividades como caminar, correr o practicar yoga reducen el estrés, mejoran el estado de ánimo y combaten la ansiedad. Además, el ejercicio estimula la liberación de endorfinas, conocidas como las "hormonas de la felicidad". Incorporar actividad física en la rutina diaria es clave para mantener el equilibrio emocional y fortalecer el bienestar integral.';

// Operaciones
$palabraClave = "ejercicio";
$primeraAparicion = stripos($texto, $palabraClave);
$ultimaAparicion = strripos($texto, $palabraClave);

$inicioSubcadena = "El";
$finalSubcadena = "integral";

// Detectar inicio y fin de subcadenas
$inicio = stripos($texto, $inicioSubcadena);
$fin = stripos($texto, $finalSubcadena);

// Extraer la subcadena si ambos índices existen
if ($inicio !== false && $fin !== false && $inicio < $fin) {
    $extraido = substr($texto, $inicio, $fin - $inicio + strlen($finalSubcadena));
} else {
    $extraido = "No se pudo extraer texto: ";
    $extraido .= ($inicio === false) ? "Inicio no encontrado. " : "";
    $extraido .= ($fin === false) ? "Fin no encontrado." : "";
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análisis de Subcadenas</title>
</head>

<body>
    <h2>Análisis de Subcadenas</h2>
    <strong>Primera aparición de "<?= $palabraClave ?>":</strong> <?= $primeraAparicion !== false ? $primeraAparicion : "No encontrada" ?><br>
    <strong>Última aparición de "<?= $palabraClave ?>":</strong> <?= $ultimaAparicion !== false ? $ultimaAparicion : "No encontrada" ?><br>
    <strong>Texto extraído:</strong> <?= $extraido ?><br>
</body>

</html>
