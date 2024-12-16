<?php
class Producto {

    //Propiedades
    private int $id;
    private string $nombre;

    private int $cantidad;

    private float $precio;

    //Funciones

    //Constructor
    public function __construct($id, $nombre, $cantidad, $precio){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->cantidad =$cantidad;
        $this->precio = $precio;
    }
    //Getter

    public function getNombre(){
        return $this->nombre;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function getCantidad(){
        return  $this->cantidad;
    }

    public function getId(){
        return $this->id;
    }

    //setter
    public function setNombre($nombre){
        //Comprobar si es valido el parametro
        $valido = false;

        //validar
        if($nombre!=""){
            $valido =true;
        }
        //devuelve el bool  
        return $valido;
    }

    public function setCantidad($cantidad){
        //Comprobar si es valido el parametro
        $valido = false;

        //validar
        if($cantidad>0){
            $valido =true;
        }
        //devuelve el bool  
        return $valido;
    
    }

    public function setId($id){
        //Comprobar si es valido el parametro
        $valido = false;

        //validar
        if($id>0){
            $valido =true;
        }
        //devuelve el bool  
        return $valido;
    }

    public function setPrecio($precio){
        //Comprobar si es valido el parametro
        $valido = false;

        //validar
        if($precio > 0){
            $valido =true;
        }
        //devuelve el bool  
        return $valido;
    }

    //Implementar el precio total
    public function getPrecioTotal($cantidad,$precio){
        return $precio * $cantidad;
    }
    
    

}
