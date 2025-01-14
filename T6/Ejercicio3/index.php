<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
</head>
<body>
    <h1>Lista de Productos</h1>
    <ul>
        <?php
        // Lista de productos
        $productos = [
            'Manzana' => 3.45,
            'Platano' => 2.45,
            'Melon' => 3.67,
        ];

        // Mostrar productos como enlaces
        foreach ($productos as $nombre => $descripcion) {
            $nombreUrl = urlencode($nombre); // Codificar el nombre para la URL
            echo "<li><a href='product.php?nombre=$nombreUrl'>$nombre</a></li>";
        }
        ?>
    </ul>
</body>
</html>
