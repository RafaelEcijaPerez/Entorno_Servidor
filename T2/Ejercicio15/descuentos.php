<?php
// Definimos la cuota mensual base
$cuotaMensual = 30; 

// Descuentos basados en el número de meses
echo "<table border='1'>
        <tr>
            <th>Meses</th>
            <th>Descuento</th>
            <th>Precio Final</th>
            <th>Ahorro</th>
        </tr>";

for ($meses = 1; $meses < 13; $meses++) {
    // Calculamos el descuento
    $descuento = ($meses >= 6) ? 0.2 : (($meses >= 3) ? 0.1 : 0); // Operador ternario
    $precioFinal = $cuotaMensual * $meses * (1 - $descuento);
    $ahorro =$cuotaMensual*$meses - $precioFinal;

    // Mostramos la fila de la tabla
    echo "<tr>
            <td>$meses</td>
            <td>" . ($descuento * 100) . "%</td>
            <td>" . $precioFinal, "€</td>
            <td>". $ahorro,"€</td>
          </tr>";
}

echo "</table>";
?>
