<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Matricula</title>
</head>
<body>
    <form method="post" action="">
        <label for="matricula">Indica un matricula parar saber si es valida o no: </label>
        <input type="text" id="matricula" name="matricula">
        <input type="submit" value="Enviar">
    </form>
    
    <?php
        $matricula = null;

        if (isset($_POST['matricula']) && !empty($_POST['matricula'])) {
            $matricula = htmlspecialchars($_POST['matricula']);
        }

        function comprobarMatricula($matricula) {
            
            if (strlen($matricula) == 7) { // Comprueba si el string es de 7 caracteres

                $auxiliar = "";                                     // Guardo en la variable auxiliar los 5 primeros valores que
                for ($i = 0; $i<5; $i++) {                          // deberian ser 5 numeros
                    $auxiliar = $auxiliar ."". $matricula[$i];
                }

                if (ctype_digit($auxiliar)) {                       // Compruebo que esos caracteres son todo numeros
                    
                    if (!ctype_lower($matricula[5]) && !ctype_lower($matricula[6])) { // Y compruebo que los ultimos son mayusculas
                        echo "La matricula es valida";
                    }else{
                        echo "La matricula es invalida, porque uno o dos de las ultimas letras estan en minuscula";
                    }
                }else{
                    echo "La matricula es invalida, porque en alguno de los 5 primeros caracteres no hay un numero";
                }
            }else{
                echo "La matricula es invalida, porque no tiene 7 caracteres";
            }
        }

        echo "<br><br>";
        comprobarMatricula($matricula);

    ?>
</body>
</html>