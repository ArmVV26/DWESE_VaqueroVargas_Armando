<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Longitud de la linea</title>
    <style>
        .linea {
            height: 5px;
            background-color: black;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <form method="get" action="">
        <label for="longitud">Indicame una longitud (entre 10 y 1000): </label>
        <input type="text" id="longitud" name="longitud">
        <input type="submit" value="Enviar">
    </form>
    
    <?php
        $longitud = null;

        // Comprueba que el valor sea correcto y valido
        if (isset($_GET['longitud']) && !empty($_GET['longitud'])) {
            $longitud = intval($_GET['longitud']);
            
            // Esto lo hago para que la longitud se mantenga siempre en el rango de valores
            if ($longitud < 10) {
                $longitud = 10;
            } elseif ($longitud > 1000) {
                $longitud = 1000;
            }
        }

        // Muestro un texto indicando la longitud de la linea
        echo "<h1>Linea de ${longitud} pixeles de largo";
        // Creo un div que sera la linea. Le doy la longitud aqui, pero el estilo se lo doy en la etiqueta style de arriba
        echo '<div style="width:'.$longitud.'px;" class="linea"></div>';

    ?>
</body>
</html>
