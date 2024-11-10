<?php
$Nombre ="Rafa";
// Incluimos el archivo de cabecera
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPrincipal</title>
</head>
<body>
    <main>
        <h2>Página Principal del Club Deportivo</h2>
        <p>Bienvenido a nuestra página principal. Aquí encontrarás información sobre nuestras actividades, eventos y promociones.</p>

        <!-- Incluimos el formulario de saludo personalizado -->
        <section>
            <h3>Saludo Personalizado</h3>

            <?php 
            if($Nombre != null) {
                echo "<p>Hola, $Nombre! Gracias por visitar nuestro club.</p>";
            }?>
        </section>

        <!-- Incluimos la tabla de descuentos -->
        <section>
            <h3>Tabla de Descuentos en Cuotas</h3>
            <?php include 'descuentos.php'; ?>
        </section>
    </main>

    <?php
    // Incluimos el archivo de pie de página
    include 'footer.php';
    ?>

</body>
</html>
