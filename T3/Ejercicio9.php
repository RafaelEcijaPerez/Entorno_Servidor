<?php
$stock_items = [
    'Chocolate' => 25,
    'Gum' => 10,
    'Candy' => 5,
    'Lollipops' => 0,
    'Jelly Beans' => 10
];

function get_stock_message($stock)
{
    if ($stock > 10) {
        return 'Good availability';
    }
    if ($stock === 10) {
        return 'Exactly 10 items in stock'; // Caso específico para stock de 10
    }
    if ($stock > 0 && $stock < 10) {
        return 'Low stock';
    }
    return 'Out of stock';
}

// Obtener las claves y valores de $stock_items
$product_names = array_keys($stock_items);
$stock_values = array_values($stock_items);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Multiple Return Statements</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <h1>The Candy Store</h1>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Product</th>
                <th>Stock Status</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($product_names); $i++): ?>
                <tr>
                    <td><?= $product_names[$i] ?></td> <!-- Sin htmlspecialchars -->
                    <td><?= get_stock_message($stock_values[$i]) ?></td>
                </tr>
            <?php endfor; ?> 
        </tbody>
    </table>
</body>

</html>
