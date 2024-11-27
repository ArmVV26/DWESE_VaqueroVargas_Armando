<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio Profesor</title>
</head>
<body>
    <?php
        /*
            Tienes un array de frutas en desorden y tu tarea es ordenarlas alfabéticamente usando la función sort().
            Después de ordenar el array, debes eliminar un elemento específico, por ejemplo, "naranja", utilizando
            la función unset(). Finalmente, muestra el array resultante después de realizar ambas operaciones.

            Ejemplo: El array contiene las frutas [manzana, naranja, plátano, pera]. Primero debes ordenarlas y 
            luego eliminar "naranja".
        */

        $frutas = array("pera","manzana","uva","melon","fresa","platano");
        print_r($frutas);

        sort($frutas);
        echo "<br>";
        print_r($frutas);
        
        unset($frutas[array_search("pera", $frutas)]);
        echo "<br>";
        print_r($frutas);
    ?>
</body>
</html>