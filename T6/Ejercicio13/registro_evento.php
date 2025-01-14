<?php
// Incluir archivos de cabecera y pie de página
include 'header.php';

// Inicializar variables para manejar el formulario
$email = $age = $newsletter = '';
$confirmationMessage = '';
$error = '';

// Validar y procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores ingresados
    $email = $_POST['email'] ?? '';
    $age = $_POST['age'] ?? '';
    $newsletter = isset($_POST['newsletter']) ? 'Sí' : 'No';

    // Validar el correo electrónico
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Por favor, ingresa un correo electrónico válido.";
    }
    // Validar la edad
    elseif (empty($age) || !is_numeric($age) || $age < 18) {
        $error = "Por favor, ingresa una edad válida (debe ser mayor o igual a 18 años).";
    }
    // Si todas las validaciones pasan
    else {
        $email = htmlspecialchars($email);
        $age = htmlspecialchars($age);

        // Mostrar mensaje de confirmación
        $confirmationMessage = "Registro exitoso. Gracias por registrarte.<br>
                                Correo electrónico: $email<br>
                                Edad: $age años<br>
                                Suscripción a boletines: $newsletter<br>";
    }
}
?>

<div class="container">
    <h1>Registro para el Evento</h1>
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <?php if (!empty($confirmationMessage)): ?>
        <p class="confirmation"><?= $confirmationMessage ?></p>
    <?php endif; ?>

    <!-- Formulario de registro -->
    <form action="registro_evento.php" method="POST">
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required><br>

        <label for="age">Edad:</label>
        <input type="number" id="age" name="age" value="<?= htmlspecialchars($age) ?>" required><br>

        <label for="newsletter">
            <input type="checkbox" id="newsletter" name="newsletter" <?= isset($_POST['newsletter']) ? 'checked' : '' ?>>
            Quiero recibir boletines informativos
        </label><br>

        <button type="submit">Registrar</button>
    </form>
</div>

<?php
include 'footer.php';
?>
