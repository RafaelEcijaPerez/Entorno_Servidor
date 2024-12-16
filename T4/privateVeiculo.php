<?php 
// Clase Vehicle
class Vehicle {
    private string $make;
    private string $model;
    private string $licensePlate;
    private bool $available;

    // Constructor
    public function __construct(string $make, string $model, string $licensePlate) {
        $this->make = $make;
        $this->model = $model;
        $this->licensePlate = $licensePlate;
        $this->available = true;
    }

    // Métodos Getter
    public function getMake(): string {
        return $this->make;
    }

    public function getModel(): string {
        return $this->model;
    }

    public function getLicensePlate(): string {
        return $this->licensePlate;
    }

    public function isAvailable(): bool {
        return $this->available;
    }

    // Método Setter para available
    public function setAvailable(bool $status): void {
        $this->available = $status;
    }

    public function setmake(string $make): void {
        $this->make = $make;
    }
    
    public function setModel(string $model): void {
        $this->model = $model;
    }
    
    public function setLicensePlate(string $licensePlate): void {
        $this->licensePlate = $licensePlate;
    }
    
}

// Clase Fleet
class Fleet {
    private string $name;
    private array $vehicles;

    // Constructor
    public function __construct(string $name) {
        $this->name = $name;
        $this->vehicles = [];
    }

    // Métodos Getter
    public function getName(): string {
        return $this->name;
    }

    // Agregar vehículos
    public function addVehicle(Vehicle $vehicle): void {
        $this->vehicles[] = $vehicle;
    }

    // Listar todos los vehículos
    public function getVehicles(): array {
        return $this->vehicles;
    }

    // Listar los vehículos que estén disponibles
    public function getAvailableVehicles(): array {
        $availableVehicles = [];
        foreach ($this->vehicles as $vehicle) {
            if ($vehicle->isAvailable()) {
                $availableVehicles[] = $vehicle;
            }
        }
        return $availableVehicles;
    }
    
}
?>
