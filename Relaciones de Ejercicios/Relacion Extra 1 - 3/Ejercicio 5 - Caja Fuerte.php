<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Caja Fuerte</title>
</head>
<body>
    <form method="post" action="">
        <label for="numero">Desbloquea la Caja (4 digitos): </label>
        <input type="number" id="numero" name="numero">
        <input type="submit" value="Enviar">
    </form>
    
    <?php
        $numero = null;

        if (isset($_POST['numero']) && !empty($_POST['numero'])) {
            $numero = intval($_POST['numero']);
        }

        $combinacion = 2345;

        if ($numero != 0){
            if ($numero == $combinacion){
                echo "<br><b>Caja abierta satisfactoriamente</b>";
            }else{
                echo "<br>Lo siento no es la combinacion";
            }
        }
    
    ?>
</body>
</html>