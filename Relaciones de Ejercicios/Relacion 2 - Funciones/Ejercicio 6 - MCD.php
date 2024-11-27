<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MCD</title>
</head>
<body>
    <?php
        function maxComunDiv($num1, $num2) {
           while ($num2 != 0) {
                $x = $num1 % $num2;
                $num1 = $num2;
                $num2 = $x;
           }
           return $num1;
        }
        
        $numero1 = 90;
        $numero2 = 63;
        
        echo "El Maximo Comun Divisor entre ". $numero1 ." y ". $numero2 ." es: ". maxComunDiv($numero1, $numero2);
    
    ?>
</body>
</html>