<?php
/*
En una tienda de golosinas, necesitas realizar cálculos para los precios y los niveles de stock de los productos. 
Implementarás varias funciones en PHP para manejar esta tarea.

Requerimientos:

Crear una función llamada calcular_precio_total() que:

Reciba tres parámetros:
Precio unitario de un artículo (float).
Cantidad comprada (int).
Impuesto (% de tipo entero, opcional con un valor por defecto de 20).
Devuelva el precio total, incluyendo el impuesto.

Crear una función llamada estado_stock() que:

Reciba un parámetro:
Cantidad en stock (int).
Devuelva un mensaje basado en la cantidad en stock:
"Buen stock" si es 10 o más.
"Bajo stock" si está entre 1 y 9.
"Sin stock" si es 0.

Crear un array asociativo llamado $productos que:

Contenga al menos 3 productos.
Cada producto tenga un nombre como clave y un array con su precio y stock como valores.

Mostrar los resultados en una tabla HTML que incluya:

Nombre del producto.
Precio unitario.
Stock actual.
Estado del stock (usando estado_stock()).
Precio total de 5 unidades (usando calcular_precio_total()).
*/
function calcular_precio_total(float $precioUnitario,int $Cantidad, float $impuesto): float{
    return ($precioUnitario *$Cantidad)*(1 * ($impuesto/100));

}

function estado_stock(int $cantidad){
    if ($cantidad >=10) {
        return  'Buen stock';
    }
    elseif ($cantidad>1 and $cantidad <10){
        return  'Bajo stock';
    }
    else{
        return 'Sin stock';
    }
}

$productos = [
    'Caramelos'  => ['precio' => 2.50, 'stock' => 12],
    'Chocolates' => ['precio' => 3.75, 'stock' => 7],
    'Galletas'   => ['precio' => 1.80, 'stock' => 0],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
            <td>
                Producto
            </td>
            <td>
                Precio Unitario
            </td>
            <td>
                Stock Actual
            </td>
            <td>
                Estado del Stock
            </td>
            <td>
                Precio Total
            </td>
        </thead>
        <?php
        foreach ($array as $nombreProducto => $producto) {
            echo '<tr>';
            echo '<td>' . $nombreProducto . '</td>'; // Mostrar el nombre del producto
            echo '<td>' . number_format($producto['precio'], 2) . '</td>'; // Mostrar el precio con dos decimales
            echo '<td>' . $producto['stock'] . '</td>'; // Mostrar el stock actual
            echo '<td>' . estado_stock($producto['stock']) . '</td>'; // Mostrar el estado del stock
            echo '<td>' . number_format(
                calcular_precio_total(precioUnitario: $producto['precio'],  Cantidad: $producto['stock'], impuesto: 21),
                2
            ) . '</td>'; // Calcular y mostrar el precio total basado en el stock
            echo '</tr>';
        }
        ?>

    </table>
</body>
</html>