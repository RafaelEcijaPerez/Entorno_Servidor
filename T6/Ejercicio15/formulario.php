<?php
// Inicializar variables
$email = $age = $website = $terms = '';
$errorMessage = '';
$confirmationMessage = '';

// Procesar el formulario cuando se envíe
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Asignar las variables de formulario a las entradas de POST
    $email = $_POST['email'] ?? '';
    $age = $_POST['age'] ?? '';
    $website = $_POST['website'] ?? '';
    $terms = isset($_POST['terms']) ? true : false;

    // Validar los datos
    // Validar el email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage .= "El correo electrónico no es válido. <br>";
    }

    // Validar la edad (debe ser un número entre 18 y 65)
    if (!filter_var($age, FILTER_VALIDATE_INT) || $age < 18 || $age > 65) {
        $errorMessage .= "La edad debe estar entre 18 y 65 años. <br>";
    }

    // Validar la URL
    if (!filter_var($website, FILTER_VALIDATE_URL)) {
        $errorMessage .= "La URL no es válida. <br>";
    }

    // Validar aceptación de los términos
    if (!$terms) {
        $errorMessage .= "Debes aceptar los términos y condiciones. <br>";
    }

    // Si no hay errores, mostrar mensaje de confirmación
    if (empty($errorMessage)) {
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
