<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de Calcular</title>
    <style>
        table,td{
            border:1px solid;
            text-align: center;
        }
        td{
            width: 5rem;
        }
    </style>
</head>
<body>
    <?php
        
        printf("<h1>TABLA DE LOS 20 PRIMEROS NÚMEROS EN DIFERENTES BASES</h1>");

        printf ("<table>");
        printf ("<tr>
                <th>Decimal</th>
                <th>Octal</th>
                <th>Hexadecimal</th>
              </tr>");
        for ($i = 0; $i<=20; $i++) {
            printf ("<tr> 
                        <td>" . $i . "</td>
                        <td>" . decbin($i) . "</td>  
                        <td>" . octdec($i) . "</td> 
                        <td>" . hexdec($i) . "</td> 
                    </tr>");
                    // format: "%b", value: $i; 
                    // format: "%o", value: $i;
                    // format: "%x", value: $i;
        }
        printf ("</table>");
    
    ?>
</body>
</html>