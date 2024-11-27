<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de Multiplicar</title>
    <style>
        table,td{
            border:1px solid;
        }
        td{
            width: 6rem;
        }
    </style>
</head>
<body>
    <?php
        $valor = 0;

        echo "<table>";

        for ($i = 0; $i<=10; $i++) {
            
            echo "<tr>";
            for ($x = 1; $x<11; $x++) {

                $calculo = $valor * $x;
                echo "<td>" . $x . " x " . $valor . " = " . $calculo . "</td>";
            }

            echo "</tr>";
            $valor++;
        }

        echo "</table>";
    
    ?>
</body>
</html>