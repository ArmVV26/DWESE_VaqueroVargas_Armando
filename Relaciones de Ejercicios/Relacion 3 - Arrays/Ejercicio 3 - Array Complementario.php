<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Array Complementario</title>
</head>
<body>
    <?php
        $arrayUno = array();
        $numAlt = rand(1,15);

        // Relleno el array con numeros 0 y 1
        for($i = 0; $i<$numAlt; $i++) {
            $numBin = rand(0,1);
            $arrayUno[] = $numBin;
        }

        // Muestro el array
        function mostrarArray($array) {
            foreach($array as $num) {
                echo "$num ";
            }
        }

        echo "A: ";
        mostrarArray($arrayUno);

        // Creo el array complementario y lo relleno
        $arrayDos = array();

        for($i = 0; $i<$numAlt; $i++) {
            if($arrayUno[$i] == 0) {
                $arrayDos[] = 1;
            }else {
                $arrayDos[] = 0;
            }
        }

        echo "<br> B: ";
        mostrarArray($arrayDos);
    
    ?>
</body>
</html>