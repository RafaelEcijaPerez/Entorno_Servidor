<?php 

class Product {
    public $id;
    public $name;
    public $price;
    public $stock;

    // Constructor para inicializar las propiedades
    public function __construct($id, $name, $price = 0.0, $stock = 0) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    // Método para actualizar el precio
    public function updatePrice($newPrice) {
        $this->price = $newPrice;
    }

    // Método para actualizar el stock
    public function updateStock($newStock) {
        $this->stock = $newStock;
    }
}
?>
