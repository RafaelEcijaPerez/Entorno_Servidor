<?php
// Datos de usuario simulados
$nombre = "   Juan Pérez   ";
$correo = "JUAN.PEREZ@EXAMPLE.COM";
$mensaje = "Este mensaje es urgente y necesita ser procesado con cuidado bobo.";

// Procesamiento
$eliminar_espacios_blanco = trim($nombre);
$correoMinusculas = strtolower($correo);
$censura = str_replace("bobo", "****", $mensaje);
$eliminar_insulto = str_replace("bobo", "", $mensaje);
$prioridad = str_ireplace("urgente","Prioridad Alta",$eliminar_insulto);
$enfatizar = str_repeat("!!!","1");

// Resultados
echo "<h2>Datos procesados</h2>";
echo "<strong>Nombre original:</strong> '$nombre' → '$eliminar_espacios_blanco'<br>";
echo "<strong>Correo original:</strong> '$correo' → '$correoMinusculas'<br>";
echo "<strong>Mensaje procesado:</strong> $censura<br>";
echo "<strong>Mensaje con prioridad:</strong> $prioridad<br>";
echo "<strong>Mensaje con prioridad y enfatizado:</strong> $prioridad .$enfatizar<br>";

?>
