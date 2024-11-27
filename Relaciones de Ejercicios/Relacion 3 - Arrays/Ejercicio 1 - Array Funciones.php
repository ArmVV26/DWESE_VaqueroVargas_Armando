<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Array Funciones</title>
</head>
<body>
    <form method="get" action="">
        <label for="numero">Indica un numero: </label>
        <input type="number" id="numero" name="numero">
        <input type="submit" value="Enviar">
    </form>
    
    <?php
        $numero = null;

        if (isset($_GET['numero']) && !empty($_GET['numero'])) {
            $numero = intval($_GET['numero']);
        }
    
        $array = [10,21,13,43,25,16,74,28];
        
        // Mostrar el array con un Foreach
        function mostrarArray($array) {
            foreach($array as $num){
                echo $num ." ";
            }
        }

        echo "<br> Array Desordenado: ";
        mostrarArray($array);

        // Ordeno el array
        echo "<br> Array Ordenado: ";
        rsort($array);
        mostrarArray($array);

        // Mostrar la longitud del array
        echo "<br>El array tiene un tamaño de ". count($array) ;

        // Buscar un elemento dentro del array
        function buscarNumero($array, $num) {

            $posicion = -1;
            for($i = 0; $i<count($array); $i++) {
                if($num == $array[$i]){
                    $posicion = $i;
                }
            }

            if ($posicion !== -1) {
                echo "<br> El numero $num esta en la posicion $posicion";
            }else{
                echo "<br> El numero $num no esta en el array";
            }
        }

        if (!$numero == ""){
            buscarNumero($array, $numero);
        }
    ?>
</body>
</html>