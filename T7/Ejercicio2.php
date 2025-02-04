<?php
// Mostrar mensaje
$mensaje = "";
$movido = false;

// Comprobar si se ha cargado el archivo
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        // Obtener el archivo temporal
        $archivo_temporal = $_FILES['image']['tmp_name'];
        
        // Definir la carpeta de destino dentro de htdocs
        $directorio_destino = __DIR__ . "/var/www/images";

        // Verificar si la carpeta de destino existe, si no, crearla
        if (!file_exists($directorio_destino)) {
            mkdir($directorio_destino, 0777, true);
        }

        // Ruta completa del archivo de destino
        $ruta_destino = $directorio_destino . basename($_FILES['image']['name']);

        // Mover el archivo
        if (move_uploaded_file($archivo_temporal, $ruta_destino)) {
            $mensaje = 'Archivo subido correctamente.';
            $movido = true;
        } else {
            $mensaje = 'Error al mover el archivo.';
        }
    } else {
        $mensaje = 'Error al cargar el archivo.';
    }
}
?>
<?= $mensaje; ?>
<form method="POST" action="Ejercicio2.php" enctype="multipart/form-data">
    <label for="image"><b>Subir archivo:</b></label>
    <input type="file" name="image" accept="image/*" id="image">
    <input type="submit" value="Subir">
    <?php if ($movido): ?>
        <a href="uploads/<?= htmlspecialchars($_FILES['image']['name']); ?>" download>Descargar archivo</a>
    <?php endif; ?>
</form>
