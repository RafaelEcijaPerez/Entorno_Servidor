<?php
$datos = [ 
    "john.doe@example.com", 
    "jane-doe@website.org", 
    "invalid-email@com", 
    "123-456-7890", 
    "987.654.3210", 
    "http://www.example.com", 
    "https://site.org/path?query=string", 
    "not-a-url" 
];

// 2. Validar correos electrónicos con preg_match
echo "<b>Validando correos electrónicos:</b><br>";
$validar_correo = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

foreach ($datos as $item) {
    if (preg_match($validar_correo, $item)) {
        echo "$item es un correo electrónico válido.<br>";
    }
}

// 3. Extraer números de teléfono con preg_match_all
echo "<br><b>Extrayendo números de teléfono:</b><br>";
$validar_telefono = '/\d{3}[-.\s]?\d{3}[-.\s]?\d{4}/';
preg_match_all($validar_telefono, implode(' ', $datos), $coincidencias_telefono);

if (!empty($coincidencias_telefono[0])) {
    foreach ($coincidencias_telefono[0] as $telefono) {
        echo "Número de teléfono encontrado: $telefono<br>";
    }
} else {
    echo "No se encontraron números de teléfono válidos.<br>";
}

// 4. Dividir una URL en sus componentes con preg_split
echo "<br><b>Dividiendo URLs en componentes:</b><br>";
$validar_url = '/^(https?):\/\/([^\/]+)(\/[^?]*)?(\?[^#]*)?(#.*)?$/';

foreach ($datos as $item) {
    if (preg_match($validar_url, $item, $partes_url)) {
        echo "URL: $item<br>";
        echo "Protocolo: " . $partes_url[1] . "<br>";
        echo "Dominio: " . $partes_url[2] . "<br>";
        echo "Ruta: " . (isset($partes_url[3]) ? $partes_url[3] : 'No tiene ruta') . "<br>";
        echo "Consulta: " . (isset($partes_url[4]) ? $partes_url[4] : 'No tiene consulta') . "<br><br>";
    }
}

// 5. Limpiar correos electrónicos inválidos con preg_replace
echo "<br><b>Limpieza de correos electrónicos inválidos:</b><br>";
$datos_limpiados = preg_replace($validar_correo, '$0', implode(' ', $datos)); // Mantener solo los correos válidos

$datos_limpiados = preg_replace($validar_correo, '', implode(' ', $datos)); // Eliminar los correos no válidos

echo "Datos después de limpiar correos inválidos: $datos_limpiados<br>";
?>
