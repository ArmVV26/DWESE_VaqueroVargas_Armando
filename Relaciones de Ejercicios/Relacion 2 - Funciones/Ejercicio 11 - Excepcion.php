<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Excepcion</title>
</head>
<body>
    <form method="post" action="">
        <label for="numero">Indica un numero para hacer su factorial: </label>
        <input type="number" id="numero" name="numero">
        <input type="submit" value="Enviar">
    </form>
    
    <?php
        $numero = null;

        if (isset($_POST['numero']) && !empty($_POST['numero'])) {
            $numero = intval($_POST['numero']);
        }

        function factorial($num){

            if ($num < 0){
                throw new InvalidArgumentException('No se puede introducir un numero negativo ('. $num .')');

            }elseif ($num == 0) {
                return 1;
            }else{
                return $num * factorial($num - 1);
            }
        
        }

        try{
            if ($numero !== 0) {
                echo 'El factorial de '.$numero.' es: '.factorial($numero);
            }
        }catch(InvalidArgumentException $e){
            echo "Error: ". $e->getMessage();
        }

    ?>
</body>
</html>