<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Array Pila</title>
</head>
<body>
    <?php
        /*
            Simula el comportamiento de una pila utilizando arrays en PHP. Primero, inserta un nuevo elemento al final
            del array usando array_push(). Luego, extrae el ultimo elemento de la pila con array_pop(). Finalmente, voleta
            el array usando array_reverse() para mostrar los elementos en orden inverso al original.

            Ejemplo: considera un array de furas [manzana,naranja,pera]. Debes insertar platano, luego extraer la ultima fruta y
            finalmente voltea el array restante.
        */

        $frutas = array("pera","manzana","uva","melon","fresa");
        print_r($frutas);

        array_push($frutas, "platano", "cereza");
        echo "<br>";
        print_r($frutas);

        array_pop($frutas);
        echo "<br>";
        print_r($frutas);

        echo "<br>";
        print_r(array_reverse($frutas));   
    ?>
</body>
</html>