<?php
//Recoger los datos

$nombre = $_GET["nombre"] ?? "";
$correo = $_GET["correo"] ?? "";
$edad = $_GET["age"] ?? "";
$libro = $_GET["libro"] ?? "";
$terminos = $_GET["terminos"] ?? "";

$errores = ["nombre" => "", "correo" => "", "age" => "", "libro" => "", "terminos" => ""];

$mensaje = "";

// Validar y sanitizar datos

//nombre
if (empty($nombre)) {
    $errores["nombre"] = "El nombre es requerido";
} else {
    if (!preg_match("/^[a-zA-Z ]{2,50}$/", $nombre)) {
        $errores["nombre"] = "El nombre solo puede contener letras y espacios";
    }
}
//correo
if (empty($correo)) {
    $errores["correo"] = "El correo es requerido";
}

//Edad
if (empty($edad)) {
    $errores["age"] = "La edad es requerida";
} else {
    if ($edad < 13) {
        $errores["age"] = "La edad debe ser mayor a 13 años";
    }
}
//Libro
if (empty($libro)) {
    $errores["libro"] = "El tipo de libro es requerido";
}
//Terminos
if (empty($terminos)) {
    $errores["terminos"] = "Debes aceptar los términos y condiciones";
}
//Saneamiento
$nombre = htmlspecialchars($nombre);
$correo = htmlspecialchars($correo);
$edad = htmlspecialchars($edad);
$libro = htmlspecialchars($libro);
$terminos = htmlspecialchars($terminos);

// Mostrar los errores
if (empty(array_filter($errores))) {
    $mensaje = "Registro exitoso. Los datos son:<br>
                Nombre: $nombre<br>
                Correo: $correo<br>
                Edad: $edad<br>
                Libro: $libro<br>
                Términos: $terminos";
} else {
    $mensaje = "Por favor, revisa los errores en el formulario.";
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
    <form action="" method="get">
        <!-- Nombre Completo -->
        <label for="nombre">Nombre Completo:</label>
        <input type="text" id="nombre" name="nombre">
        <span style="color:red"><?= $errores["nombre"] ?></span>
        <br><br>

        <!-- Correo Electrónico -->
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email">
        <br><br>

        <!-- EDAD -->
        <label for="age">Edad:</label>
        <input type="number" id="age" name="age"><br>
        <span style="color:red"><?= $errores["age"] ?></span>
        <br><br>

        <!-- Tipo de Evento -->
        <label>Tipo de Libro:</label><br>
        <div id="Libro">
            <input type="radio" id="Fisico" name="Libro" value="Fisico">
            <label for="Fisico">Fisico</label><br>
            <input type="radio" id="Digital" name="Libro" value="Digital">
            <label for="Digital">Digital</label>
        </div>
        <span style="color:red"><?= $errores["libro"] ?></span>
        <br>

        <!-- Aceptación de Términos -->
        <input type="checkbox" id="terminos" name="terminos" value="1">
        <label for="terminos">Acepto los términos y condiciones</label>
        <span style="color:red"><?= $errores["terminos"] ?></span>


        <!-- Botón de Enviar -->
        <button type="submit">Registrarse</button>
    </form>
    <!-- Mostrar mensaje -->
    <p><?= $mensaje ?></p>


</body>

</html>