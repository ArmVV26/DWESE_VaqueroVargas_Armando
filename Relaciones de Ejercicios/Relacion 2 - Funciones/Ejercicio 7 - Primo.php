<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Primo</title>
</head>
<body>
    <?php
    
        function esPrimo($num) {
            $contador = 0;

            for($i = 1; $i<=$num; $i++) {
                if(($num % $i) == 0) {
                    $contador++;
                }
            }

            if($contador == 2){
                return "es Primo";
            }else{
                return "no es Primo";
            }
        }

        $numero = 97;

        echo "El numero ". $numero ." ". esPrimo($numero);
    
    ?>
</body>
</html>