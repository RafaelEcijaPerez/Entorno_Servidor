<?php
class RedSocial {
    // Propiedades privadas
    private array $intereses;  // Intereses indexados (array simple)
    private array $interesesID;  // Intereses asociativos (array clave-valor)

    // Constructor para inicializar los intereses
    public function __construct() {
        // Inicializamos los intereses con algunos valores
        $this->intereses = [
            "Deportes",
            "Cine",
            "Música",
            "Tecnología",
            "Viajar"
        ];

        // Inicializamos los interesesID con los valores asociados (clave => valor)
        $this->interesesID = [
            "Deportes" => 100,
            "Cine" => 200,
            "Música" => 300,
            "Tecnología" => 400,
            "Viajar" => 500
        ];
    }

    // Método para mostrar los intereses indexados como un string separado por comas
    public function mostrarIntereses() {
        // Convertimos el array $intereses a un string separado por comas
        return implode(", ", $this->intereses);
    }

    // Método para mostrar los intereses asociativos como una lista no ordenada (<ul> <li>)
    public function mostrarInteresesID() {
        // Iniciamos la lista
        $html = "<ul>";
        
        // Recorremos el array $interesesID y agregamos cada elemento como <li>
        foreach ($this->interesesID as $interes => $id) {
            $html .= "<li>$interes - ID: $id</li>";
        }

        // Cerramos la lista
        $html .= "</ul>";
        
        return $html;
    }

    // Método para agregar un nuevo interés al array $intereses
    public function agregarInteres($interes) {
        $this->intereses[] = $interes;
    }

    // Método para agregar un nuevo interés al array $interesesID con su ID
    public function agregarInteresID($interes, $id) {
        $this->interesesID[$interes] = $id;
    }

    // Método para numerar aleatoriamente los intereses y mostrar la lista
    public function numerarIntereses() {
        $numeros = [];

        foreach ($this->intereses as $interes) {
            // Genera un número aleatorio entre 1 y 1000
            $numeros[$interes] = mt_rand(1, 1000);
        }

        // Ordenar los intereses por su número aleatorio en orden ascendente
        asort($numeros);

        // Mostrar la lista numerada
        echo "<h3>Intereses Numerados (Aleatorios):</h3>";
        foreach ($numeros as $interes => $numero) {
            echo $interes . " - Número: " . $numero . "<br>";
        }
    }

    // Método para redirigir después de agregar un nuevo interés
    public function redirigir() {
        header("Location: gracias.php");
        exit;
    }
}

// Crear una instancia de la clase RedSocial
$redSocial = new RedSocial();

// Mostrar los intereses indexados como un string
echo "<h3>Intereses (como string):</h3>";
echo $redSocial->mostrarIntereses() . "<br>";

// Mostrar los intereses asociativos como una lista no ordenada
echo "<h3>Intereses (como lista):</h3>";
echo $redSocial->mostrarInteresesID();

// Agregar un nuevo interés a la lista
$redSocial->agregarInteres("Fotografía");
$redSocial->agregarInteresID("Fotografía", 600);

// Mostrar la lista actualizada después de agregar un nuevo interés
echo "<h3>Lista de intereses después de agregar 'Fotografía':</h3>";
echo $redSocial->mostrarIntereses() . "<br>";

echo "<h3>Lista de intereses (como lista) después de agregar 'Fotografía':</h3>";
echo $redSocial->mostrarInteresesID();

// Numerar los intereses aleatoriamente
$redSocial->numerarIntereses();

// Redirigir después de agregar un nuevo interés

//$redSocial->redirigir();
?>
