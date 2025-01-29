<?php
//Usuario
$Usuario = [
    "nombre" => "",
    "correo" => "",
    "edad" => "",
    "Libro" => "",
    "terminos" => false
];

//Errores
$errores = [
    "nombre" => "",
    "correo" => "",
    "edad" => "",
    "Libro" => "",
    "terminos" => ""
];

// Mensaje
$mensaje = "";

// Validación
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Validacion de los campos
    $Usuario["nombre"] = $_POST["nombre"];
    $Usuario["correo"] = $_POST["email"];
    $Usuario["edad"] = $_POST["age"];
    $Usuario["Libro"] = $_POST["Libro"];
    $Usuario["terminos"] = isset($_POST["terminos"]);

    //Validar nombre
    if (empty($Usuario["nombre"])) {
        $errores["nombre"] = "El nombre es obligatorio.";
    } elseif (!preg_match("/^[a-zA-Z ]{2,50}$/", $nombre)) {
        $errores["nombre"] = "El nombre solo puede contener letras.";
    }

    //Validar correo
    if (empty($Usuario["correo"])) {
        $errores["correo"] = "El correo es obligatorio.";
    } elseif (!filter_var($Usuario["correo"])) {
        $errores["correo"] = "El correo no es válido.";
    }
    //Validar edad
    if (empty($Usuario["edad"])) {
        $errores["edad"] = "La edad es obligatoria.";
    } elseif ($Usuario["edad"] < 13) {
        $errores["edad"] = "La edad debe ser mayor que 13 años";
    }
    //Validar terminos
    if (empty($Usuario["terminos"])) {
        $errores["terminos"] = "Debes aceptar los términos y condiciones.";
    }
    //SAneamiento
    $Usuario["nombre"] = htmlspecialchars($Usuario["nombre"]);
    $Usuario["correo"] = htmlspecialchars($Usuario["correo"]);
    $Usuario["edad"] = htmlspecialchars($Usuario["edad"]);
    $Usuario["Libro"] = htmlspecialchars($Usuario["Libro"]);
    $Usuario["terminos"] = htmlspecialchars($Usuario["terminos"]);


    //Si no hay errores
    if (array_filter($errores)) {
        $mensaje = "Hay errores en el formulario.";
    } else {
        $mensaje = "Formulario enviado correctamente.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Libro</title>
</head>

<body>

    <h2>Formulario de Registro</h2>
    <?=$mensaje?>
    <form action="" metodo="POST">
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
        <span style="color:red"><?= $errores["edad"] ?></span>
        <br><br>

        <!-- Tipo de Evento -->
        <label>Tipo de Libro:</label><br>
        <div id="Libro">
            <input type="radio" id="Fisico" name="Libro" value="Fisico">
            <label for="Fisico">Fisico</label><br>
            <input type="radio" id="Digital" name="Libro" value="Digital">
            <label for="Digital">Digital</label>
        </div>
        <span style="color:red"><?= $errores["Libro"] ?></span>
        <br>    

        <!-- Aceptación de Términos -->
        <input type="checkbox" id="terminos" name="terminos" value="1">
        <label for="terminos">Acepto los términos y condiciones</label>
        <span style="color:red"><?= $errores["terminos"] ?></span>
       

        <!-- Botón de Enviar -->
        <button type="submit">Registrarse</button>
    </form>

    
</body>
</html>