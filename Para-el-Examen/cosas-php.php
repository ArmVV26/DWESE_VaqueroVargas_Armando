<?php
    function saltoDeLinea() {
        echo "<br><br><hr>";
    }

    // MATCH -> Como usar un Match
    echo "<h1>Match</h1>";

    $num1 = 15;

    echo "match($num1) { 5 => 'Ciao', 10 => 'Hi', 15 => 'Hola'}; <br>";
    
    echo "Resultado: ". match($num1) {
        5 => "Ciao",
        10 => "Hi",
        15 => "Hola"
    };

    saltoDeLinea();

    // ARRAY -> Como usar los arrays
    echo "<h1>Arrays</h1>";

    $array = ["1" => "Hola", "2" => "Adios", "3" => "Buenas"];

    print_r($array);
    echo "<br>";

    foreach($array as $key => $valor) {
        echo $key ." => ". $valor ."<br>";
    }

    echo "<br>";

    $arrayBidi = [
        "1" => ["1" => "Hola", "2" => "Adios", "3" => "Buenas"],
        "2" => ["1" => "Hi", "2" => "Goodbye", "3" => "Hello"],
        "3" => ["1" => "Ciao", "2" => "Ciao", "3" => "Ciao"]
    ];

    print_r($arrayBidi);
    echo "<br>";

    foreach($arrayBidi as $key => $valor) {
        print_r($valor);
        echo "<br>";
        
        foreach($valor as $key2 => $valor2) {
            echo $key2 ."=>". $valor2 ."<br>";
        }

        echo "<br>";
    }

    saltoDeLinea();

    // STRING -> Fuciones que se pueden hacer con un string
    echo "<h1>String</h1>";

    $cadena = "hola buenos dias";
    $cadena2 = "HOLA BUENOS DIAS";
    $cadena3 = "hola,buenos,dias";

    echo "Posicion: ". $cadena[5] ."<br>";
    echo "Longitud: ". strlen($cadena) ."<br>";
    echo "Al reves: ". strrev($cadena) ."<br>";
    echo "Minuscula: ". strtolower($cadena2) ."<br>";
    echo "Mayuscula: ". strtoupper($cadena) ."<br>";
    echo "Comparar: ". strcmp($cadena, $cadena2) ."<br>";
    echo "Contiene: ". str_contains($cadena, "hola") ."<br>";
    echo "Empieza por: ". str_starts_with($cadena, "h") ."<br>";
    echo "Acaba por: ". str_ends_with($cadena, "s") ."<br>";
    
    $arrayCadena = explode(",", $cadena3);
    echo "Separar: ";
    print_r($arrayCadena) ."<br>";

    $string = implode(" ", $array);
    echo "<br> Juntar: ". $string;

    echo "<h3>STR_PAD</h3>";
    
    $chain = "cadena";
    echo str_pad($chain, 10, 0, STR_PAD_LEFT);

    saltoDeLinea();

    // FECHAS -> Como manejar fechas en PHP
    echo "<h1>Fechas</h1>";

    echo "Dia Actual: ". date("Y-m-d") ."<br>";
    echo "Lunes Siguiente: ". date("Y-m-d", strtotime("next Monday")) ."<br>";
    echo "Dia Aleatorio: ". date("Y-m-d", strtotime("2001-09-01")) ."<br>";
    echo "+2 Semana: ". date("Y-m-d", strtotime("+2 week")) ."<br>";
    echo "-2 dias: ". date("Y-m-d", strtotime("-2 days")) ."<br>";
    echo "+2 mes: ". date("Y-m-d", strtotime("+2 month")) ."<br>";
    echo "-2 años : ". date("Y-m-d", strtotime("-2 year")) ."<br>";

    $base = strtotime("2024-01-01");
    echo "Con variables : ". date("Y-m-d", strtotime("+10 days", $base)) ."<br>";

    $start = strtotime("2001-09-01");
    $end = strtotime("2024-11-27");
    echo "Calculo con Fechas : ". date("Y-m-d", $end-$start) ."<br>";

    saltoDeLinea();

    // SERVER -> Sanear y recoger datos

    $texto = null;
    $numero = null;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['tipo_texto']) && !empty($_POST['tipo_texto'])) {

            $texto = htmlspecialchars($_POST['tipo_texto']);
            $numero = intval($_POST['tipo_number']);
        }
    }

    if ($texto !== null && $numero !== null) {
        echo "<ul>
                <li>Texto: $texto</li>
                <li>Numero: $numero</li>
              </ul>";
    }
?>