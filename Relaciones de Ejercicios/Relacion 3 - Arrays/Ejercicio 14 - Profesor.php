<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio Profesor</title>
</head>
<body>
    <?php
        /*
            Dado un array de numeros enteros, se debe verificar si un numero especifico esta presente en el array y, ademas, contar
            cuantos elementos hay en dicho array. Debes utuilizar las funciones in_array() para realizar la busqueda y count() para
            contar el numero de elementos. El programa debe devolver si el numero existe o no, y la cantidad total de elementos.

            Ejemplo: El array contiene los numeros [10,20,30,40,50]. Se debe comprobar si el numero 30 esta presente y cuantos elementos
            hay en total en la array.
        */

        $array = array(10,20,30,40,50,60,70,80);

        if (in_array(50,$array)){
            echo "El array tiene el numero 50";
        }else{
            echo "El array no tiene el numero 50";
        }

        echo "<br> Su tamaño es de ". count($array);
    
    ?>
</body>
</html>