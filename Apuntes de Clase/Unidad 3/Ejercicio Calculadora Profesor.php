<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Tema 3</title>
</head>
<body>
    
    <?php
        function sumar($num1, $num2) {
            return $num1 + $num2;
        }

        function restar($num1, $num2) {
            return $num1 - $num2;
        }

        function multiplicar($num1, $num2) {
            return $num1 * $num2;
        }

        function dividir($num1, $num2) {
            if ($num2 != 0) {
                return $num1 / $num2;
            } else {
                return "Error: División por cero";
            }
        }

        function calculador($num1, $num2, $operacion) {
            switch ($operacion) {
                case '+':
                    return sumar($num1, $num2);
                case '-':
                    return restar($num1, $num2);
                case '*':
                    return multiplicar($num1, $num2);
                case '/':
                    return dividir($num1, $num2);
                default:
                    return "Operación no válida";
            }
        }

        if (isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['operacion'])) {

            $num1 = intval($_GET['num1']);
            $num2 = intval($_GET['num2']);
            /*$num1 = filter_var($_GET['num1'], FILTER_VALIDATE_FLOAT);
            $num2 = filter_var($_GET['num2'], FILTER_VALIDATE_FLOAT);*/
            $operacion = urlencode($_GET['operacion']);
            if($operacion != "+")
                $operacion = urldecode($operacion);            
            
            if ($num1 !== false && $num2 !== false) {

                $resultado = calculador($num1, $num2, $operacion);
                echo "El resultado de la operación es: $resultado";
            } else {
                echo "Error: Los valores proporcionados no son números válidos.";
            }
        } else {
            echo "Error: Faltan parámetros en la URL.";
        }              
    ?>
</body>
</html>