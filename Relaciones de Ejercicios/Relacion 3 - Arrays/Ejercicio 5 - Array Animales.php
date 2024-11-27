<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Array Animales</title>
</head>
<body>
    <?php
        function mostrarArray($array) {
            $cadena = "";
            foreach($array as $animal) {
                $cadena = $cadena ." ". $animal;
            }
            return $cadena;
        }

        // Creacion del array de animales
        $animales = array();

        for($i = 0; $i<rand(20,30); $i++) {
            $animales[] = mb_chr(rand(128000, 128060), "UTF-8");
        }

        echo "Array de Animales: ". mostrarArray($animales);
        
        // Borrar un animal aleatorio.
        /*
            Genero el animal hasta que este si este dentro del array animales.
            Cuando lo genera correctamente busco en cada posiciond el array
                donde este el animal a eliminar y lo elimino.
            Por ultimo, muestro el array sin el animal indicado.
        */
        echo "<br>";

        $fin = false;
        do{
            $animalEliminar = mb_chr(rand(128000, 128060), "UTF-8");

            if(in_array($animalEliminar, $animales)) {

                echo "Animal a eliminar: $animalEliminar";

                for($i = 0; $i<count($animales); $i++) {
                    if($animales[$i] == $animalEliminar) {
                        unset($animales[$i]);         
                    }
                }
                
                echo "<br>";
                echo "Array de Animales (sin $animalEliminar): ". mostrarArray($animales);

                echo "<br> Quedan ". count($animales) ." animales";

                $fin = true;
            }
        }while(!$fin);
    
    ?>
</body>
</html>