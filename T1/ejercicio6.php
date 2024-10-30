<?php
$offers = [
['name' => 'Toffee'
,
'price' => 5,
'stock' => 120,],
['name' => 'Mints'
,
'price' => 3,
'stock' => 66,],
['name' => 'Fudge'
,
'price' => 4,
'stock' => 97,],
];
$offers[] =['name'=>'choclole','price'=>2,'stock'=>83,]
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Multimensional Arrays</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <h1>The Candy Store</h1>
        <h2>Offers</h2>
        <p>
            <?php echo $offers[0]['name']; ?>
            -<?php echo $offers[0]['price']; ?>
        </p>
        <p>
            <?php echo $offers[1]['name']; ?>
            -<?php echo $offers[2]['price']; ?>
        </p>
        <p>
            <?php echo $offers[2]['name']; ?>
            -<?php echo $offers[2]['price']; ?>
        </p>
        <p>
            <?php echo $offers[3]['name']; ?>
            -<?php echo $offers[3]['price']; ?>
        </p>
    </body>
</html>