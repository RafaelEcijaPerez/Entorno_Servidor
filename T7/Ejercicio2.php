<?php
//Mostrar mensaje
$mensaje = "";
$movido = false;
//Comprobar si se ha cargado el archivo
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_FILES['image']['error'] === 0) {
        //Coger temporal el archivo
        $archivo_temporal = $_FILES['image']['tmp_name'];
        //Ruta donde se va a mover
        $ruta = 'var/www/' . $_FILES['image']['name'];
        //Mover archivo
        if (move_uploaded_file($archivo_temporal, $ruta)) {
            $mensaje = 'Archivo movido correctamente';
            $movido = true;
        } else {
            $mensaje = 'Error al mover el archivo';
        }
    } else {
        $mensaje = 'Error al cargar el archivo';
    }
}
?>
<?= $mensaje; ?>
<form method="POST" action="upload-file.php" enctype="multipart/form-data">
    <label for="image"><b>Subir archivo:</b></label>
    <input type="file" name="image" accept="image/*" id="image">
    <input type="submit" value="Subir">
    <?php if ($movido):?>
        <a href="var/www/<?= $_FILES['image']['name'];?>">Descargar archivo</a>
    <?php endif;?>
</form>