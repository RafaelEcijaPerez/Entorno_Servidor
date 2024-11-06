<?php 
$stock =0;
$ordered = 3;

if($stock >0){
    $mensaje ="In stock";
}if ($ordered >0) {
    $mensaje ="Coming soon";
} else{
    $mensaje = "Sold out";
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
    <h1>The Candy Store</h1>
    <h2>Chocolate</h2>
    <p><?= $mensaje ?></p>
</body>
</html>