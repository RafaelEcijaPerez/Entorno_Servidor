<?php 
// Clase Vehicle
class Vehicle {
    public string $make;
    public string $model;
    public string $licensePlate;
    public bool $available;

    // Constructor
    public function __construct(string $make, string $model, string $licensePlate) {
        $this->make = $make;
        $this->model = $model;
        $this->licensePlate = $licensePlate;
        $this->available = true;
    }

    // Mostrar detalles del vehículo
    public function getDetails() {
        return [
            'Make' => $this->make,
            'Model' => $this->model,
            'License Plate' => $this->licensePlate,
        ];
    }

    // Mostrar si está disponible
    public function isAvailable() {
        return $this->available;
    }
}

// Clase Fleet
class Fleet {
    public string $name;
    private array $vehicles;

    // Constructor
    public function __construct(string $name) {
        $this->name = $name;
        $this->vehicles = [];
    }

    // Agregar vehículos
    public function addVehicle(Vehicle $vehicle) {
        $this->vehicles[] = $vehicle;
    }

    // Listar todos los vehículos
    public function getVehicles() {
        return $this->vehicles;
    }

    // Listar los vehículos que estén disponibles
    public function getAvailableVehicles() {
        $availableVehicles = [];
        foreach ($this->vehicles as $vehicle) {
            if ($vehicle->isAvailable()) {
                $availableVehicles[] = $vehicle;
            }
        }
        return $availableVehicles;
    }
}

// Crear instancias
$bmw = new Vehicle("BMW", "i8", "ABC123");
$audi = new Vehicle("Audi", "Q7", "DEF456");
$ford = new Vehicle("Ford", "Mustang", "GHI789");

$bmw->available = false;

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
