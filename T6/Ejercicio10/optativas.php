<?php
// Incluir archivos de cabecera y pie de página
include 'header.php';

// Inicializar variables
$subject = '';
$confirmationMessage = '';
$error = '';

// Validar y procesar los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = $_POST['subject'] ?? '';

    // Validar que se haya seleccionado una asignatura
    if (empty($subject)) {
        $error = "Por favor, selecciona una asignatura optativa.";
    } else {
        // Mostrar mensaje de confirmación si la selección es válida
        $subject = htmlspecialchars($subject);
        $confirmationMessage = "Has seleccionado la asignatura optativa: <strong>$subject</strong>. ¡Gracias!";
    }
}
?>

<div class="container">
    <h1>Selecciona una Asignatura Optativa</h1>
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <?php if (!empty($confirmationMessage)): ?>
        <p class="confirmation"><?= $confirmationMessage ?></p>
    <?php endif; ?>

    <!-- Formulario con radio buttons -->
    <form action="optativas.php" method="POST">
        <label><input type="radio" name="subject" value="Matemáticas"> Matemáticas</label><br>
        <label><input type="radio" name="subject" value="Física"> Física</label><br>
        <label><input type="radio" name="subject" value="Historia"> Historia</label><br>
        <label><input type="radio" name="subject" value="Arte"> Arte</label><br>
        <button type="submit">Enviar</button>
    </form>
</div>

<?php
include 'footer.php';
?>
