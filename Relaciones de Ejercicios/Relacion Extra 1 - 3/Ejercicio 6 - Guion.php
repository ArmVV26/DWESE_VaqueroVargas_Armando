<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Guion</title>
</head>
<body>
    <?php
        $texto = "uno-dos-tres-cuatro-cinco";

        $numero = explode("-", $texto);

        echo "<ul>";

        for ($i = 0; $i < count($numero); $i++) {
            echo "<li> $numero[$i] </li>";    
        }
        
        echo "</ul>";
    
    ?>
</body>
</html>