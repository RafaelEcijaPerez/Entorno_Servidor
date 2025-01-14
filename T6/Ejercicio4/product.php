<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
</head>
<body>
    <?php
    // Lista de productos con sus descripciones
    $productos = [
        'Manzana' => 3.45,
        'Platano' => 2.45,
        'Melon' => 3.67,
    ];

    // Verificar si el parámetro 'nombre' existe en la URL
    if (isset($_GET['nombre'])) {
        $nombre = urldecode($_GET['nombre']); // Decodificar el nombre desde la URL
        if (array_key_exists($nombre, $productos)) {
            echo "<h1>$nombre</h1>";
            echo "<p>{$productos[$nombre]}</p>";
        } else {
            echo "<h1>Producto no encontrado</h1>";
        }
    } else {
        header('location:errorpage.php');
    }
    ?>
    <p><a href="index.php">Volver a la lista de productos</a></p>
</body>
</html>
