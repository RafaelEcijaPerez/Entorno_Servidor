<?php
//Mostrar mensaje
$mensaje = "";
//Comprobar si se ha cargado el archivo
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_FILES['image']['error'] === 0) {
        //Obtener el nombre del archivo
        $mensaje = 'Subida de archivo exitosa';
    } else {
        $mensaje = 'Error al cargar el archivo';
    }
}
?>
<?= $mensaje; ?>
<form method="POST" action="upload-file.php" enctype="multipart/form-data">
    <label for="image"><b>Subir archivo:</b></label>
    <input type="file" name="image" accept="image/*" id="image">
</form>