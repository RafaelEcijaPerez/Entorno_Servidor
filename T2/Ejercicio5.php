<?php 
    $day ='Wendnesday';

    switch ($day){
        case 'Monday':
            $offer = '20% off chocolates';
            break;
        case 'Tuesday' :
            $offer ='20% off mints';
            break;
        case 'Wendnesday':
            $offer ='50% off mints and 20% off chocolates';
            break;
        default :
            $offer ='Buy three packs, get one free';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>switch Statement</title>
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Offers on <?= $day; ?></h2>
    <p><?= $offer ?></p>
    
</body>
</html>