<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pruebas</title>
</head>
<body>
    <?php

        $multiplicador = function($a,$b) {
            return $a * $b;
        };
        
        $numeros = range (1,10); // Rellena el array de 0 a 10
        $numeros2 = range (1,10);
        
        $lista = array_map($multiplicador, $numeros, $numeros2);

        echo implode(" ", $lista);

    ?>
</body>
</html>