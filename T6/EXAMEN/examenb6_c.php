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

// Funciones

function is_text($text, $min_length, $max_length) {
    return strlen($text) >= $min_length && strlen($text) <= $max_length;
}

function is_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function is_number($number, $min_value) {
    return is_numeric($number) && $number >= $min_value;
}

// Validación
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Usuario["nombre"] = $_POST["nombre"];
    $Usuario["correo"] = $_POST["email"];
    $Usuario["edad"] = $_POST["age"];
    $Usuario["Libro"] = $_POST["Libro"];
    $Usuario["terminos"] = (isset($_POST["terminos"])and $_POST["terminos"]==true)? true: false;

    $errores["nombre"] = is_text($Usuario["nombre"],2,50) ? "" : "El nombre es obligatorio.";
    $errores["correo"] = is_email($Usuario["correo"])? "" : "El correo electrónico es inválido.";
    $errores["edad"] = is_number($Usuario["edad"], 13)? "" : "Debes tener al menos 13 años.";
    $errores["Libro"] = $Usuario["Libro"]!= ""? "" : "Debes seleccionar un tipo de libro.";
    $errores["terminos"] = $Usuario["terminos"]? "" : "Debes aceptar los términos y condiciones.";
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
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($Usuario["nombre"]) ?>">
        <br><br>

        <!-- Correo Electrónico -->
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($Usuario["correo"]) ?>">
        <br><br>

        <!-- EDAD -->
        <label for="age">Edad:</label>
        <input type="number" id="age" name="age"><br>
        <br><br>

        <!-- Tipo de Libro -->
        <label>Tipo de Libro:</label><br>
        <div id="Libro">
            <input type="radio" id="Fisico" name="Libro" value="Fisico" <?= $Usuario["Libro"] == "Fisico" ? "checked" : "" ?>>
            <label for="Fisico">Fisico</label><br>
            <input type="radio" id="Digital" name="Libro" value="Digital" <?= $Usuario["Libro"] == "Digital" ? "checked" : "" ?>>
            <label for="Digital">Digital</label>
        </div>
        <br>    

        <!-- Aceptación de Términos -->
        <input type="checkbox" id="terminos" name="terminos" value="1" <?= $Usuario["terminos"] ? "checked" : "" ?>>
        <label for="terminos">Acepto los términos y condiciones</label>
       

        <!-- Botón de Enviar -->
        <button type="submit">Registrarse</button>
    </form>

    
</body>
</html>