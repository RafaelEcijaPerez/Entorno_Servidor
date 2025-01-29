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
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
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
                // Crear miniatura
                $rutaMiniatura = $directorioMiniaturas . basename($rutaArchivo);

                if (crearMiniatura($rutaArchivo, $rutaMiniatura, $maxAncho, $maxAlto, $extension)) {
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

// Función para crear miniaturas
function crearMiniatura($rutaOrigen, $rutaDestino, $maxAncho, $maxAlto, $extension) {
    // Cargar la imagen original según su formato
    switch ($extension) {
        case 'jpeg':
        case 'jpg':
            $imagenOriginal = imagecreatefromjpeg($rutaOrigen);
            break;
        case 'png':
            $imagenOriginal = imagecreatefrompng($rutaOrigen);
            break;
        case 'gif':
            $imagenOriginal = imagecreatefromgif($rutaOrigen);
            break;
        default:
            return false;
    }

    // Obtener dimensiones originales
    $anchoOriginal = imagesx($imagenOriginal);
    $altoOriginal = imagesy($imagenOriginal);

    // Calcular proporciones para la miniatura
    $proporcion = min($maxAncho / $anchoOriginal, $maxAlto / $altoOriginal);
    $nuevoAncho = round($anchoOriginal * $proporcion);
    $nuevoAlto = round($altoOriginal * $proporcion);

    // Crear lienzo para la miniatura
    $miniatura = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

    // Copiar y redimensionar la imagen original
    imagecopyresampled($miniatura, $imagenOriginal, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $anchoOriginal, $altoOriginal);

    // Guardar la miniatura
    switch ($extension) {
        case 'jpeg':
        case 'jpg':
            imagejpeg($miniatura, $rutaDestino);
            break;
        case 'png':
            imagepng($miniatura, $rutaDestino);
            break;
        case 'gif':
            imagegif($miniatura, $rutaDestino);
            break;
    }

    // Liberar memoria
    imagedestroy($imagenOriginal);
    imagedestroy($miniatura);

    return true;
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
    <form method="POST" action="Ejercicio4.php" enctype="multipart/form-data">
        <label for="image"><b>Subir imagen:</b></label>
        <input type="file" name="image" accept=".jpeg, .jpg, .png, .gif" id="image" required>
        <br>
        <input type="submit" value="Subir">
    </form>
</body>
</html>
