<?php 
$day ='Wednesday';
$offer =match($day){
    'Monday' =>'20% off chocolates',
    'Tuesday' =>'5% off chocolates',
    'Saturday','Sunday' => '20% off mints',
    
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>match Expression</title>
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Offers on <?= $day; ?></h2>
    <p><?= $offer ?></p>
</body>
</html>