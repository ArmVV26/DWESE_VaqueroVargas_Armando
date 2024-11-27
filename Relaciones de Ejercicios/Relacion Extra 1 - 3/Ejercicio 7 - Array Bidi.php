<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Array Bidi</title>
</head>
<body>
    <?php

        $array = [];

        // Genero numeros de 100 a 999 y los intercambio de posicion
        $numeros = range(100,999);
        shuffle($numeros);
        
        /*
            Genero el array bidimensional, añadiendo al array los valores del 0 al 8 y elimino
                estos en el array numeros para que no se repitan.
        */
        for ($i = 0; $i < 6; $i++){
            for ($x = 0; $x < 9; $x++){
                $array[$i][$x] = $numeros[$x];

                unset($numeros[$x]);
                $numeros = array_values($numeros);
            }
        }

        // Busco el valor minimo
        $posMin = ["fila" => -1, "columna" => -1];
        $minimo = 999;

        foreach ($array as $fila => $num) {
            for ($i = 0; $i < count($num); $i++) {
                if ($minimo > $num[$i]) {
                    $minimo = $num[$i];
                    $posMin = ["fila" => $fila, "columna" => $i];
                }
            }
        }

        /*
            Para comprobar si un numero es diagonal al minimo, tengo que restar la fila
                del minimo y del numero en cuestio, y las columnas. Si el resultado 
                da valores iguales querrar decir que son iguales
        */
        function compruebaDiagonal($fila, $columna, $posMin){
            return abs($fila - $posMin["fila"]) == abs($columna - $posMin["columna"]);
        }

        // Genero una tabla para mostrar los datos. Aqui cambio de color el color Minimo
        echo "<table border='1' style='border-collapse: collapse; text-align: center;'>";

        foreach ($array as $key => $num) {
            echo "<tr>";
            
            for ($i = 0; $i < 9; $i++) {
                $colorFondo = "white";
                $colorLetra = "black";
                
                if ($num[$i] == $minimo) {
                    $colorFondo = "royalblue";
                    $colorLetra = "white";

                }elseif(compruebaDiagonal($key, $i, $posMin)){
                    $colorFondo = "lime";
                    $colorLetra = "white";
                }

                echo "<td style='width: 50px; height: 50px; background-color: $colorFondo; color: $colorLetra; font-weight: bold'>$num[$i]</td>";
            }

            echo "</tr>";
        }

        echo "</table>";
    
    ?>
</body>
</html>