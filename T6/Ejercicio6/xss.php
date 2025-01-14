<?php
function html_escape(string $string, int $flags = ENT_QUOTES | ENT_HTML5): string {
    return htmlspecialchars($string, $flags, 'UTF-8', true);
}

$message = $_GET['msg'] ?? 'No message provided';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escaping Markup</title>
</head>
<body>
    <h1>Processed Message</h1>
    <p>Original Message:</p>
    <pre><?= $message ?></pre>
    <p>Escaped Message:</p>
    <pre><?= html_escape($message) ?></pre>
</body>
</html>
