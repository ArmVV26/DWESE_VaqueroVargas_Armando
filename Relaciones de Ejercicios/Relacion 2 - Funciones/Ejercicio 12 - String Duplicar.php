<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>String Duplicar</title>
</head>
<body>
    <form method="post" action="">
        <label for="cadena">Indica una cadena: </label>
        <input type="text" id="cadena" name="cadena">
        <input type="submit" value="Enviar">
    </form>
    
    <?php
        $cadena = null;

        if (isset($_POST['cadena']) && !empty($_POST['cadena'])) {
            $cadena = htmlspecialchars($_POST['cadena']);
        }
   
        function duplicarCadena($cadena) {
            $auxiliar = $cadena;
            $resultado = "";

            for ($i = 0; $i<strlen($cadena); $i++) {
                
                if ($cadena[$i] == ""){
                    $resultado = $resultado ." ";
                }else{
                    $resultado = $resultado ."". $cadena[$i] ."". $auxiliar[$i];
                }
            }

            return $resultado;
        }

        if (!$cadena == "") {
            echo "<br> Original: ". $cadena;
            echo "<br> Duplicada: ". duplicarCadena($cadena);
        }
    ?>
</body>
</html>