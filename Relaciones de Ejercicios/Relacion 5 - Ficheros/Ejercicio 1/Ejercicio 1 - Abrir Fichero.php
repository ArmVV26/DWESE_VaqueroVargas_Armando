<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abrir Fichero</title>
</head>
<body>
    <?php
        $fich = fopen("index.txt", "r");
        if (!$fich){
            echo "No se encuentra index.txt<br>";
        }else{
            echo "index.txt se abrió con éxito<br>";
        }

        fclose($fich);

        $fich = fopen("index2.txt", "r");
        if (!$fich){
            echo "No se encuentra index2.txt<br>";
        }else{
            echo " index2.txt se abrió con éxito<br>";
        }

        fclose($fich);
    ?>
</body>
</html>