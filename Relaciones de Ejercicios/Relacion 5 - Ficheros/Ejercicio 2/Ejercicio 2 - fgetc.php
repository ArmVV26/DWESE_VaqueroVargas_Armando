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
        if (!$fich){
            echo "No se encuentra index.txt<br>";
        }

        while (false !== ($carácter = fgetc($fich))) {
            echo "$carácter ";
        }

        fclose($fich);

    ?>
</body>
</html>