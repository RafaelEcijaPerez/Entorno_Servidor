<?php
// Definimos el array de ciudades y sus direcciones
$cities = [
    'London' => '48 Store Street, WC1E 7BS',
    'Sydney' => '151 Oxford Street, 2021',
    'NYC'    => '1242 7th Street, 10492',
    'Tokyo'  => 'Chiyoda City, 1-1 Tokyo',
];

// Obtenemos la ciudad de la cadena de consulta o un valor vacío por defecto
$city = $_GET['city'] ?? '';

if ($city) {
    // Verificamos si la ciudad existe en el array
    if (array_key_exists($city, $cities)) {
        $address = $cities[$city]; // Dirección encontrada
    } else {
        $address = 'City not found'; // Error si no se encuentra la ciudad
    }
} else {
    $address = 'Please select a city'; // Mensaje cuando no se selecciona una ciudad
}
?>