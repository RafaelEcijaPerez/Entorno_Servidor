<?php 
    $rows = 5;
    $columns =6;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <? for ($i=1; $i <4 ; $i++) {
        //crear la tabla 
        echo '<table>';
        //bucle para crear las filas
        for ($j=0; $j<($rows *$i) ; $j++) { 
            echo '<tr>';

            //Bucle para crear las columnas
            for ($k=0; $k <($columns * $i) ; $k++) { 
                echo '<td>';
                    //si j es igual al minimo o el maximo numero del bucle
                    if (($j ==0) ||($j ==($rows *$i) -1) ) {
                        echo '('.($j +1).','.($k +1).')';
                    }
                    //Si es igual al minimo o el maximo numero del bucle
                    elseif (($k ==0) ||($k ==($columns *$i) -1) ) {
                        echo '('.($j +1).','.($k +1).')';
                    } 
        
                echo '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        echo '<hr>';
        echo '<br>';
    }
    ?>
</body>
</html>