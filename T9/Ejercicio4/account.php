<?php
include 'sessions.php';
require_login();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION["usuario"]); ?>!</h1>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>