<?php
declare(strict_types=1);

// Configuración de datos de inventario
$books = [
    [
        'title' => 'El Quijote',
        'price' => 15.50,
        'stock' => 30
    ],
    [
        'title' => 'Cien Años de Soledad',
        'price' => 12.99,
        'stock' => 20
    ],
    [
        'title' => '1984',
        'price' => 10.00,
        'stock' => 50
    ],
    [
        'title' => 'La Sombra del Viento',
        'price' => 18.75,
        'stock' => 15
    ]
];

// Tasa de Impuesto
$tax_rate = 12; // Representa el 12%

// Funciones
function get_total_stock(array $books): int {
    $total_stock = 0;
    foreach ($books as $book) {
        $total_stock += $book['stock'];
    }
    return $total_stock;
}

function get_inventory_value(float $price, int $stock): float {
    return $price * $stock;
}

function calculate_tax(float $inventory_value, float $tax_rate): float {
    return $inventory_value * ($tax_rate / 100);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventory Management - Bookstore</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Bookstore Inventory Management</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Tittulo</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Valor Inventario</th>
                <th>Tasa</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total_inventory_value = 0;
            foreach ($books as $book): 
                $inventory_value = get_inventory_value($book['price'], $book['stock']);
                $tax_amount = calculate_tax($inventory_value, $tax_rate);
                $total_inventory_value += $inventory_value;
            ?>
                <tr>
                    <td><?= $book['title'] ?></td> <!-- Eliminado htmlspecialchars -->
                    <td><?= number_format($book['price'], 2) ?>€</td>
                    <td><?= $book['stock'] ?></td>
                    <td><?= number_format($inventory_value, 2) ?>€</td>
                    <td><?= number_format($tax_amount, 2) ?>€</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Informacion</h2>
    <p>Total libros en Stock: <?= get_total_stock($books) ?></p>
    <p>Total valor del  inventario: <?= number_format($total_inventory_value, 2) ?>€</p>
    <p>Total tasa: <?= number_format(calculate_tax($total_inventory_value, $tax_rate), 2) ?>€</p>
</body>
</html>
