<?php 
$stock =0;

if($stock >0){
    $mensaje ="In stock";
} else{
    $mensaje = "More stock coming soon";
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