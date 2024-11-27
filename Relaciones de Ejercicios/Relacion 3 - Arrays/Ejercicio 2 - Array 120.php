<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Array 120</title>
</head>
<body>
    <?php
        $array = array();

        while (count($array) !== 120) {
            $numAlt = rand(1,100);
            $array[] = $numAlt;
        }

        foreach($array as $num) {
            echo "<br> $num";
        }
    
    ?>
</body>
</html>