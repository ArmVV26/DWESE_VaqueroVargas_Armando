<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ecuacion de Segundo Grado</title>
</head>
<body>
    <?php

        $a = 6;
        $b = 3;
        $c = -8;

        if ($a == 0) {
            echo "No se puede dividir por 0";
        }else {
            $calculoRaiz = pow($b,2) - 4 * $a * $c;
            $calculoPos = ( -$b + sqrt( pow($b,2) - 4 * $a * $c ) ) / ( 2 * $a);
            $calculoNeg = ( -$b - sqrt( pow($b,2) - 4 * $a * $c ) ) / ( 2 * $a);

            echo "A = $a | B = $b | C = $c | Resultado Positivo = $calculoPos | Resultado Negativo = $calculoNeg <br>";
            print "A = $a | B = $b | C = $c | Resultado Positivo = $calculoPos | Resultado Negativo = $calculoNeg <br>";
            printf( "A = $a | B = $b | C = $c | Resultado Positivo = $calculoPos | Resultado Negativo = $calculoNeg <br>");
        }

    ?>    
</body>
</html>