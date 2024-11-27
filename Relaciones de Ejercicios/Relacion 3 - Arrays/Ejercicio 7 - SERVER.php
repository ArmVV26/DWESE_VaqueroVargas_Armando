<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Array Server</title>
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
        echo "<table>";
        foreach($_SERVER as $key => $valor){
            echo "<tr>";
            echo "<td>$key</td>";
            echo "<td>$valor</td>";
            echo "</tr>";
        }
        echo "</table>";
    
    ?>
</body>
</html>