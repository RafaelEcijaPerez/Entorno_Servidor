<?php
// Si se ha enviado el formulario y el campo idioma no está vacío
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["idioma"])) {
    // Obtener el idioma seleccionado por el usuario y almacenarlo en una cookie
    $idioma = $_POST["idioma"];
    // Crear y establecer la cookie con el idioma seleccionado y un tiempo de vida de 30 días
    setcookie("idioma", $idioma, time() + (30 * 24 * 60 * 60), "/"); // Cookie válida por 30 días
    header("Location: Ejercicio2.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preferencias de Idioma</title>
</head>

<body>
    <!-- Verificar si la cookie de idioma ya está establecida -->
    <?php if (isset($_COOKIE["idioma"])): ?>
        <!--Mostrar el mensaje de bienvenida según el idioma seleccionado-->
        <?php if ($_COOKIE["idioma"] == "es"): ?>
            <h1>Bienvenido</h1>
        <?php else: ?>
            <h1>Welcome</h1>
        <?php endif; ?>
    <?php else: ?>
        <form method="POST" action="Ejercicio2.php">
            <label for="idioma">Selecciona tu idioma:</label>
            <select id="idioma" name="idioma">
                <option value="es">Español</option>
                <option value="en">English</option>
            </select>
            <button type="submit">Guardar</button>
        </form>
    <?php endif; ?>
</body>

</html>