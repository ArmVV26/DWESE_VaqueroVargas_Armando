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
        $y = 0;

        for ( $i = 0; $i<10; $i++) {
            if ( $i == 0 ) {
                echo  str_repeat("&nbsp", $espacio) . "" . str_repeat("*", $i+1) . "<br>";
                $espacio -= 2;
            }elseif ( $i == 8 ) {
                echo  str_repeat("&nbsp", $espacio) . "" . str_repeat("*", $i+1) . "<br>";
            }elseif ( $x == 2 ) {
                echo  str_repeat("&nbsp", $espacio) . "" . str_repeat("*", 1)
                      . "" . str_repeat("&nbsp", $y+1) . "" . str_repeat("*", 1) . "<br>";
                $x = 0;
                $espacio -= 2;
                $y += 4;
            }
            $x++;
        }*/

        /* Solucion 2 */

        $niveles = 10;

        for ($i = 1; $i <= $niveles; $i++) {
            // Espacios
            for ($x = 1; $x <= $niveles -$i; $x++) {
                echo "&nbsp;&nbsp";
            }
            // Asteriscos
            for  ($y = 1; $y <= $i; $y++ ){
                if ($y == 1 || $y == $i || $i == $niveles) {
                    echo "*&nbsp;&nbsp;";
                }else {
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                }
            }
            echo "<br>";
        }

    ?>
</body>
</html>