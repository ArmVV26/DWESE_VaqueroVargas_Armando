<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Numero Pares</title>
</head>
<body>
    <?php

        for ($i = 1; $i<=100; $i++) {
            if (($i % 2) == 0) {
                echo $i . "<br>";
            }
        }

    ?>
</body>
</html>