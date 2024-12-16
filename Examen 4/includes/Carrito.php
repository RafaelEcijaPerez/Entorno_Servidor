<?php
class Carrito {
    //Propiedades
    private array $productos = [];
    private float $impuesto;

    //constructor
    public function __construct($productos) {
        $this->productos=$productos;
       
        $this->impuesto =0.21;

    }

    //Metodos
    //Agregar un producto al carrito
    public function aggregarProducto(Producto $producto) {
        //Comprobar que se ha realizado la operacion
        $estaOk = false ;
        //Comprobar que el producto no se encuentra en el carrito
        foreach ($this->productos as $p) {
            if ($p->getId() == $producto->getId()) {
                $estaOk = true;
                break;
            }
        }
        //Si el producto no se encuentra, añadirlo
        if (!$estaOk) {
            $this->productos[] = $producto;
        }

        return $estaOk;

    }

    public function calcularSubtotal(){
        //Precio total del producto
        $subtotal = 0 ;
        //Recorrer el array de producto
        foreach ($this->productos as $producto) {
            //Sumar el precio de los productos
           $subtotal = $producto->getPrecio() + $subtotal;
                
        }
        //deveulve el precio total 
        return $subtotal;
    }

    //CAlcular impuesto
    public function calcularImpuestos(){
        return $this ->impuesto * $this->calcularSubtotal();
    }
    //Calcular el precio total
    public function getPrecioTotal(){
        return $this->calcularSubtotal() +$this->calcularSubtotal();
    }

    public function muestraCarrito(){
        for ($i=0;$i<10;$i+1) {
            //Mostrar los datos del producto
            echo $this->productos[$i]->getId();
            echo  $this->productos[$i]->getNombre();
            echo  $this->productos[$i]->getPrecio()."€";
            echo  $this->productos[$i]->getCantidad();
            echo $this->getPrecioTotal() ."€";
        }
        
    }
}