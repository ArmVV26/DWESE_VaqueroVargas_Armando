<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>String Al Reves</title>
</head>
<body>
    <?php

        $cadena = "Me llamo Armando";
        $alreves = "";
        
        for ( $i = strlen($cadena)-1; $i>=0 ; $i-- ) {
            $alreves = $alreves . "" . $cadena[$i];
        }

        echo "Cadena normal: " . $cadena . "<br>";
        echo "Cadena al reves: " . $alreves;
 
    ?>
</body>
</html>