<?php
session_start();

$carrito = isset($_SESSION["carrito"]) ? $_SESSION["carrito"] : [];

if (isset($_GET["accion"]) && $_GET["accion"] == "vaciar") {
    unset($_SESSION["carrito"]);
    header("Location: carrito.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
</head>
<body>
    <h1>Carrito de Compras</h1>
    <?php if (empty($carrito)): ?>
        <p>El carrito está vacío.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($carrito as $producto): ?>
                <li>
                    <?php echo htmlspecialchars($producto["nombre"]); ?> - $
                    <?php echo number_format($producto["precio"], 2); ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <p><strong>Total: $<?php echo number_format(array_sum(array_column($carrito, 'precio')), 2); ?></strong></p>
        <a href="carrito.php?accion=vaciar">Vaciar carrito</a>
    <?php endif; ?>
    <br>
    <a href="products.php">Seguir comprando</a>
</body>
</html>