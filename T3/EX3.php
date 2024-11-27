<?php 
    //Escribe una función que genere una lista HTML ( <ul> o <ol> ) a partir de un array. Usa un parámetro opcional para indicar el tipo de lista.
    function generarlista($array, $type): string  {
        $html = '<'. $type. '>';
        foreach ($array as $item) {
            $html.= '<li>'. $item. '</li>';
        }
        $html.= '</'. $type. '>';
        return $html;
    }
    
    // Array
    $array = ['Item 1', 'Item 2', 'Item 3', 'Item 4'];
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= generarlista($array, 'ol')?>
</body>
</html>