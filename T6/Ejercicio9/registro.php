<?php
// Incluir los archivos de cabecera y pie de página
include 'header.php';

// Inicializar variables para manejar los datos del formulario
$name = $surname = $age = $position = $email = $phone = '';
$confirmationMessage = '';
$error = '';

// Validar y procesar los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $age = $_POST['age'] ?? '';

    // Validar que la edad no esté vacía, sea un número y esté en el rango deseado
    if (!is_numeric($age) || $age < 8 || $age > 16) {
        $error = "La edad debe ser un número válido entre 8 y 16.";
    } else {
        // Procesar los datos enviados si la edad es válida
        $name = htmlspecialchars($_POST['name'] ?? '');
        $surname = htmlspecialchars($_POST['surname'] ?? '');
        $age = htmlspecialchars($age);
        $position = htmlspecialchars($_POST['position'] ?? '');
        $email = htmlspecialchars($_POST['email'] ?? '');
        $phone = htmlspecialchars($_POST['phone'] ?? '');

        // Mensaje de confirmación
        $confirmationMessage = "Registro exitoso. ¡Gracias, $name $surname!<br>
                                Edad: $age<br>
                                Posición: $position<br>
                                Email: $email<br>
                                Teléfono: $phone<br>";
    }
}
?>

<div class="container">
    <h1>Registro para el Club de Fútbol</h1>
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <?php if ($confirmationMessage): ?>
        <p class="confirmation"><?= $confirmationMessage ?></p>
    <?php endif; ?>
    <form action="registro.php" method="POST">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="surname">Apellido:</label>
        <input type="text" id="surname" name="surname" required><br>

        <label for="age">Edad:</label>
        <input type="number" id="age" name="age" required><br>

        <label for="position">Posición:</label>
        <select id="position" name="position" required>
            <option value="">Selecciona una posición</option>
            <option value="Delantero">Delantero</option>
            <option value="Defensa">Defensa</option>
            <option value="Centrocampista">Centrocampista</option>
            <option value="Portero">Portero</option>
        </select><br>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email"><br>

        <label for="phone">Teléfono:</label>
        <input type="tel" id="phone" name="phone"><br>

        <button type="submit">Registrar</button>
    </form>
</div>

<?php
include 'footer.php';
?>
