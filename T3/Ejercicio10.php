<?php
function calculate_cost($cost, $quantity, $discount = 0, $tax = 0)
{
    $cost = $cost * $quantity;
    $cost = $cost - $discount;
    $cost += $cost * ($tax / 100); // Aplicar el impuesto como porcentaje
    return $cost;
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
                <th>Total Cost</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Dark Chocolate</td>
                <td>$5</td>
                <td>10</td>
                <td>$5</td>
                <td>5%</td>
                <td>$<?= calculate_cost(5, 10, 5, 5) ?></td>
            </tr>
            <tr>
                <td>Milk Chocolate</td>
                <td>$3</td>
                <td>4</td>
                <td>$0</td>
                <td>0%</td>
                <td>$<?= calculate_cost(3, 4) ?></td>
            </tr>
            <tr>
                <td>White Chocolate</td>
                <td>$4</td>
                <td>15</td>
                <td>$20</td>
                <td>8%</td>
                <td>$<?= calculate_cost(4, 15, 20, 8) ?></td>
            </tr>
            <tr>
                <td>Hazelnut Chocolate</td>
                <td>$6</td>
                <td>8</td>
                <td>$10</td>
                <td>10%</td>
                <td>$<?= calculate_cost(6, 8, 10, 10) ?></td>
            </tr>
            <tr>
                <td>Caramel Chocolate</td>
                <td>$7</td>
                <td>5</td>
                <td>$5</td>
                <td>12%</td>
                <td>$<?= calculate_cost(7, 5, 5, 12) ?></td>
            </tr>
            <tr>
                <td>Strawberry Chocolate</td>
                <td>$4.5</td>
                <td>12</td>
                <td>$8</td>
                <td>6%</td>
                <td>$<?= calculate_cost(4.5, 12, 8, 6) ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>
