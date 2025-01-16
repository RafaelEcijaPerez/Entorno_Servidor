<?php
// Recoger la información
$Usuario = ["nombre" => "", "correo" => "", "telefono" => "", "evento" => "", "terminos" => "", "estado" => false];
$errores = ["nombre" => "", "correo" => "", "telefono" => "", "evento" => "", "terminos" => ""];
$mensaje = "";

// Validación
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpiar y sanitizar la información
    $Usuario["nombre"] = htmlspecialchars($_POST["nombre"] ?? "");
    $Usuario["correo"] = htmlspecialchars($_POST["email"] ?? "");
    $Usuario["telefono"] = htmlspecialchars($_POST["telefono"] ?? "");
    $Usuario["evento"] = htmlspecialchars($_POST["tipo_evento"] ?? "");
    $Usuario["terminos"] = isset($_POST["terminos"]) ? true : false;

    // Validar los datos 
    //Nombre
    if (empty($Usuario["nombre"])) {
        $errores["nombre"] = "El nombre es requerido";
    }
    else{
        //Deben ser solo letras y espacios y tiene que tener de 2 a 50 caracteres
        if (preg_match("/^[a-zA-Z ]$/", $Usuario["nombre"])) {
            $errores["nombre"] = "El nombre solo puede contener letras y espacios";
        }
        if (strlen($Usuario["nombre"]) < 2 || strlen($Usuario["nombre"]) > 50) {
            $errores["nombre"] = "El nombre debe tener entre 2 y 50 caracteres";
        }
    }
    //Correo
    if (empty($Usuario["correo"]) || !filter_var($Usuario["correo"], FILTER_VALIDATE_EMAIL)) {
        $errores["correo"] = "El correo es requerido y debe ser válido";
    }
    //Telefono
    if (empty($Usuario["telefono"])) {
        $errores["telefono"] = "El teléfono es requerido";
    }
    else{
        //Debe tiener como minimo 9 digitos
        if (preg_match("/^[0-9]{9}$/", $Usuario["telefono"])) {
            $errores["telefono"] = "El teléfono debe tener al menos 9 dígitos";
        }
    }
    //Evento
    if (empty($Usuario["evento"])) {
        $errores["evento"] = "El tipo de evento es requerido";
    }
    //Terminos
    if (!$Usuario["terminos"]) {
        $errores["terminos"] = "Debes aceptar los términos y condiciones";
    }

    //Si no hay errores en el formulario
    if (empty(array_filter($errores))) {
        $Usuario["estado"] = true;
        $mensaje = "Registro exitoso. Los datos son:<br>
                    Nombre: {$Usuario["nombre"]}<br>
                    Correo: {$Usuario["correo"]}<br>
                    Teléfono: {$Usuario["telefono"]}<br>
                    Tipo de Evento: {$Usuario["evento"]}<br>
                    Aceptaste los términos: " . ($Usuario["terminos"] ? "Sí" : "No");
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Evento</title>
</head>

<body>

    <h2>Formulario de Registro</h2>
    <form method="post">
        <!-- Nombre Completo -->
        <label for="nombre">Nombre Completo:</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($Usuario["nombre"]) ?>">
        <span style="color:red"><?= $errores["nombre"] ?></span>
        <br><br>

        <!-- Correo Electrónico -->
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($Usuario["correo"]) ?>">
        <span style="color:red"><?= $errores["correo"] ?></span>
        <br><br>

        <!-- Teléfono de Contacto -->
        <label for="telefono">Teléfono de Contacto:</label>
        <input type="text" id="telefono" name="telefono" value="<?= htmlspecialchars($Usuario["telefono"]) ?>">
        <span style="color:red"><?= $errores["telefono"] ?></span>
        <br><br>

        <!-- Tipo de Evento -->
        <label>Tipo de Evento:</label><br>
        <div id="tipo_evento">
            <input type="radio" id="presencial" name="tipo_evento" value="Presencial" <?= $Usuario["evento"] == "Presencial" ? "checked" : "" ?>>
            <label for="presencial">Presencial</label><br>
            <input type="radio" id="online" name="tipo_evento" value="Online" <?= $Usuario["evento"] == "Online" ? "checked" : "" ?>>
            <label for="online">Online</label>
        </div>
        <span style="color:red"><?= $errores["evento"] ?></span>
        <br>

        <!-- Aceptación de Términos -->
        <input type="checkbox" id="terminos" name="terminos" value="1" <?= $Usuario["terminos"] ? "checked" : "" ?>>
        <label for="terminos">Acepto los términos y condiciones</label>
        <span style="color:red"><?= $errores["terminos"] ?></span>
       

        <!-- Botón de Enviar -->
        <button type="submit">Registrarse</button>
    </form>

    <?php if ($Usuario["estado"]): ?>
        <div style="color:green"><?= $mensaje ?></div>
    <?php endif; ?>
    <?php include "footer.php";?>
</body>
</html>
