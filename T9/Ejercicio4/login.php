<?php
include 'sessions.php';
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = login($_POST["email"], $_POST["password"]);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Inicio de Sesión</h1>
    <form method="POST" action="login.php">
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Contraseña:</label>
        <input type="password" name="password" required>
        <button type="submit">Iniciar sesión</button>
    </form>
    <p style="color:red;"> <?php echo $error; ?> </p>
</body>
</html>