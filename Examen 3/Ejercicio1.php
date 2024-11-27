<?php
//funcion para generar el array
function generarArrayInt($min, $max,$n=10,$value=7) {
    //inicializamos el array
    $arrayNumeros = array();
    
    //si se mete el value
    if ($value!= null) {
        //Si se mete el valor a n
        if ($n!= null) {
            for ($i=0; $i<$n ; $i++) { 
                //agregamos el valor al array
                array_push($arrayNumeros, $value);
                
                //aumentamos el valor
                $value += 1;
            }
        }
    }
    else {
        //Si no se mete el valor a n
        for ($i=0; $i <10 ; $i++) { 
            //generamos un numero aleatorio entre min y max
            $numeroAleatorio = rand($min, $max);
            
            //agregamos el numero al array
            array_push($arrayNumeros, $numeroAleatorio);
        }
    }
    
    return $arrayNumeros;
    
}
//funcion para imprimir el array

function mostrarArray($arrayNumeros) {
    foreach ($arrayNumeros as $numero) {
        echo $numero. ", ";
    }
}

//funcion para imprimir el minimo del array
function minimoArray($arrayNumeros) {
    echo min($arrayNumeros);
}

//funcion para imprimir el maximo del array

function maximoArray($arrayNumeros) {
    echo max($arrayNumeros);
}

//funcion para imprimir la media del array

function mediaArray($arrayNumeros) {
    echo round(array_sum($arrayNumeros) / count($arrayNumeros),2);
}

//funcion para si un numero esta en el array

function estaEnArray($arrayNumeros, $numero) {
    if (in_array($numero, $arrayNumeros)) {
        echo "El numero $numero esta en el array";
    } else {
        echo "El numero $numero no esta en el array";
    }
}

//funcion para devolver la posicion del numero en el array

function posicionEnArray($arrayNumeros, $numero) {
    $posicion = array_search($numero, $arrayNumeros);
    
    if ($posicion!== false) {
        echo "El numero $numero se encuentra en la posicion $posicion";
    } else {
        echo "El numero $numero no se encuentra en el array";
    }
}

//funcion para voltar el array

function voltearArray(&$arrayNumeros) {
    $array = array_reverse($arrayNumeros);

}

//funcion para la suma acomulada

function sumaAcomuladaArray($arrayNumeros) {
    $sumaAcomulada = 0;
    foreach ($arrayNumeros as $numero) {
        $sumaAcomulada += $numero;
    }
    echo "$sumaAcomulada";
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
    <h1>Resultados de las Funciones del Array</h1>
    <h2>Array 1</h2>
    <?php
        $arrayNumeros =generarArrayInt(10,20,);
        echo mostrarArray($arrayNumeros);
    ?>
    <h2>Resultado de las funciones</h2>
    <p>Minimo: <?php minimoArray($arrayNumeros);?></p>
    <p>Maximo: <?php maximoArray($arrayNumeros);?></p>
    <p>Media: <?php mediaArray($arrayNumeros);?></p>
    <p>¿Esta el numero 50 en el array?<?php estaEnArray($arrayNumeros,50)?></p>
    <p>Posicion del numero 50 en el array: <?php posicionEnArray($arrayNumeros,50);?></p>
    <h2>Array Modificado</h2>
    <p>Array volteado <?php voltearArray($arrayNumeros) ?></p>
    <br>
    <br>
    <hr>
    <h2>Array 2</h2>
    <?php
        $arrayNumeros =generarArrayInt(10,20,3, 1);
        echo mostrarArray($arrayNumeros);
    ?>
    <h2>Resultado de las funciones</h2>
    <p>Minimo: <?php minimoArray($arrayNumeros);?></p>
    <p>Maximo: <?php maximoArray($arrayNumeros);?></p>
    <p>Media: <?php mediaArray($arrayNumeros);?></p>
    <p>¿Esta el numero 50 en el array?<?php estaEnArray($arrayNumeros,50)?></p>
    <p>Posicion del numero 50 en el array: <?php posicionEnArray($arrayNumeros,50);?></p>
    <h2>Array Modificado</h2>
    <p>Array volteado <?php voltearArray($arrayNumeros) ?></p>
</body>
</html>