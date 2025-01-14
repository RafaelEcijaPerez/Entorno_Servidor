<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS Example</title>
</head>
<body>
    <h1>XSS Example</h1>
    <p>
        <a href="xss.php?msg=<script>alert('Malicious Code!')</script>">
            Enlace con mensaje malicioso
        </a>
    </p>
</body>
</html>
