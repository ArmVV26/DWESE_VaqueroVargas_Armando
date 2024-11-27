<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Excepciones</title>
</head>
<body>
    <?php
        $numero = 4;
        $divisor = 0;

        echo "<br>";

        try{
            if ($divisor == 0)
                throw new Exception("Division por cero");
        
            $resultado = $numero / $divisor;
            echo "El resultado es: " . $resultado;
        }
        catch(Exception $a){
            echo "Se ha producido el siguiente error: " . $a->getMessage();
        }
    
    ?>
</body>
</html>