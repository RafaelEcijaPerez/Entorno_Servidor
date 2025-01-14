<?php
// Incluir archivos de cabecera y pie de página
include 'header.php';

// Inicializar variables
$ipInput = '';
$validIP = '';
$error = '';

// Lista de rangos de IP reservados (privadas y loopback)
$reservedRanges = [
    '10.0.0.0/8',     // Red privada clase A
    '172.16.0.0/12',  // Red privada clase B
    '192.168.0.0/16', // Red privada clase C
    '127.0.0.0/8',    // Loopback
];

// Función para verificar si la IP es válida y no está en un rango reservado
function validate_ip($ip, $reservedRanges) {
    // Verificar si la entrada es un rango válido (por ejemplo, 192.168.1.0/24)
    if (strpos($ip, '/') !== false) {
        [$baseIP, $cidr] = explode('/', $ip);

        if (filter_var($baseIP, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) && is_numeric($cidr) && $cidr >= 0 && $cidr <= 32) {
            foreach ($reservedRanges as $reserved) {
                if (ip_in_range($baseIP, $reserved)) {
                    return false; // Está en un rango reservado
                }
            }
            return $ip; // Es un rango válido
        }
    }

    // Verificar si es una IP válida
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        foreach ($reservedRanges as $reserved) {
            if (ip_in_range($ip, $reserved)) {
                return false; // Está en un rango reservado
            }
        }
        return $ip; // Es una IP válida
    }

    return false; // No es válida
}

// Función para verificar si una IP está dentro de un rango
function ip_in_range($ip, $range) {
    [$rangeIP, $prefix] = explode('/', $range);
    $mask = -1 << (32 - $prefix);
    $ipLong = ip2long($ip);
    $rangeLong = ip2long($rangeIP);
    return ($ipLong & $mask) === ($rangeLong & $mask);
}

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ipInput = $_POST['ip'] ?? '';
    $validIP = validate_ip($ipInput, $reservedRanges);

    if (!$validIP) {
        $error = "La dirección IP ingresada no es válida o está en un rango reservado. Se asignará '0.0.0.0'.";
        $validIP = '0.0.0.0';
    }
}
?>

<div class="container">
    <h1>Validación de Dirección IP</h1>
    <?php if ($error): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <?php if ($validIP): ?>
        <p>Dirección IP válida: <strong><?= htmlspecialchars($validIP) ?></strong></p>
    <?php endif; ?>

    <!-- Formulario para ingresar la dirección IP -->
    <form action="validar_ip.php" method="POST">
        <label for="ip">Ingresa una dirección IP o un rango (por ejemplo, 192.168.1.1 o 192.168.1.0/24):</label>
        <input type="text" id="ip" name="ip" value="<?= htmlspecialchars($ipInput) ?>" required><br>

        <button type="submit">Validar</button>
    </form>
</div>

<?php
include 'footer.php';
?>
