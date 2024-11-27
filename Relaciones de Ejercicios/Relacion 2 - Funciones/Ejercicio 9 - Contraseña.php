<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contraseña</title>
</head>
<body>
    <form method="post" action="">
        <label for="contra">Indica una contraseña parar saber si es valida o no: </label>
        <input type="text" id="contra" name="contra">
        <input type="submit" value="Enviar">
    </form>
    
    <?php
        $contra = null;

        if (isset($_POST['contra']) && !empty($_POST['contra'])) {
            $contra = htmlspecialchars($_POST['contra']);
        }
    
        function comprobarContra($password) {

            if (strlen($password) > 6 && strlen($password) < 15) {
                
                $num = 0; $mayus = 0; $minus = 0; $alfnum = 0;

                for($i = 0; $i<strlen($password); $i++) {
                    
                    if(ctype_digit($password[$i])) {
                        $num++;
                    }elseif(!ctype_alnum($password[$i])) {
                        $alfnum++;
                    }elseif(ctype_lower($password[$i])) {
                        $minus++;
                    }elseif(!ctype_lower($password[$i])) {
                        $mayus++;
                    }
                }

                if ($num > 0 && $mayus > 0 && $minus > 0 && $alfnum > 0) {
                    echo "La contraseña es valida";
                }else{
                    echo "La contraseña no es valida <br>";
                    echo "Los requerimientos minimos son: una minuscula, una mayuscula, un numero y un caracter no alfanumerico";
                }
            }else{
                echo "La contraseña no es valida por que tiene menos de 6 o mas de 15 caracteres";
            }
        }

        if (!$contra == null) {
            comprobarContra($contra);
        }    
    ?>
</body>
</html>