<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
</head>
<body>
    <form method="get" action="">
        <label for="numUno">Indica un numero: </label>
        <input type="number" id="numUno" name="numUno"><br><br>

        <label for="numDos">Indica un numero: </label>
        <input type="number" id="numDos" name="numDos"><br><br>

        <label for="operacion">Indica una operacion: </label>
        <input type="text" id="operacion" name="operacion"><br><br>

        <input type="submit" value="Enviar"><br><br><br>
    </form>

    <?php

        $numUno = null;
        $numDos = null;
        $operacion = null;

        if (isset($_GET['numUno']) && isset($_GET['numDos']) && isset($_GET['operacion'])) {

            $numUno = intval($_GET['numUno']);
            $numDos = intval($_GET['numDos']);
            $operacion = urlencode($_GET['operacion']);
        }

        if ($numUno !== null && $numDos !== null){
            calculadora($numUno, $numDos, $operacion);
        }else{
            echo "Introduce un numero";
        }

        function sumar ($num1, $num2) {
            return $num1 + $num2;
        }
        
        function restar ($num1, $num2) {
            return $num1 - $num2;
        }

        function multiplicar ($num1, $num2) {
            return $num1 * $num2;
        }

        function dividir ($num1, $num2) {
            if ($num2 == 0) {
                return "No se puede dividir entre 0";
            }else{
                return $num1 / $num2;    
            }
        }

        function calculadora ($num1, $num2, $operacion) {
            switch ($operacion){
                case "+":
                    echo "El resultado es: ", sumar($num1, $num2);
                    break;
                case "-":
                    echo "El resultado es: ", restar($num1, $num2);
                    break;
                case "*":
                    echo "El resultado es: ", multiplicar($num1, $num2);
                    break;
                case "/":
                    echo "El resultado es: ", dividir($num1, $num2);
                    break;
                default:
                    echo "Operacion no valida"; 
            }
        }

    ?>    
</body>
</html>