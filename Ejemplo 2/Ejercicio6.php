<?php 
$precio = 10;
$descuento = 0.1;
$limite =0.5;
$contador =1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table style="border: 3px solid black; border-collapse: collapse;">
    <?php
        do {
            echo '<tr>
                <td style="border: 1px solid black;">'.
                    $precio * $contador.
                '</td>
                <td style="border: 1px solid black;">'.
                    $descuento.
                '</td>
                <td style="border: 1px solid black;">'.
                    ($precio * $contador) * (1 - $descuento).
                '</td>
            </tr>';
            $contador = $contador + 1;
            $descuento = $descuento + 0.1;
        } while ($descuento <= $limite);
    ?>
</table>
</body>
</html>