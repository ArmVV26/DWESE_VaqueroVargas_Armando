<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>¿Que dia es hoy?</title>
</head>
<body>
    <?php
        function fecha(){
            date_default_timezone_set('Europe/Madrid');
            setlocale(LC_TIME, 'es_VE.UTF-8','esp');
            echo strftime('%A, %d de %B de %G');
        }

        fecha();
    
    ?>
</body>
</html>