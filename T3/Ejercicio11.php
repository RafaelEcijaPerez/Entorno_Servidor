<?php
function calculate_cost($cost, $quantity, $discount = 0, $tax = 20, $shipping = 0)
{
    $cost = $cost * $quantity;
    $tax = $cost * ($tax / 100); // Calcular el impuesto como porcentaje
    return ($cost + $tax + $shipping) - $discount; // Incluir el costo de envío
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Default Values for Parameters</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <h1>The Candy Store</h1>
    <h2>Chocolates</h2>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Product</th>
                <th>Cost</th>
                <th>Quantity</th>
                <th>Discount</th>
                <th>Tax (%)</th>
                <th>Shipping</th>
                <th>Total Cost</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Dark Chocolate</td>
                <td>$5</td>
                <td>10</td>
                <td>$2</td>
                <td>5%</td>
                <td>$3</td>
                <td>$<?= calculate_cost(cost: 5, quantity: 10, tax: 5, discount: 2, shipping: 3) ?></td>
            </tr>
            <tr>
                <td>Milk Chocolate</td>
                <td>$3</td>
                <td>8</td>
                <td>$0</td>
                <td>10%</td>
                <td>$5</td>
                <td>$<?= calculate_cost(cost: 3, quantity: 8, tax: 10, shipping: 5) ?></td>
            </tr>
            <tr>
                <td>White Chocolate</td>
                <td>$4</td>
                <td>15</td>
                <td>$10</td>
                <td>8%</td>
                <td>$2</td>
                <td>$<?= calculate_cost(cost: 4, quantity: 15, discount: 10, tax: 8, shipping: 2) ?></td>
            </tr>
            <tr>
                <td>Hazelnut Chocolate</td>
                <td>$6</td>
                <td>12</td>
                <td>$5</td>
                <td>12%</td>
                <td>$4</td>
                <td>$<?= calculate_cost(cost: 6, quantity: 12, tax: 12, discount: 5, shipping: 4) ?></td>
            </tr>
            <tr>
                <td>Caramel Chocolate</td>
                <td>$7</td>
                <td>5</td>
                <td>$3</td>
                <td>15%</td>
                <td>$6</td>
                <td>$<?= calculate_cost(cost: 7, quantity: 5, tax: 15, discount: 3, shipping: 6) ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>