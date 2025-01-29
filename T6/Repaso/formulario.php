<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Usuario</title>
</head>
<body>
    <h1>Formulario de Usuario</h1>
    <form action="resultado.php" method="get">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>

        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad" required>
        <br><br>

        <label for="pais">País:</label>
        <select name="pais" id="pais" required>
            <option value="España">España</option>
            <option value="México">México</option>
            <option value="Argentina">Argentina</option>
            <option value="Colombia">Colombia</option>
        </select>
        <br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
