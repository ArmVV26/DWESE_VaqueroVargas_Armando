<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Numero Cuadrado</title>
</head>
<body>
    <?php
    
        $fin = false;
        $numero = 0;

        while (!$fin) {
            echo $numero . " * " . $numero . " = " . pow($numero,2) . "<br>";
            
            if ($numero == 40) {
                $fin = true;
            } 
        
            $numero++;
        }
    
    ?>
</body>
</html>