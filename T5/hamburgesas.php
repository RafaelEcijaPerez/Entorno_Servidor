<?php
// Menú de hamburguesas y precios
$burger = [
    "clasica" => 5.50,
    "queso" => 6.75,
    "BBQ" => 7.25,
    "Vegetariana" => 6.00,
];

// 1. Generar una cantidad aleatoria de ventas entre 50 y 100
$ventas_totales = mt_rand(50, 100);
$total_dia = 0;  // Total de las ventas del día

// 2. Asignar hamburguesas y cantidades para cada venta
$detalles_ventas = [];

for ($i = 0; $i < $ventas_totales; $i++) {
    // Elegir aleatoriamente una hamburguesa
    $hamburguesa = array_rand($burger);
    
    // Elegir aleatoriamente una cantidad entre 1 y 5
    $cantidad = mt_rand(1, 5);
    
    // Calcular el total de la venta para esta hamburguesa
    $total_venta = $burger[$hamburguesa] * $cantidad;
    $total_venta = round($total_venta, 2);  // Redondear el total de la venta
    
    // Almacenar los detalles de la venta
    $detalles_ventas[] = [
        'hamburguesa' => $hamburguesa,
        'cantidad' => $cantidad,
        'total_venta' => $total_venta
    ];
    
    // Sumar al total del día
    $total_dia += $total_venta;
}

// 3. Formatear el total del día con dos decimales
$total_dia_formateado = number_format($total_dia, 2);

// 4. Estadísticas
$raiz_cuadrada = sqrt($total_dia);
$elevado_al_cuadrado = pow($total_dia, 2);
$redondeado_arriba = ceil($total_dia);
$redondeado_abajo = floor($total_dia);

// Mostrar los resultados
echo "<h2>Reporte de Ventas del Día</h2>";
echo "Total de ventas realizadas: $ventas_totales ventas.<br><br>";

// Mostrar los detalles de las ventas
echo "<br><strong>Ganancias de ventas del día:</strong> $$total_dia_formateado<br><br>";

// Mostrar estadísticas
echo "<h3>Estadísticas del Total de Ventas</h3>";
echo "Raíz cuadrada del total de ventas: " . round($raiz_cuadrada, 2) . "<br>";
echo "Total de ventas elevado al cuadrado: " . round($elevado_al_cuadrado, 2) . "<br>";
echo "Total de ventas redondeado hacia arriba: " . $redondeado_arriba . "<br>";
echo "Total de ventas redondeado hacia abajo: " . $redondeado_abajo . "<br>";

?>
