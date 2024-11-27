<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla Multiplicar</title>
</head>
<body>
    <form method="post" action="">
        <label for="numero">Indicame un número: </label>
        <input type="text" id="numero" name="numero">
        <input type="submit" value="Enviar">
    </form>
    <?php
        $numero = null;
        if ( isset($_POST['numero']) && $_POST['numero'] !== "") { // Para asegurarse de que no mete un codigo que pete mi codigo
            $numero = (int)htmlspecialchars($_POST['numero']);
        }

        if ( $numero == "" ) {
        }elseif ( $numero == 0){
            echo "No introduzcas una letra o un 0";
        }else{
            for($i = 0; $i<11; $i++ ) {
                $calculo = $numero * $i;
                echo $numero ." x ". $i . " = " . $calculo . "<br>"; 
            }
        }
    ?>


</body>
</html>