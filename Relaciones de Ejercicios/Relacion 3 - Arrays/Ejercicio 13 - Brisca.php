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
        function crearArray(&$cartas){
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
            Funcion que baraja las cartas
        */
        function barajar(&$cartas) {

            for($i = 0; $i<count($cartas); $i++) {
                $posA = rand(0,count($cartas)-1);
                $posB = rand(0,count($cartas)-1);

                if($posA !== $posB) {
                    $auxiliar = $cartas[$posA];
                    $cartas[$posA] = $cartas[$posB];
                    $cartas[$posB] = $auxiliar;
                }
            }
        }

        /*
            Funcion que añade a los jugadores cartas aleatorias y las elimina de cartas (la baraja)
        */
        function rellenarJugadores(&$jugadores, &$cartas){

            $numJugadores = 2;
            $numCartas = 10;

            for($i = 0; $i<$numJugadores; $i++) {

                for($x = 0; $x<$numCartas; $x++) {

                    $pos = rand(0,count($cartas)-1);

                    $jugadores["Jugador ".$i+1][] = $cartas[$pos];

                    // Borro el valor de la posicion del array cartas y vuelvo a reindexar los valores del array
                    unset($cartas[$pos]);
                    $cartas = array_values($cartas);
                }
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

        crearArray($cartas);

        echo "<h1>Baraja ordenada</h1>";
        mostrarCartas($cartas); //Mostrar las cartas antes de barajar
        echo "<br>El total es: ". contarCartas($cartas);
        
        // 2º - Barajar la baraja
        // barajar($cartas);

        shuffle($cartas);

        echo "<br><h1>Baraja barajada</h1>";
        mostrarCartas($cartas); //Mostrar las cartas despues de barajar

        // 3º - Crear a los jugadores, asignarle las cartas, quitarlas de la baraja y calcular resultado
        $jugadores = [];

        rellenarJugadores($jugadores, $cartas);

        echo "<br><h1>Cartas de los Jugadores</h1>";
        $y = 1;
        foreach($jugadores as $valor) {
            echo "Jugador $y: ";
            mostrarCartas($valor);
            echo "<br>El resultado es: ". contarCartas($jugadores["Jugador ".$y]) ."<br><br>";
            $y++;
        }

        // 4º - Jugada

    ?>
</body>
</html>