<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Array Andalucia</title>
</head>
<body>
    <?php
        $provincias = ["Granada", "Cadiz", "Sevilla", "Malaga", "Huelva", "Jaen", "Almeria", "Cordoba"];

        $borrar = rand(0, count($provincias)-1);

        echo $borrar;
        unset($provincias[$borrar]);

        var_dump($provincias);
    ?>
</body>
</html>