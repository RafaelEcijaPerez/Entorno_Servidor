<?php
$mensaje       = '';                                           // Inicializar mensaje
$error         = '';                                           // Inicializar error
$rutaSubidas   = 'uploads/';                                   // Carpeta de imágenes originales
$rutaMiniaturas = 'uploads/thumbs/';                          // Carpeta de miniaturas
$tamañoMax     = 5242880;                                      // Tamaño máximo de 5MB
$formatosPermitidos = ['image/jpeg', 'image/png', 'image/gif']; // Tipos MIME permitidos
$extensionesPermitidas = ['jpeg', 'jpg', 'png', 'gif'];        // Extensiones permitidas

// Función para generar un nombre de archivo único
function generarNombreArchivo($nombreArchivo, $directorio) {
    $nombreBase  = pathinfo($nombreArchivo, PATHINFO_FILENAME);
    $extension   = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
    $nombreBase  = preg_replace('/[^A-Za-z0-9]/', '-', $nombreBase); // Limpiar el nombre
    $nuevoNombre = $nombreBase . '.' . $extension;
    $contador    = 0;

    while (file_exists($directorio . $nuevoNombre)) { 
        $contador++;
        $nuevoNombre = $nombreBase . $contador . '.' . $extension;
    }
    return $nuevoNombre;
}

// Función para redimensionar y crear una miniatura
function crearMiniatura($rutaOriginal, $rutaDestino, $nuevoAncho, $nuevoAlto) {
    list($anchoOriginal, $altoOriginal, $tipo) = getimagesize($rutaOriginal);
    $ratioOriginal = $anchoOriginal / $altoOriginal;
    $ratioNuevo = $nuevoAncho / $nuevoAlto;

    if ($ratioNuevo < $ratioOriginal) {
        $anchoSeleccionado = $altoOriginal * $ratioNuevo;
        $altoSeleccionado = $altoOriginal;
        $xOffset = ($anchoOriginal - $anchoSeleccionado) / 2;
        $yOffset = 0;
    } else {
        $anchoSeleccionado = $anchoOriginal;
        $altoSeleccionado = $anchoOriginal / $ratioNuevo;
        $xOffset = 0;
        $yOffset = ($altoOriginal - $altoSeleccionado) / 2;
    }

    // Crear imagen original según el formato
    switch ($tipo) {
        case IMAGETYPE_GIF:
            $original = imagecreatefromgif($rutaOriginal);
            break;
        case IMAGETYPE_JPEG:
            $original = imagecreatefromjpeg($rutaOriginal);
            break;
        case IMAGETYPE_PNG:
            $original = imagecreatefrompng($rutaOriginal);
            break;
        default:
            return false;
    }

    // Crear imagen en blanco con nuevo tamaño
    $miniatura = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
    imagecopyresampled($miniatura, $original, 0, 0, $xOffset, $yOffset, $nuevoAncho, $nuevoAlto, $anchoSeleccionado, $altoSeleccionado);

    // Guardar miniatura en la ruta de destino
    switch ($tipo) {
        case IMAGETYPE_GIF:
            return imagegif($miniatura, $rutaDestino);
        case IMAGETYPE_JPEG:
            return imagejpeg($miniatura, $rutaDestino);
        case IMAGETYPE_PNG:
            return imagepng($miniatura, $rutaDestino);
    }
    return false;
}

// Procesar formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_FILES['imagen']['error'] === 0) {
        $tipo = mime_content_type($_FILES['imagen']['tmp_name']);
        $extension = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
        $tamaño = $_FILES['imagen']['size'];

        if (!in_array($tipo, $formatosPermitidos)) {
            $error = 'Formato de archivo no permitido. Solo se permiten JPG, PNG y GIF.';
        } elseif (!in_array($extension, $extensionesPermitidas)) {
            $error = 'Extensión de archivo no permitida.';
        } elseif ($tamaño > $tamañoMax) {
            $error = 'El archivo es demasiado grande. Máximo 5MB.';
        } else {
            if (!is_dir($rutaSubidas)) {
                mkdir($rutaSubidas, 0777, true);
            }
            if (!is_dir($rutaMiniaturas)) {
                mkdir($rutaMiniaturas, 0777, true);
            }

            $nombreArchivo = generarNombreArchivo($_FILES['imagen']['name'], $rutaSubidas);
            $rutaDestino = $rutaSubidas . $nombreArchivo;
            $rutaMiniatura = $rutaMiniaturas . 'thumb_' . $nombreArchivo;

            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
                if (crearMiniatura($rutaDestino, $rutaMiniatura, 200, 200)) {
                    $mensaje = "<b>Imagen subida con éxito:</b><br>";
                    $mensaje .= "<img src='$rutaMiniatura' alt='Miniatura'><br>";
                    $mensaje .= "Nombre: $nombreArchivo<br>";
                    $mensaje .= "Tamaño: " . round($tamaño / 1024, 2) . " KB";
                } else {
                    $error = 'No se pudo crear la miniatura.';
                }
            } else {
                $error = 'Error al subir la imagen.';
            }
        }
    } else {
        $error = 'No se pudo subir el archivo.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir y Redimensionar Imágenes</title>
</head>
<body>
    <h2>Subir Imagen de Producto</h2>
    
    <?php if ($mensaje): ?>
        <p style="color: green;"><?= $mensaje ?></p>
    <?php endif; ?>
    
    <?php if ($error): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="" enctype="multipart/form-data">
        <label for="imagen"><b>Seleccionar archivo:</b></label>
        <input type="file" name="imagen" accept="image/*" id="imagen"><br><br>
        <input type="submit" value="Subir Imagen">
    </form>
</body>
</html>
