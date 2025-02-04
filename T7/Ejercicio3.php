<?php
// Mostrar mensaje
$mensaje = "";
$movido = false;

// Configuración
$rutaBase = '/var/www/images/';
$tamanoMaximo = 2 * 1024 * 1024; // 2 MB
$extensionesPermitidas = ['png', 'jpeg', 'jpg']; // Extensiones válidas

// Comprobar si se ha cargado el archivo
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $archivoTemporal = $_FILES['image']['tmp_name'];
        $nombreArchivoOriginal = $_FILES['image']['name'];
        $tamanoArchivo = $_FILES['image']['size'];

        // Limpieza del nombre del archivo
        $nombreArchivo = preg_replace('/[^a-zA-Z0-9\._-]/', '_', $nombreArchivoOriginal);

        // Obtener la extensión del archivo
        $extension = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));

        // Validar extensión
        if (!in_array($extension, $extensionesPermitidas)) {
            $mensaje = 'El archivo debe ser una imagen en formato PNG o JPEG.';
        }
        // Validar tamaño
        elseif ($tamanoArchivo > $tamanoMaximo) {
            $mensaje = 'El archivo excede el tamaño máximo permitido (2 MB).';
        }
        else {
            // Evitar sobrescribir archivos
            $rutaArchivo = $rutaBase . $nombreArchivo;
            $contador = 1;
            while (file_exists($rutaArchivo)) {
                $rutaArchivo = $rutaBase .$nombreArchivo . "_$contador." . $extension;
                $contador++;
            }

            // Crear directorio si no existe
            if (!is_dir($rutaBase)) {
                mkdir($rutaBase, 0755, true);
            }

            // Mover archivo
            if (move_uploaded_file($archivoTemporal, $rutaArchivo)) {
                $mensaje = 'Archivo subido correctamente.';
                $movido = true;
            } else {
                $mensaje = 'Error al mover el archivo.';
            }
        }
    } else {
        $mensaje = 'Error al cargar el archivo.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Archivo</title>
</head>
<body>
    <p><?= htmlspecialchars($mensaje); ?></p>
    <form method="POST" action="Ejercicio3.php" enctype="multipart/form-data">
        <label for="image"><b>Subir archivo:</b></label>
        <input type="file" name="image" accept="image/png, image/jpeg" id="image" required>
        <input type="submit" value="Subir">
    </form>

    <?php if ($movido): ?>
        <p>Archivo subido correctamente. Puedes descargarlo aquí:</p>
        <a href="/images/<?= htmlspecialchars(basename($rutaArchivo)); ?>" download>Descargar archivo</a>
    <?php endif; ?>
</body>
</html>
