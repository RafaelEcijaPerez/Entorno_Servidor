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

// Crear un producto
    $product1 = new Product(1, 'Manzana', 2.30, 100);
    $product2 = new Product(2, 'Platano', 1.99, 50);
    $product3 = new Product(3, 'Fresas', 3.00, 20);

    // Array de productos
    $products = [$product1, $product2, $product3];

    //actualizar precio
    $product1->updatePrice(2.50);
    // actualizar stock
    $product2->updateStock(60);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>
        <?php foreach ($products as $product) :?>
            <tr>
                <td><?php echo $product->id;?></td>
                <td><?php echo $product->name;?></td>
                <td><?php echo $product->price;?></td>
                <td><?php echo $product->stock;?></td>
            </tr>
        <?php endforeach;?>
    </table>
</body>
</html>
