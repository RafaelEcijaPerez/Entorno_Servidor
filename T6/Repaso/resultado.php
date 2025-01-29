<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado</h1>

    <?php
    // Recoger datos enviados desde `formulario.php`
    $nombre = $_GET['nombre'] ?? 'No name provided';
    $edad = $_GET['edad'] ?? 'No age provided';
    $pais = $_GET['pais'] ?? 'No country provided';

    // Validar y sanitizar datos
    $nombre = htmlspecialchars($nombre,ENT_QUOTES , 'UTF-8');
    $edad = filter_var($edad, FILTER_VALIDATE_INT);
    $pais = htmlspecialchars($pais, ENT_QUOTES, 'UTF-8');

    // Mostrar resultados o mensajes de error
    if (!$edad || $edad < 1 || $edad > 120) {
        echo "<p style='color: red;'>Edad inválida: Debe ser un número entre 1 y 120.</p>";
    } else {
        echo "<p>Hola, <strong>$nombre</strong>. Tienes <strong>$edad</strong> años y vives en <strong>$pais</strong>.</p>";
    }
    ?>
</body>
</html>
