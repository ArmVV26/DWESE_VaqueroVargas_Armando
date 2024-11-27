<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>3 varaibles</title>
</head>
<body>
    <?php
        $pais = "España";
        $habitantes = 47000000;
        $continente = "Europa";

        echo "Pais: ", $pais, " | Tipo de Dato: ", gettype($pais) ,"<br>";
        echo "Habitantes: ", $habitantes, " | Tipo de Dato: ", gettype($habitantes), "<br>";
        echo "Continente: ", $continente, " | Tipo de Dato: ", gettype($continente); 

    ?>
</body>
</html>