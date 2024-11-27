<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Funcion String</title>
</head>
<body>
    <?php
        
        function comprobarCadena($cadena) {
            if (gettype($cadena) == "string") {
                if ($cadena == ""){
                    echo "Este es el relleno porque estaba vacia";
                }else{
                    echo "La cadena no esta vacia, su contenido en mayusculas es: ", strtoupper($cadena);
                }
            }else{
                echo $cadena , " - No es una cadena de caracteres";
            }
        }

        $frase = "Hola buenos dias";

        comprobarCadena($frase);
    
    ?>
</body>
</html>