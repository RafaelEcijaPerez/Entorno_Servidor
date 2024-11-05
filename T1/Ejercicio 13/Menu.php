<?php
// Definición de los platillos como un array de arrays (simulando una base de datos básica)
$menu = [
    [
        "nombre" => "Enchiladas Verdes",
        "descripcion" => "Tortillas rellenas de pollo bañadas en salsa verde y crema.",
        "precio" => 7.49
    ],
    [
        "nombre" => "Tacos al Pastor",
        "descripcion" => "Tacos con carne de cerdo adobada, piña y cebolla.",
        "precio" => 8.00
    ],
    [
        "nombre" => "Guacamole",
        "descripcion" => "Guacamole fresco con trozos de tomate y cebolla.",
        "precio" => 2.00
    ],
    [
        "nombre" => "Aguas Frescas",
        "descripcion" => "Agua de horchata, jamaica y limón.",
        "precio" => 2.00
    ]
];

// Definición de variables adicionales para el saludo y nombre del cliente
$prefix = "Bienvenido";
$name = "Carlos"; 
$greetingMessage = "$prefix, $name. Gracias por visitar nuestro restaurante.";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú del Restaurante</title>
</head>
<body>
    <h1>Restaurante El Sabor de Casa</h1>
    <p><?= $greetingMessage ?></p>

    <h2>Menú</h2>
    <?php foreach ($menu as $platillo): ?>
        <div>
            <h3><?= $platillo['nombre'] ?></h3>
            <p><strong>Descripción:</strong> <?= $platillo['descripcion'] ?></p>
            <p><strong>Precio:</strong> $<?= number_format($platillo['precio'], 2) ?> €</p>
        </div>
        <hr>
    <?php endforeach; ?>
</body>
</html>
