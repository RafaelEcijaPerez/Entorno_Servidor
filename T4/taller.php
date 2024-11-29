<?php 

//Incluye vehiculos.php
include "./vehiculos.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleet Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0 auto;
            max-width: 600px;
            padding: 20px;
            text-align: center;
            background-color: #f8f9fa;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1><?= $fleet->name ?></h1>
    <h2>Todos nuestro vehiculos</h2>
    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Matrícula</th>
                <th>Disponible</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fleet->getVehicles() as $vehicle): ?>
                <tr>
                    <td><?= $vehicle->make ?></td>
                    <td><?= $vehicle->model ?></td>
                    <td><?= $vehicle->licensePlate ?></td>
                    <td><?= $vehicle->isAvailable() ? 'Sí' : 'No' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Vehiculos Disponibles</h2>
    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Matrícula</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fleet->getAvailableVehicles() as $vehicle): ?>
                <tr>
                    <td><?= $vehicle->make ?></td>
                    <td><?= $vehicle->model ?></td>
                    <td><?= $vehicle->licensePlate ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
