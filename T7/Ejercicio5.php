<?php
// Configuración
$mensaje = "";
$tamanoMaximo = 5 * 1024 * 1024; // 5 MB
$extensionesPermitidas = ['jpeg', 'jpg', 'png', 'gif'];
$directorioSubidas = 'uploads/';
$directorioMiniaturas = $directorioSubidas . 'thumbs/';
$maxAncho = 200;
$maxAlto = 200;

// Comprobar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $archivoTemporal = $_FILES['image']['tmp_name'];
        $nombreArchivoOriginal = $_FILES['image']['name'];
        $tamanoArchivo = $_FILES['image']['size'];

        // Limpieza del nombre del archivo
        $nombreArchivo = preg_replace('/[^a-zA-Z0-9\._-]/', '_', $nombreArchivoOriginal);

        // Obtener la extensión del archivo
        $extension = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));

        // Validar la extensión
        if (!in_array($extension, $extensionesPermitidas)) {
            $mensaje = 'Solo se permiten archivos con formato JPEG, PNG o GIF.';
        }
        // Validar el tamaño
        elseif ($tamanoArchivo > $tamanoMaximo) {
            $mensaje = 'El archivo excede el tamaño máximo permitido (5 MB).';
        }
        else {
            // Asegurarse de que las carpetas de destino existan
            if (!is_dir($directorioSubidas)) {
                mkdir($directorioSubidas, 0755, true);
            }
            if (!is_dir($directorioMiniaturas)) {
                mkdir($directorioMiniaturas, 0755, true);
            }

            // Ruta completa para el archivo original
            $rutaArchivo = $directorioSubidas . $nombreArchivo;

            // Evitar sobrescrituras
            $contador = 1;
            while (file_exists($rutaArchivo)) {
                $rutaArchivo = $directorioSubidas . pathinfo($nombreArchivo, PATHINFO_FILENAME) . "_$contador." . $extension;
                $contador++;
            }

            // Mover el archivo al directorio de subidas
            if (move_uploaded_file($archivoTemporal, $rutaArchivo)) {
                // Crear miniatura con Imagick
                $rutaMiniatura = $directorioMiniaturas . basename($rutaArchivo);

                if (crearMiniaturaImagick($rutaArchivo, $rutaMiniatura, $maxAncho, $maxAlto)) {
                    $mensaje = 'Imagen subida y miniatura creada exitosamente.';
                } else {
                    $mensaje = 'Imagen subida, pero hubo un error al crear la miniatura.';
                }
            } else {
                $mensaje = 'Error al mover el archivo.';
            }
        }
    } else {
        $mensaje = 'Error al cargar el archivo.';
    }
}

// Función para crear miniaturas con Imagick
function crearMiniaturaImagick($rutaOrigen, $rutaDestino, $maxAncho, $maxAlto) {
    try {
        $imagen = new Imagick($rutaOrigen);
        echo "Imagick está funcionando. Formatos soportados:\n";

        // Redimensionar manteniendo las proporciones
        $imagen->thumbnailImage($maxAncho, $maxAlto, true);

        // Guardar la miniatura en el destino
        $imagen->writeImage($rutaDestino);

        // Liberar recursos
        $imagen->clear();
        $imagen->destroy();

        return true;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
        
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Imagen</title>
</head>
<body>
    <p><?= htmlspecialchars($mensaje); ?></p>
    <form method="POST" action="Ejercicio5.php" enctype="multipart/form-data">
        <label for="image"><b>Subir imagen:</b></label>
        <input type="file" name="image" accept=".jpeg, .jpg, .png, .gif" id="image" required>
        <br>
        <input type="submit" value="Subir">
    </form>
</body>
</html>
