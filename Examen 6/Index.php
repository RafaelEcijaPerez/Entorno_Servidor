<?php
require 'Vars_and_Functions.php';




include 'Includes/Header.php';
?>
<section class="pantalla">
    <h1 class="titulo">Generador de reuniones</h1>
</section>
<section>
    <p><?= $message_error ?></p>
    <form class="formulario" action="Index.php" method="POST">
        <label>Introduce la fecha inicio: </label>
        <input type="text" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha en formato (01/01/2020 23:00:00)" maxlength="21" pattern="[0-9\/\:\s]+" size="32" value="<?= htmlspecialchars($fecha['fecha_inicio']) ?>" require /><br>
        <span class="error"><?= $error['fecha_inicio'] ?></span><br>
        
        <label>Introduce la fecha de finalización: </label>
        <input type="text" name="fecha_fin" id="fecha_fin" placeholder="Fecha en formato (01/01/2020 23:00:00)" maxlength="21" pattern="[0-9\/\:\s]+" size="32" value="<?= htmlspecialchars($fecha['fecha_fin']) ?>" require /><br>
        <span class="error"><?= $error['fecha_fin'] ?></span><br>

        <label for="frecuencia">Selecciona la frecuencia:</label>
        <select id="frecuencia" name="frecuencia">
            <option value="diaria">Diaria</option>
            <option value="semanal">Semanal</option>
            <option value="dos-semanas">Dos semanas</option>
            <option value="mensual">Mensual</option>
        </select>
        <span class="error"><?= $error['frecuencia'] ?></span><br><br>

        <input type="submit" value="Enviar" name="enviar" id="enviar" />
        <br><br>
        <p><?= $message ?></p>
    </form>

</section>

<?php include 'Includes/Footer.php'; ?>