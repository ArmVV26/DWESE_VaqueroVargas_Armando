<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Brisca</title>
</head>
<body>
    <?php
        /*
            Funcion que me crear el array añadiendo [palo, nº]
        */
        function crearBaraja(&$cartas){
            for($i = 0; $i < 4; $i++) {
                
                for($x = 0; $x < 12; $x++) {
                    
                    switch($i){
                        case 0:
                            $cartas[] = ["oros", $x+1];
                            break;
                        case 1:
                            $cartas[] = ["copas", $x+1];
                            break;
                        case 2:
                            $cartas[] = ["bastos", $x+1];
                            break;
                        case 3: 
                            $cartas[] = ["espadas", $x+1];
                            break;
                    }
                }
            }
        }

        /*
            Funcion que muestra todas las imagenes de las cartas
        */
        function mostrarCartas($cartas){

            foreach($cartas as $valor){
                $src = $valor[0] ."_". $valor[1] .".jpg";
                echo "<img src='imagenes/". $src ."'/>";
            }
        }

        /*
            Funcion que devuleve el resultado final
        */
        function contarCartas($mano) {

            $puntuacion = [1 => 11, 3 => 10, 12 => 4, 11 => 3, 10 => 2];
            
            $resultado = 0;

            foreach($mano as $valor) {

                $keys = array_keys($puntuacion);

                if(in_array($valor[1], $keys)) {
                    $resultado += $puntuacion[$valor[1]];
                }
            }

            return $resultado;
        }

        // 1º - Crear la baraja
        $cartas = [];

        crearBaraja($cartas);

        echo "<h1>Baraja ordenada</h1>";
        mostrarCartas($cartas); //Mostrar las cartas antes de barajar
        echo "<br>El total es: ". contarCartas($cartas);
        
        // 2º - Barajar la baraja
        // barajar($cartas);

        shuffle($cartas);

        echo "<br><h1>Baraja barajada</h1>";
        mostrarCartas($cartas); //Mostrar las cartas despues de barajar

        // 3º - Mostrar 10 cartas y que muestra el total de puntos que genera
        function rellenarMano($cartas, &$mano){

            $numCartas = 10;

            for($i = 0; $i<$numCartas; $i++) {
                
                $posAlt = rand(0,count($cartas));
                $mano[] = $cartas[$posAlt];
                
                unset($cartas[$posAlt]);
                $cartas = array_values($cartas);
            }
        }

        $mano = [];

        rellenarMano($cartas, $mano);

        echo "<br><h1>Cartas Jugadas</h1>";
        
        mostrarCartas($mano);

        echo "<br>El resultado es: ". contarCartas($mano);

    ?>
</body>
</html>