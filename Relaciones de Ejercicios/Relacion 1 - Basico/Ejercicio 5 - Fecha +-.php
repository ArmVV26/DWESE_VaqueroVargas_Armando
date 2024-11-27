<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sumar o Restar Fecha</title>
</head>
<body>
    <?php

        $hoy = date('d-m-Y');
        
        $ayer = date('d-m-Y', strtotime('-1 day'));

        $mañana = date('d-m-Y', strtotime('+1 day'));

        echo " La fecha de hoy es: ". $hoy ."<br>";
        echo " La fecha de ayer es: ". $ayer ."<br>";
        echo " La fecha de mañana es: ". $mañana ."<br>";

    ?>
</body>
</html>