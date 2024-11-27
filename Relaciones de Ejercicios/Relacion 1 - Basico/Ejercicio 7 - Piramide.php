<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Piramide</title>
</head>
<body>
    <?php
        /* Solucion 1
        $espacio = 8;
        $x = 0;

        for ( $i = 0; $i<10; $i++) {
            if ( $i == 0 || $x == 2) {
                echo  str_repeat("&nbsp", $espacio) . "" . str_repeat("*", $i+1) . "<br>";
                $x = 0;
                $espacio -= 2;
            }
            $x++;
        }
        */
        /* Solucion 2 */
        
        $niveles = 10;

        for ($i = 1; $i <= $niveles; $i++) {
            // Espacios
            for ($x = $niveles - $i; $x > 0; $x--) {
                echo "&nbsp;&nbsp";
            }
            // Asteriscos
            for  ($y = 0; $y < (2*$i -1); $y++ ){
                echo "*";
            }
            echo "<br>";
        }

    ?>
</body>
</html>