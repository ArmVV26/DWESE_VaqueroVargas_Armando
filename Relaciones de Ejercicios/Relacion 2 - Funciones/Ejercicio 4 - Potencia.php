<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Potencia</title>
</head>
<body>
    <form method="post" action="">
        <label for="numero">Indica un numero: </label>
        <input type="number" id="numero" name="numero"><br><br>

        <label for="expo">Indica el exponente: </label>
        <input type="number" id="expo" name="expo"><br><br>
        <input type="submit" value="Enviar"><br><br>
    </form>
    
    <?php
        $numero = null;
        $expo = null;

        if (isset($_POST['numero']) && !empty($_POST['numero']) && isset($_POST['expo']) && !empty($_POST['expo'])) {
            $numero = intval($_POST['numero']);
            $expo = intval($_POST['expo']);
        }

        function potencia($num, $expo = 2) {
            return $num**$expo;
        }

        echo  $numero , " elevado a ", $expo , " da como resultado: " , potencia($numero, $expo);
    
    ?>
</body>
</html>