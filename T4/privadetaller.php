<?php 

//Incluye vehiculos.php
include "./privateVeiculo.php";
// Crear instancias de vehículos
$bmw = new Vehicle("BMW", "i8", "ABC123");
$audi = new Vehicle("Audi", "Q7", "DEF456");
$ford = new Vehicle("Ford", "Mustang", "GHI789");

// Cambiar estado de disponibilidad usando el setter
$bmw->setAvailable(false);

// Crear instancia de la flota
$fleet = new Fleet("Parque");
$fleet->addVehicle($bmw);
$fleet->addVehicle($audi);
$fleet->addVehicle($ford);

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
    <h1><?= $fleet->getName() ?></h1>
    <h2>Todos nuestros vehículos</h2>
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

            <?php
            //Recoremos el array de los vehiculos y lo mostramos 
            foreach ($fleet->getVehicles() as $vehicle): ?>
                <tr>
                    <!--Mostar la informacion del vehiculos-->
                    <td><?= $vehicle->getMake() ?></td>
                    <td><?= $vehicle->getModel() ?></td>
                    <td><?= $vehicle->getLicensePlate() ?></td>
                    <td><?= $vehicle->isAvailable() ? 'Sí' : 'No' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Vehículos Disponibles</h2>
    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Matrícula</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //Recoremos el array de los vehiculos disponibles y los mostramos
             foreach ($fleet->getAvailableVehicles() as $vehicle): ?>
                <tr>
                    <!--Mostrar la informacion de los vehiculos disponibles-->
                    <td><?= $vehicle->getMake() ?></td>
                    <td><?= $vehicle->getModel() ?></td>
                    <td><?= $vehicle->getLicensePlate() ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
