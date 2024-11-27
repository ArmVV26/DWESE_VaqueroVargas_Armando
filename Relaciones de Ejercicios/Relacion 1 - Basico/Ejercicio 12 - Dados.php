<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dados</title>
</head>
<body>
    <?php

        $dadoUno = rand(1, 6);
        $dadoDos = rand(1, 6);

        if ($dadoUno == $dadoDos) {
            echo "Dado Uno (" . $dadoUno . ") y Dado Dos (" . $dadoDos . ") son iguales"; 
        }elseif ($dadoUno > $dadoDos) {
            echo "Dado Uno (" . $dadoUno . ") es mayor que Dado Dos (" . $dadoDos . ")";
        }else{
            echo "Dado Dos (" . $dadoDos . ") es mayor que Dado Uno (" . $dadoUno . ")";
        }

    ?>
</body>
</html>