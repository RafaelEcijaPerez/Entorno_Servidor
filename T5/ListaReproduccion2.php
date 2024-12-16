<?php
// Array de canciones con su respectiva cantidad de reproducciones
$canciones_con_reproducciones = [
    "Blinding Lights The Weeknd" => 1500,
    "Estoy enfermo Pignoise" => 1200,
    "Levitating Dua Lipa" => 1800,
    "One more night Maroon 5" => 1600,
    "Feel Good Inc. Gorillaz" => 1700
];

// Generar un número aleatorio de reproducciones para cada canción (si quieres hacer variaciones)
foreach ($canciones_con_reproducciones as $cancion => $reproduccion) {
    // Genera un número aleatorio entre 50 y 1000 para las reproducciones de cada canción
    $canciones_con_reproducciones[$cancion] = mt_rand(50, 1000);
}

// Mostrar las canciones con las nuevas reproducciones aleatorias
echo "<h2>Reproducciones Aleatorias Generadas:</h2>";
foreach ($canciones_con_reproducciones as $cancion => $reproduccion) {
    echo $cancion . " - Reproducciones: " . $reproduccion . "<br>";
}

// 1. Ordenar la lista por nombre de canción en orden ascendente usando ksort
ksort($canciones_con_reproducciones);  // Ordena el array por las claves (nombres de canciones) en orden ascendente
echo "<h2>Lista Ordenada por Nombre de Canción (Ascendente):</h2>";
foreach ($canciones_con_reproducciones as $cancion => $reproduccion) {
    echo $cancion . " - Reproducciones: " . $reproduccion . "<br>";
}

// 2. Ordenar la lista por nombre de canción en orden descendente usando krsort
krsort($canciones_con_reproducciones);  // Ordena el array por las claves (nombres de canciones) en orden descendente
echo "<h2>Lista Ordenada por Nombre de Canción (Descendente):</h2>";
foreach ($canciones_con_reproducciones as $cancion => $reproduccion) {
    echo $cancion . " - Reproducciones: " . $reproduccion . "<br>";
}

// 3. Ordenar la lista por número de reproducciones en orden ascendente usando asort
asort($canciones_con_reproducciones);  // Ordena el array por los valores (número de reproducciones) en orden ascendente
echo "<h2>Lista Ordenada por Número de Reproducciones (Ascendente):</h2>";
foreach ($canciones_con_reproducciones as $cancion => $reproduccion) {
    echo $cancion . " - Reproducciones: " . $reproduccion . "<br>";
}

// 4. Ordenar la lista por número de reproducciones en orden descendente usando arsort
arsort($canciones_con_reproducciones);  // Ordena el array por los valores (número de reproducciones) en orden descendente
echo "<h2>Lista Ordenada por Número de Reproducciones (Descendente):</h2>";
foreach ($canciones_con_reproducciones as $cancion => $reproduccion) {
    echo $cancion. " - Reproducciones: " . $reproduccion. "<br>";
}

// 5. Ordenar la lista por clave (nombre de la canción) en orden ascendente usando ksort
ksort($canciones_con_reproducciones); // Ordena el array por las claves (nombres de las canciones) en orden ascendente
echo "<h2>Lista Ordenada por Clave (Ascendente):</h2>";
foreach ($canciones_con_reproducciones as $cancion => $reproduccion) {
    echo $cancion. " - Reproducciones: " . $reproduccion. "<br>";
}

// 6. Ordenar la lista por clave (nombre de la canción) en orden descendente usando krsort
krsort($canciones_con_reproducciones); // Ordena el array por las claves (nombres de las canciones) en orden descendente
echo "<h2>Lista Ordenada por Clave (Descendente):</h2>";
foreach ($canciones_con_reproducciones as $cancion => $reproduccion) {
    echo $cancion. " - Reproducciones: " . $reproduccion. "<br>";
}
?>
