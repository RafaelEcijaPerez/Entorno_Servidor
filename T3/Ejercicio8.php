<?php
declare(strict_types=1);

$price = 4.5; // Cambiado a un valor float
$quantity = 3;

// Uso de tipos de unión en PHP 8 para aceptar int o float
function calculate_total(int|float $price, int $quantity): int|float
{
    return $price * $quantity;
}

$total = calculate_total($price, $quantity);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Return Type Declarations</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <h1>The Candy Store</h1>
    <h2>Chocolates</h2>
    <p>Total $<?= $total ?></p>
</body>

</html>
