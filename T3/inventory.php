<?php
declare(strict_types=1);

// Configuración de datos de inventario
$Libros = [
    [
        'Titulo' => 'El Quijote',
        'Precio' => 15.50,
        'stock' => 30
    ],
    [
        'Titulo' => 'Cien Años de Soledad',
        'Precio' => 12.99,
        'stock' => 20
    ],
    [
        'Titulo' => '1984',
        'Precio' => 10.00,
        'stock' => 50
    ],
    [
        'Titulo' => 'La Sombra del Viento',
        'Precio' => 18.75,
        'stock' => 15
    ]
];

// Tasa de Impuesto
$tax_rate = 12; // Representa el 12%

// Funciones
// Calcula el total de stock de todos los libros
function get_total_stock(array $Libros): int {
    $total_stock = 0;
    foreach ($Libros as $book) {
        $total_stock += $book['stock'];
    }
    return $total_stock;
}
// Calcula el valor total del inventario
function get_inventory_value(float $Precio, int $stock): float {
    return $Precio * $stock;
}
// Calcula el valor total de impuestos
function calculate_tax(float $inventory_value, float $tax_rate): float {
    return $inventory_value * ($tax_rate / 100);
}
?>
<!DOCTYPE html>
<html>
<head>
    <Titulo>Inventario de libros</Titulo>
    <link rel="stylesheet" href="css/libros.css">
</head>
<body>
    <h1>Inventario de libros</h1>

    <table border="1">
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

            foreach ($Libros as $book): 
                $inventory_value = get_inventory_value($book['Precio'], $book['stock']);
                $tax_amount = calculate_tax($inventory_value, $tax_rate);
                $total_inventory_value += $inventory_value;
            ?>
                <tr>
                    <td><?= $book['Titulo'] ?></td>
                    <td><?= number_format($book['Precio'], 2) ?>€</td>
                    <td><?= $book['stock'] ?></td>
                    <td><?= number_format($inventory_value, 2) ?>€</td>
                    <td><?= number_format($tax_amount, 2) ?>€</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Informacion</h2>
    <p>Total libros en Stock: <?= get_total_stock($Libros) ?></p>
    <p>Total valor del  inventario: <?= number_format($total_inventory_value, 2) ?>€</p>
    <p>Total tasa: <?= number_format(calculate_tax($total_inventory_value, $tax_rate), 2) ?>€</p>
</body>
</html>
