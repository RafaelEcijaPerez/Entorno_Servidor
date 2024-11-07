<?php 
$products = [ 
    'Toffee' => 2.99, 
    'Mints' => 1.99, 
    'Fudge' => 3.49,
    ]; 
?>
<!DOCTYPE html> 
    <html> 
        <head> 
            <title>for Loop Higher Counter</title> 
            <link rel="stylesheet" href="css/styles.css"> 
        </head> 
        <body> 
            <h2>Price List</h2> 
            <table> 
                <tr> 
                    <th>Item</th> 
                    <th>Price</th> 
                </tr> 
                <?php 
                foreach ($products as $item => $price) { ?> 
                    <tr> 
                        <td><?= $item ?></td> 
                        <td>$<?= $price ?></td> 
                    </tr>
                <?php } ?>
            </table>
        </body>
    </html>