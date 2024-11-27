<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Arrays Varios</title>
</head>
<body>
    <?php
        $arrayUno = array();
        $arrayDos = array();
        $arrayTres = array();

        for($i = 0; $i<20; $i++) {
            $numAlt = rand(0,100);
            $arrayUno[] = $numAlt;
            $arrayDos[] = $numAlt**2;
            $arrayTres[] = $numAlt**3;


        }

        function mostrarArray($array) {
            foreach($array as $num) {
                echo "$num ";
            }
        }

        echo "Original: ";
        mostrarArray($arrayUno);

        echo "<br>Cuadrado: ";
        mostrarArray($arrayDos);

        echo "<br>Cubo: ";
        mostrarArray($arrayTres);
    
    ?>
</body>
</html>