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
