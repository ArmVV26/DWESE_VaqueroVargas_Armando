<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Rango 2 Numeros Impares</title>
</head>
<body>
    <?php
    
        $numUno = null;
        $numDos = null;

        if (empty($_GET['numUno']) || empty($_GET['numDos'])){
            echo "Error en la ejecucion, inserta numeros";

        }else{

            $numUno = $_GET['numUno'];
            $numDos = $_GET['numDos'];
        
            if ($numUno > $numDos) {
                echo "El primer numero no puede ser mayor que el otro";

            }else {

                for ($i = $numUno+1; $i<$numDos; $i++){
                    if (($i%2) != 0) {
                        echo $i . "<br>";
                    }
                }

            }
        }
    ?>
</body>
</html>