<?php 
//Clase persona
class Persona{
    //nombre 
    private $nombre;
    //apellido
    private $apellido;
    //edad
    private $edad;
    //constructor
    public function __construct($nombre, $apellido, $edad){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
    }
    //getter nombre
    public function getNombre(){
        return $this->nombre;
    }
    //getter apellido
    public function getApellido(){
        return $this->apellido;
    }
    //getter edad
    public function getEdad(){
        return $this->edad;
    }
    //setter nombre
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    //setter apellido
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    //setter edad
    public function setEdad($edad){
        //controlar que la edad sea mayor que 18
        if($edad > 18){
            $this->edad = $edad;
        }else{
            echo "La edad debe ser mayor que 18.";
        }

    }
    //mostrar datos persona
    public function mostrarDatos(){
        echo "Nombre: ".$this->nombre."<br>";
        echo "Apellido: ".$this->apellido."<br>";
        echo "Edad: ".$this->edad." años<br>";
    }

}

//crear un objeto de la clase persona

$persona = new Persona("Juan", "Perez", 25);
$persona2 = new Persona("Juan", "Jimenez",15);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Mostar los datos de la persona-->
    <?php
    $persona->mostrarDatos();
    echo "<hr>";
    $persona2->mostrarDatos();
    //cambiar nombre y edad de la persona
    $persona->setNombre("Pedro");
    $persona->setEdad(30);
    $persona->mostrarDatos();
    //intentar cambiar la edad de la persona a 15
    $persona2->setEdad(10);
    $persona2->mostrarDatos();
    ?>
</body>
</html>