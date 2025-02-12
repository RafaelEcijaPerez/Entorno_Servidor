<?php
// Función para validar imágenes
function validar_imagenes($image) {
    // Tipos de imagenes permitidas y tamaño máximo de 5MB.
    $allowedTypes = ['image/png', 'image/jpeg'];
    $maxSize = 5 * 1024 * 1024; // 5MB
    
    // Validar el tipo de imagen y el tamaño del archivo.
    if ($image['error'] !== UPLOAD_ERR_OK) {
        return "Error en la subida del archivo.";
    }
    
    if (!in_array($image['type'], $allowedTypes)) {
        return "Formato de imagen no permitido.";
    }
    
    if ($image['size'] > $maxSize) {
        return "La imagen supera el tamaño máximo permitido (5MB).";
    }
    
    return true;
}

// Función para crear miniaturas
function crearMiniatura($srcPath, $destPath, $maxWidth = 300, $maxHeight = 300) {
    // Obtener información de la imagen original.
    list($width, $height, $type) = getimagesize($srcPath);
    
    // Calcular el ratio de ajuste para mantener las proporciones.
    $ratio = min($maxWidth / $width, $maxHeight / $height);
    
    // Redimensionar manteniendo las proporciones.
    $newWidth = (int) ($width * $ratio);
    $newHeight = (int) ($height * $ratio);
    
    // Crear una nueva imagen con las dimensiones redimensionadas.
    $dstImage = imagecreatetruecolor($newWidth, $newHeight);
    
    // Crear la imagen según el tipo.
    if ($type == IMAGETYPE_JPEG) {
        $srcImage = imagecreatefromjpeg($srcPath);
    } elseif ($type == IMAGETYPE_PNG) {
        $srcImage = imagecreatefrompng($srcPath);
    } else {
        return false;
    }
    
    // Copiar la imagen original en la nueva imagen redimensionada.
    imagecopyresampled($dstImage, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    
    // Guardar la miniatura en el destino.
    if ($type == IMAGETYPE_JPEG) {
        imagejpeg($dstImage, $destPath, 90);
    } elseif ($type == IMAGETYPE_PNG) {
        imagepng($dstImage, $destPath, 9);
    }
    
    // Liberar recursos
    imagedestroy($srcImage);
    imagedestroy($dstImage);
}

// Inicializar variables
$errors = [];
$menuData = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar datos del formulario
    $menuData = [
        'plato1_nombre' => trim($_POST['plato1_nombre'] ?? ''),
        'plato1_desc' => trim($_POST['plato1_desc'] ?? ''),
        'plato1_precio' => trim($_POST['plato1_precio'] ?? ''),
        'plato2_nombre' => trim($_POST['plato2_nombre'] ?? ''),
        'plato2_desc' => trim($_POST['plato2_desc'] ?? ''),
        'plato2_precio' => trim($_POST['plato2_precio'] ?? ''),
        'postre_nombre' => trim($_POST['postre_nombre'] ?? ''),
        'postre_desc' => trim($_POST['postre_desc'] ?? ''),
        'postre_precio' => trim($_POST['postre_precio'] ?? ''),
        'bebida' => trim($_POST['bebida'] ?? '')
    ];

    // Validaciones
    if (!preg_match("/^[a-zA-Z ]{1,20}$/", $menuData['plato1_nombre']) ||
        !preg_match("/^[a-zA-Z ]{1,20}$/", $menuData['plato2_nombre']) ||
        !preg_match("/^[a-zA-Z ]{1,20}$/", $menuData['postre_nombre'])) {
        $errors[] = "Los nombres deben contener solo letras y espacios (1-20 caracteres).";
    }

    if (!preg_match("/^[a-zA-Z0-9 .,]{1,200}$/", $menuData['plato1_desc']) ||
        !preg_match("/^[a-zA-Z0-9 .,]{1,200}$/", $menuData['plato2_desc']) ||
        !preg_match("/^[a-zA-Z0-9 .,]{1,200}$/", $menuData['postre_desc'])) {
        $errors[] = "Las descripciones deben contener solo letras, números y espacios (1-200 caracteres).";
    }

    if (!is_numeric($menuData['plato1_precio']) || !is_numeric($menuData['plato2_precio']) || !is_numeric($menuData['postre_precio']) ||
        $menuData['plato1_precio'] < 0 || $menuData['plato2_precio'] < 0 || $menuData['postre_precio'] < 0) {
        $errors[] = "El precio debe ser un número positivo.";
    }

    if ($menuData['bebida'] !== "Sí" && $menuData['bebida'] !== "No") {
        $errors[] = "La bebida solo puede ser 'Sí' o 'No'.";
    }
    //Saneamiento
    $menuData['plato1_nombre'] = htmlspecialchars($menuData['plato1_nombre']);
    $menuData['plato1_desc'] = htmlspecialchars($menuData['plato1_desc']);
    $menuData['plato2_nombre'] = htmlspecialchars($menuData['plato2_nombre']);
    $menuData['plato2_desc'] = htmlspecialchars($menuData['plato2_desc']);
    $menuData['postre_nombre'] = htmlspecialchars($menuData['postre_nombre']);
    $menuData['postre_desc'] = htmlspecialchars($menuData['postre_desc']);
    $menuData['postre_precio'] = htmlspecialchars($menuData['postre_precio']);
    $menuData['bebida'] = htmlspecialchars($menuData['bebida']);

    // Si no hay errores, procesar imágenes
    if (empty($errors)) {
        $dirImagenes = "imagenes/";
        $dirMiniaturas = "imagenes/miniaturas/";

        // Crear directorios si no existen
        if (!is_dir($dirImagenes)) mkdir($dirImagenes, 0777, true);
        if (!is_dir($dirMiniaturas)) mkdir($dirMiniaturas, 0777, true);

        // Procesar las imágenes
        $NombreImagenes = ['plato1' => 'plato1', 'plato2' => 'plato2', 'postre' => 'postre'];
        
        // Validar y subir las imágenes
        foreach ($NombreImagenes as $key => $fileName) {
            if (!empty($_FILES[$key]['name'])) {
                $Resultado_validacion_imagenes = validar_imagenes($_FILES[$key]);
                if ($Resultado_validacion_imagenes !== true) {
                    $errors[] = $Resultado_validacion_imagenes;
                }

                // Subir la imagen y crear miniatura
                $ext = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
                $destino = $dirImagenes . $fileName . ".$ext";
                $destino_miniaturas = $dirMiniaturas . $fileName . ".$ext";

                // Si no hubo errores durante la subida, mover la imagen y crear miniatura
                move_uploaded_file($_FILES[$key]['tmp_name'], $destino);
                crearMiniatura($destino, $destino_miniaturas);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Menú del Día</title>
</head>
<body>

<h1>Menú Restaurante</h1>

<form method="POST" enctype="multipart/form-data">
    <label>Primer Plato:</label>
    <input type="text" name="plato1_nombre" required>
    <br>
    <label>Descripcion</label>
    <textarea name="plato1_desc" required></textarea>
    <br>
    <label>Precio</label>
    <input type="number" name="plato1_precio" required>
    <br>
    <label>Imagen</label>
    <input type="file" name="plato1">
    <br>
    
    <label>Segundo Plato:</label>
    <input type="text" name="plato2_nombre" required>
    <br>
    <label>Descripcion</label>
    <textarea name="plato2_desc" required></textarea>
    <br>
    <label>Precio</label>
    <input type="number" name="plato2_precio" required>
    <br>
    <label>Imagen</label>
    <input type="file" name="plato2">
    <br>

    <label>Postre:</label>
    <input type="text" name="postre_nombre" required>
    <br>
    <label>Descripcion</label>
    <textarea name="postre_desc" required></textarea>
    <br>
    <label>Precio</label>
    <input type="number" name="postre_precio" required>
    <br>
    <label>Imagen</label>
    <input type="file" name="postre">
    <br>

    <label>Bebida incluida:</label>
    <select name="bebida">
        <option value="Sí">Sí</option>
        <option value="No">No</option>
    </select>

    <button type="submit">Enviar</button>
</form>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)): ?>
    <h2>Resumen del Menú</h2>
    <p>Primer Plato: <?= htmlspecialchars($menuData['plato1_nombre']) ?> 
    <br> 
    <?= htmlspecialchars($menuData['plato1_desc'])?> 
    <br>
    <?= htmlspecialchars($menuData['plato1_precio']) ?>€</p>
    <br>
    <img src="imagenes/miniaturas/plato1.jpg" alt="Primer Plato">
    <p>Segundo Plato: <?= htmlspecialchars($menuData['plato2_nombre']) ?> 
    <br> 
    <?= htmlspecialchars($menuData['plato2_desc']) ?> 
    <br>
    <?= htmlspecialchars($menuData['plato2_precio']) ?>€</p>
    <br>
    <img src="imagenes/miniaturas/plato2.jpg" alt="Segundo Plato">
    <p>Postre: <?= htmlspecialchars($menuData['postre_nombre']) ?> 
    <br> 
    <?= htmlspecialchars($menuData['postre_desc']) ?> 
    <br>
    <?= htmlspecialchars($menuData['postre_precio']) ?>€</p>
    <br>
    <img src="imagenes/miniaturas/postre.jpg" alt="Postre">
    <p>Bebida incluida: <?= $menuData['bebida'] ?></p>
<?php endif; ?>
<?php if (!empty($errors)): ?>
    <h2>Errores:</h2>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

</body>
</html>
