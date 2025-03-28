<?php

// Inicializar mensajes
$email = $age = $website = $terms = '';
$errorMessage = '';
$confirmationMessage = '';

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar los datos con filter_input_array()
    $data = filter_input_array(INPUT_POST, [
        'email' => FILTER_VALIDATE_EMAIL,        // Validar email
        'age' => ['filter' => FILTER_VALIDATE_INT, 'options' => ['min_range' => 18, 'max_range' => 65]],  // Validar edad (entre 18 y 65)
        'website' => FILTER_VALIDATE_URL,        // Validar URL
        'terms' => FILTER_VALIDATE_BOOLEAN       // Validar que aceptaron los términos
    ]);

    // Verificar si hubo errores
    if ($data['email'] === false) {
        $errorMessage = "El correo electrónico no es válido.";
    } elseif ($data['age'] === false) {
        $errorMessage = "La edad debe estar entre 18 y 65 años.";
    } elseif ($data['website'] === false) {
        $errorMessage = "La URL no es válida.";
    } elseif ($data['terms'] !== true) {
        $errorMessage = "Debes aceptar los términos y condiciones.";
    } else {
        // Si no hubo errores, se puede proceder
        $email = $data['email'];
        $age = $data['age'];
        $website = $data['website'];
        $terms = $data['terms'];
        $confirmationMessage = "Registro exitoso. Los datos son:<br>
                                Correo electrónico: $email<br>
                                Edad: $age<br>
                                Sitio web: $website<br>
                                Aceptaste los términos: " . ($terms ? "Sí" : "No");
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>

<h1>Formulario de Registro</h1>

<!-- Mostrar mensaje de error o confirmación -->
<?php if ($errorMessage): ?>
    <p style="color: red;"><?= $errorMessage ?></p>
<?php endif; ?>

<?php if ($confirmationMessage): ?>
    <p style="color: green;"><?= $confirmationMessage ?></p>
<?php endif; ?>

<!-- El formulario de registro -->
<form action="formulario.php" method="POST">
    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required><br>

    <label for="age">Edad (entre 18 y 65 años):</label>
    <input type="number" id="age" name="age" value="<?= htmlspecialchars($age) ?>" required min="18" max="65"><br>

    <label for="website">URL de un sitio web:</label>
    <input type="url" id="website" name="website" value="<?= htmlspecialchars($website) ?>" required><br>

    <label for="terms">
        <input type="checkbox" id="terms" name="terms" <?= $terms ? 'checked' : '' ?> required>
        Acepto los términos y condiciones
    </label><br>

    <button type="submit">Enviar</button>
</form>

</body>
</html>
