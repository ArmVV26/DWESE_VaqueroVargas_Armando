<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Archivos</title>
</head>
<body>
    <form method="post" action="">
        <label for="fichero">Indica un nombre de un fichero: </label>
        <input type="text" id="fichero" name="fichero">
        
        <input type="submit" value="Enviar">
    </form>
    
    <?php
        include 'cadena.php';

        $fichero = null;

        if (isset($_POST['fichero']) && !empty($_POST['fichero'])) {
            $fichero = htmlspecialchars($_POST['fichero']);
        }
        if ($fichero !== 0){
            
            $extension = calcula_extension($fichero);
            $tipo = tipo_fichero($extension);
            
            echo "<br> El fichero '$fichero' es de tipo '$tipo'";
        }
    ?>
</body>
</html>