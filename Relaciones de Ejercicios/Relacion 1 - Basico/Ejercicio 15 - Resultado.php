<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>
<body>
    <?php

        $numUno = null;
        $numDos = null;
        $operacion = null;

        if (empty($_GET['numUno']) || empty($_GET['numDos']) || empty($_GET['operacion'])){
            echo "Error en la ejecucion de la operacion, intentelo otra vez";
        }else{

            $numUno = $_GET['numUno'];
            $numDos = $_GET['numDos'];
            $operacion = $_GET['operacion'];

            switch($operacion){
                case "Sumar":
                    echo "La suma es: " . $numUno . " + " . $numDos . " = " . ($numUno + $numDos);
                    break;

                case "Restar":
                    echo "La resta es: " . $numUno . " - " . $numDos . " = " . ($numUno - $numDos);
                    break;
                
                case "Multiplicar":
                    echo "La multiplicacion es: " . $numUno . " x " . $numDos . " = " . ($numUno * $numDos);
                    break;
                
                case "Dividir":
                    echo "La division es: " . $numUno . " / " . $numDos . " = " . ($numUno / $numDos);
                    break;
            }
        }


    ?>
</body>
</html>