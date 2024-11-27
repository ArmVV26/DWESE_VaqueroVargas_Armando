<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dia Semana</title>
</head>
<body>
    
    <form method="post" action="">
        <label for="dia">¿Qué dia es hoy?: </label>
        <input type="text" id="dia" name="dia">
        <input type="submit" value="Enviar">
    </form>
    
    <?php
        $dia = null;
        if ( isset($_POST['dia']) && $_POST['dia'] !== "") { // Para asegurarse de que no mete un codigo que pete mi codigo
            $dia = (int)htmlspecialchars($_POST['dia']);
        }

        if ( $dia !== null ){
            echo match ($dia) {
                1 => "Hoy es lunes",
                2 => "Hoy es martes",
                3 => "Hoy es miércoles",
                4 => "Hoy es jueves",
                5 => "Hoy es viernes",
                6 => "Hoy es sábado",
                7 => "Hoy es domingo",
                default => "Ese día de la semana no existe",
            };
        }

    ?>
</body>
</html>