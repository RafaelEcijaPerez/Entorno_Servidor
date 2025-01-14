<?php
// Incluir archivos de cabecera y pie de página
include 'header.php';

// Lista de eventos disponibles
$events = ['Ceremonia de Apertura', 'Atletismo', 'Natación', 'Ciclismo', 'Ceremonia de Clausura'];

// Variables para manejar el formulario
$selectedEvents = [];
$confirmationMessage = '';
$error = '';

// Validar y procesar los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedEvents = $_POST['events'] ?? [];

    // Validar que se haya seleccionado al menos un evento
    if (empty($selectedEvents)) {
        $error = "Por favor, selecciona al menos un evento.";
    } else {
        // Mostrar mensaje de confirmación si la selección es válida
        $confirmationMessage = "Has seleccionado los siguientes eventos:<ul>";
        foreach ($selectedEvents as $event) {
            $confirmationMessage .= "<li>" . htmlspecialchars($event) . "</li>";
        }
        $confirmationMessage .= "</ul> ¡Gracias por tu participación!";
    }
}
?>

<div class="container">
    <h1>Formulario de Voluntarios - Olimpiadas de París 2024</h1>
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <?php if (!empty($confirmationMessage)): ?>
        <p class="confirmation"><?= $confirmationMessage ?></p>
    <?php endif; ?>

    <!-- Formulario de selección de eventos -->
    <form action="voluntarios.php" method="POST">
        <p>Selecciona los eventos en los que deseas participar:</p>
        <?php foreach ($events as $event): ?>
            <label>
                <input type="checkbox" name="events[]" value="<?= htmlspecialchars($event) ?>">
                <?= htmlspecialchars($event) ?>
            </label><br>
        <?php endforeach; ?>
        <button type="submit">Enviar</button>
    </form>
</div>

<?php
include 'footer.php';
?>
