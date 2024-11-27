<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Radio de una Esfera</title>
</head>
<body>
    <?php

        $radio = 20;

        $calVolumen = number_format((4 / 3 * pi() * pow($radio, 3)), 2, '.', '');
        $calLongitud = number_format((2 * pi() * $radio), 2, '.', '');
        $calSuperficie = number_format((4 * pi() * $radio * 2), 2, '.', '');

        printf("Con printf: <br>");

        printf("El Volumen de una Esfera con radio $radio, es: $calVolumen <br>");
        printf("La Longitud de una Esfera con radio $radio, es: $calLongitud <br>");
        printf("La Superficie de una Esfera con radio $radio, es: $calSuperficie <br>");

        printf("<br> Con round: <br>");
        echo "El Volumen de una Esfera con radio $radio, es: " . round($calVolumen) . "<br>";
        echo "La Longitud de una Esfera con radio $radio, es: " . round($calLongitud) . "<br>";
        echo "La Superficie de una Esfera con radio $radio, es: " . round($calSuperficie) . "<br>";

    ?>
</body>
</html>