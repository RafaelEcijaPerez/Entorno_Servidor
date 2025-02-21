<?php
session_start();

$productos = [
    ["id" => 1, "nombre" => "Producto A", "precio" => 10.99],
    ["id" => 2, "nombre" => "Producto B", "precio" => 15.50],
    ["id" => 3, "nombre" => "Producto C", "precio" => 7.25],
];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["producto_id"])) {
    $producto_id = $_POST["producto_id"];
    foreach ($productos as $producto) {
        if ($producto["id"] == $producto_id) {
            $_SESSION["carrito"][] = $producto;
            break;
        }
    }
    header("Location: carrito.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>

<body>
    <h1>Lista de Productos</h1>
    <ul>
        <?php foreach ($productos as $producto): ?>
            <li>
                <?php echo htmlspecialchars($producto["nombre"]); ?> - $
                <?php echo number_format($producto["precio"], 2); ?>
                <form method="POST" action="products.php" style="display:inline;">
                    <input type="hidden" name="producto_id" value="<?php echo $producto["id"]; ?>">
                    <button type="submit">Añadir al carrito</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="carrito.php">Ver carrito</a>
</body>

</html>