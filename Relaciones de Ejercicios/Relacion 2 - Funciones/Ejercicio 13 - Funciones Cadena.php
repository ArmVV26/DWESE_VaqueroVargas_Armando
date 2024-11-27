<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Funciones de Cadena</title>
</head>
<body>
    <?php

        $cadena = "Hola, mundo. ¿Qué tal estás hoy?";
    
        echo "Cadena original: ". $cadena;

        function docePrimerosCarac($cadena) {
            $auxiliar = "";
            for ($i = 0; $i<12; $i++) {
                $auxiliar = $auxiliar ."". $cadena[$i];
            }
            return $auxiliar;
        }

        echo "<br>Los 12 primeros caracteres: ". docePrimerosCarac($cadena);

        function longitudCadena($cadena) {
            return strlen($cadena);
        }

        echo "<br>La longitud de la cadena es ". longitudCadena($cadena);

        function buscarMundoMayus($cadena) {
            $posicion = -1;
            for ($i = 0; $i<strlen($cadena); $i++) {
                if ($cadena[$i] == "M"){ 
                    $posicion = $i;
                }
            }
            return $posicion;
        }

        echo "<br>Buscamos la posición en la que empieza la palabra Mundo con la M mayúscula: ". buscarMundoMayus($cadena);
    
        function buscarMundoMinus($cadena) {
            $posicion = -1;
            for ($i = 0; $i<strlen($cadena); $i++) {
                if ($cadena[$i] == "m"){ 
                    $posicion = $i;
                }
            }
            return $posicion;
        }

        echo "<br>Buscamos la posición en la que empieza la palabra Mundo con la m minuscula: ". buscarMundoMinus($cadena);

        function convetirMayus($cadena) {
            return strtoupper($cadena);
        }

        echo "<br>Convertir en Mayúsculas: ". convetirMayus($cadena);

        function convetirMayusUTF($cadena) {
            return mb_strtoupper($cadena);
        }

        echo "<br>Convertir en Mayúsculas con UTF-8: ". convetirMayusUTF($cadena);

        function convertirMinus($cadena) {
            return strtolower($cadena);
        }

        echo "<br>Convertir en Minúscula: ". convertirMinus($cadena);

        function devolverPunto($cadena) {
            $posicion = -1;

            for ($i = 0; $i<strlen($cadena); $i++) {
                if ($cadena[$i] == ".") {
                    $posicion = $i;
                }
            }

            $auxiliar = "";

            for ($i = $posicion; $i<strlen($cadena); $i++) {
                $auxiliar = $auxiliar ."". $cadena[$i];
            }

            return $auxiliar;

            /* Otra opcion
                $punto = strrchr($cadena, '.');
                return $punto ? $punto : '';
            */
            /* Otra opcion
                preg_match('/\.[^.]*$/', $cadena, $resultado);
                return $resultado ? $resultado[0] : '';
            */
            /* Otra opcion
                return strrpos($cadena, '.') !== false ? '.' . end(explode('.', $cadena)) : '';
            */
        }

        echo "<br>Devuelve a partir del punto (incluido): ". devolverPunto($cadena);

        function cadenaAlReves($cadena) {
            return strrev($cadena);
        }

        echo "<br>La cadena al revés: ". cadenaAlReves($cadena);
    ?>
</body>
</html>