<?php 
$itmes ='Chocolate';
$stock =3;
$wanted =5;
$deliver =true;
$can_buy = (($wanted <= $stock) &&($deliver == true));
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Operator</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <h1>The Candy Store</h1>
        <h2>Shop+ping Cart</h2>
        <p>Item: <?= $itmes ?></p>
        <p>Stock: <?= $stock ?></p>
        <p>Wanted: <?= $wanted ?></p>
        <p>Can buy: <?= $can_buy ?></p>

    </body>
</html>
