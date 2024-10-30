<?php
$itmes =3;
$cost =5;
$subtotal = $itmes *$cost;
$tax =($subtotal/100) *20;
$total =$subtotal +$tax;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Echo Shorthand</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <h1>The Candy Store</h1>
        <h2>Shopping Cart</h2>
        <p>Items: <?= $itmes?></p>
        <p>Cost per pack: <?=$cost ?></p>
        <p>Subtotal: <?=$subtotal ?></p>
        <p>Tax: <?=$tax ?></p>
        <p>Total: <?=$total ?></p>
    </body>
</html>
