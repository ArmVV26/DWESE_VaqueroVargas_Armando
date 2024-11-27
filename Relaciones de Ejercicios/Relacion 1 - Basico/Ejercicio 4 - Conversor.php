<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Euros a Dolares</title>
</head>
<body>
    <?php
    
        $euros = 100;

        $calculoDolares = number_format($euros * 1.11, 2, '.', '');

        echo "$euros son $calculoDolares en Dolares";

    ?>
</body>
</html>