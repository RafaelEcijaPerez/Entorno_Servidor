<?php
require_once 'Product.php';

// Crear instancias de la clase Product
$product1 = new Product(1, "Laptop", 1500.00, 10);
$product2 = new Product(2, "Smartphone", 800.00, 20);
$product3 = new Product(3, "Tablet");

// Actualizar propiedades de una de las instancias
$product2->updatePrice(750.00);
$product2->updateStock(25);

// Mostrar los productos en una tabla HTML
$products = [$product1, $product2, $product3];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Product List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product->id ?></td>
                    <td><?= $product->name ?></td>
                    <td><?= number_format($product->price, 2) ?></td>
                    <td><?= $product->stock ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
