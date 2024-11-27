<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Rotar Array</title>
</head>
<body>
    <?php
        function mostrarArray($array) {
            $result = "";
            for($i = 0; $i<15; $i++) {
                $result = $result ."[$i] -  $array[$i] <br>";
            }
            return $result;
        }

        // Creo y relleno el array con numeros aleatorios entre 0 y 20
        $numerosAlt = array();

        for($i = 0; $i<15; $i++) {
            $numAlt = rand(1,20);
            $numerosAlt[] = $numAlt;
        }

        echo "Array Numeros: <br> ". mostrarArray($numerosAlt);

        // Cambio las posiciones
        $auxiliar = array_pop($numerosAlt);
        array_unshift($numerosAlt, $auxiliar);

        echo "<br> Array Numeros: <br> ". mostrarArray($numerosAlt);
    
    ?>
</body>
</html>