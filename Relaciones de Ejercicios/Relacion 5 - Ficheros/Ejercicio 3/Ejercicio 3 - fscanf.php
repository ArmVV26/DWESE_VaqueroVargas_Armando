<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leer Fichero Caracter a Caracter</title>
</head>
<body>
    <?php
        $fich = fopen("index.txt", "r");
        if ($fich === False){
            echo "No se encuentra el fichero o no se pudo leer<br>";
        }else{
            while( !feof($fich) ){
                $num = fscanf($fich, "%d %d %d %d");
                echo "$num[0] $num[1] $num[2] $num[3] <br>";
            }
        }
        
        rewind($fich);
        while( !feof($fich) ){
                $num = fscanf($fich, "%d %d %d %d", $num1, $num2, $num3, $num4 );
                echo "$num1 $num2 $num3 $num4 <br>";
            }
        fclose($fich);

    ?>
</body>
</html>