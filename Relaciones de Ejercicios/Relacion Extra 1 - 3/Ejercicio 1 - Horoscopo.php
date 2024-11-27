<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Horoscopo</title>
</head>
<body>
    <form method="post" action="">
        <label for="dia">Indica un dia valido: </label>
        <input type="number" id="dia" name="dia"><br><br>
        
        <label for="mes">Indica un mes valido: </label>
        <input type="number" id="mes" name="mes">
        <input type="submit" value="Enviar">
    </form>
    
    <?php
        $dia = null;
        $mes = null;

        if (isset($_POST['dia']) && !empty($_POST['dia']) && isset($_POST['mes']) && !empty($_POST['mes'])) {
            $dia = intval($_POST['dia']);
            $mes = intval($_POST['mes']);
        }

        function horoscopo($dia, $mes){
            return match (true) {
                ($mes == 1 && $dia >= 20) || ($mes == 2 && $dia <= 18) => "Acuario",
                ($mes == 2 && $dia >= 19) || ($mes == 3 && $dia <= 20) => "Piscis",
                ($mes == 3 && $dia >= 21) || ($mes == 4 && $dia <= 19) => "Aries",
                ($mes == 4 && $dia >= 20) || ($mes == 5 && $dia <= 20) => "Tauro",
                ($mes == 5 && $dia >= 21) || ($mes == 6 && $dia <= 20) => "Géminis",
                ($mes == 6 && $dia >= 21) || ($mes == 7 && $dia <= 22) => "Cáncer",
                ($mes == 7 && $dia >= 23) || ($mes == 8 && $dia <= 22) => "Leo",
                ($mes == 8 && $dia >= 23) || ($mes == 9 && $dia <= 22) => "Virgo",
                ($mes == 9 && $dia >= 23) || ($mes == 10 && $dia <= 22) => "Libra",
                ($mes == 10 && $dia >= 23) || ($mes == 11 && $dia <= 21) => "Escorpio",
                ($mes == 11 && $dia >= 22) || ($mes == 12 && $dia <= 21) => "Sagitario",
                ($mes == 12 && $dia >= 22) || ($mes == 1 && $dia <= 19) => "Capricornio",
                default => "Fecha no válida",
            };
        }

        if($dia !== 0 && $mes !== 0){
            echo "<br><b>". horoscopo($dia, $mes) ."</b>";
        }

    ?>
</body>
</html>