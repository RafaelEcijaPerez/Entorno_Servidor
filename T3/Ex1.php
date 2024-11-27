<?php 
$numero;

//Function que muestra una tabla
function creartabla($numero): void{
    echo '<table border=1>';
    for ($i=1; $i <11 ; $i++) { 
        echo '<tr>';
        echo '<td>';
            echo $numero;
        echo '</td>';
        echo '<td>';
            echo '*';
        echo '</td>';
        echo '<td>';
            echo $i;
        echo '</td>';
        echo '<td>';
            echo '=';
        echo '</td>';
        echo '<td>';
            echo $i *$numero;
        echo '</td>';

    }
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
    <?= creartabla(2) ?>
</body>
</html>