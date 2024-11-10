<?php 
$name = 'Ivy'; 
$greeting = 'Hello'; 
if ($name) {  
    $greeting = 'Welcome back,' . $name;
}
$product = 'Lollipop'; 
$cost = 10; 
for ($i = 1; $i <= 20; $i++) {
    $subtotal = $cost * $i; 
    $discount = ($subtotal / 100) * ($i*4); 
    $totals[$i] = $subtotal - $discount;
}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require 'includes/header.php'; ?> 
    <p><?= $greeting ?>
    </p> <h2><?= $product ?> Discounts</h2> 
    <table> 
        <tr> 
            <th>Packs</th> 
            <th>Price</th>
        </tr> 
        <?php foreach ($totals as $quantity => $price) { ?> 
        <tr> 
            <td> <?= $quantity ?>
            pack<?= ($quantity === 1) ? '': 's'; ?> 
            </td> 
            <td> 
                $<?= $price ?> 
            </td> 
        </tr> 
        <?php } ?> 
    </table> 
    <?php include 'includes/footer.php' ?>
</body>
</html>