<?php

// Array de canciones
$canciones = [
    "Blinding Lights" => "The Weeknd", //5 Años en wrestlemania pesao
    "Estoy enfermo" => "Pignoise",
    "Levitating" => "Dua Lipa ",
    "One more night" => "Maroon 5",
    "Feel Good Inc." => "Gorillaz"
];

// Agregar canciones a la lista si no existen

if (!array_key_exists("Still D.R.E.", $canciones)) {
    $canciones["Still D.R.E."] = "DR. Dre, Snoop Dogg";
}
if (!array_key_exists("My name is", $canciones)) {
    $canciones["My name is"] = "Eminem";
}
if (!array_key_exists("Lose Yourself", $canciones)) {
    $canciones["Lose Yourself"] = "Eminem";
}
if (array_key_exists("Lose Yourself", $canciones)) {
    $canciones["Lose Yourself"] = "Eminem";
}

// Usando array_unshift para agregar una canción al inicio del array
array_unshift($canciones, ["Bohemian Rhapsody" => "Queen"]);

// Usando array_push para agregar una canción al final del array
array_push($canciones, ["Shape of You" => "Ed Sheeran"]);

// Eliminar la primera canción (usando array_shift)
array_shift($canciones);

// Eliminar la última canción (usando array_pop)
array_pop($canciones);

// Buscar la canción "My name is"
$posicion = array_search("hola", $canciones);

// Verificar si la canción "Still D.R.E." está en la lista
$esta = in_array("Still D.R.E.", array_keys($canciones));

// Contar el número de canciones en la lista
$numeroCanciones = count($canciones);

// Obtener una canción aleatoria
$cancionAleatoria = array_rand($canciones);

// Mostrar la lista de reproducción como un string
$lista = implode(", ", array_keys($canciones));

// Dividir la lista de canciones en un array (por cada línea)
$cancionesDivididas = explode(", ", $lista);

// Eliminar duplicados (si existieran)
$cancionesSinDuplicados = array_unique($canciones);

// Fusionar listas de canciones con una nueva lista
$canciones2 = [
    "Houdini" => "Eminem", 
    "My House" => "Flo Rida",
    "Enemy" => "Imagine Dragons ",
    "Humble" => "Kendrick Lamar",
    "Thrift Shop" => "Macklemore"
];
$cancionesFusionadas = array_merge($canciones, $canciones2);

// Mostrar resultados
echo "<h2>Resultados:</h2>";

// Mostrar posición de "My name is"
echo "<strong>Posición de 'Hola':</strong> " . ($posicion != false ? $posicion : "No encontrado") . "<br>";

// Verificar si "Still D.R.E." está en la lista
echo "<strong>'Still D.R.E.' está en la lista?:</strong> " . ($esta ? "Sí" : "No") . "<br>";

// Mostrar número de canciones
echo "<strong>Número de canciones:</strong> " . $numeroCanciones . "<br>";

// Mostrar canción aleatoria
echo "<strong>Canción aleatoria:</strong> " . $cancionAleatoria . "<br>";

// Mostrar lista de canciones como string
echo "<strong>Lista de reproducción:</strong> " . $lista . "<br>";

// Mostrar canciones divididas
echo "<strong>Canciones divididas:</strong><br>";
foreach ($cancionesDivididas as $cancion) {
    echo $cancion ;
}
echo "<br>";
// Mostrar canciones sin duplicados
echo "<strong>Canciones sin duplicados:</strong><br>";
foreach ($cancionesSinDuplicados as $cancion => $artista) {
    echo $cancion . " - " . $artista . "<br>";
}

// Mostrar canciones fusionadas
echo "<strong>Canciones fusionadas:</strong><br>";
foreach ($cancionesFusionadas as $cancion => $artista) {
    echo $cancion . " - " . $artista . "<br>";
}

?>