<?php
// Si se ha enviado el formulario y el campo nombre no está vacío
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nombre"])) {
    // Escapar caracteres especiales para evitar ataques de inyección de código
    $nombre = htmlspecialchars($_POST["nombre"]);
    
    // Crear una cookie con el nombre del usuario y guardarla en el navegador del usuario
    setcookie("usuario", $nombre, 0, "/"); // Cookie sin expiración definida
    
    // Redireccionar a la página de bienvenida con el nombre del usuario
    header("Location: welcome.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
</head>

<body>
    <?php if (isset($_COOKIE["usuario"])): ?>
        <h1>Bienvenido de nuevo, <?php echo htmlspecialchars($_COOKIE["usuario"]); ?>!</h1>
    <?php else: ?>
        <form method="POST" action="welcome.php">
            <label for="nombre">Ingresa tu nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <button type="submit">Enviar</button>
        </form>
    <?php endif; ?>
</body>

</html>