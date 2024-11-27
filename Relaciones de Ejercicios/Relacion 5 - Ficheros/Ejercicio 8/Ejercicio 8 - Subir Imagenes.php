<?php

    $directorio = "images";

    if (!is_dir($directorio)) {
        mkdir($directorio, 0755, true);
    }

    if ($_SERVER['REQUEST METHOD'] == 'POST' && isset($_FILES['imagen'])) {

        $nombreImagen = htmlspecialchars($_FILES['imagen']['name']);

        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio."/".$nombreImagen)) {
            
            echo "La imagen se ha subido correctamente";
        }else{

            echo "Error al subiar la imagen";
        }
    }

    if ($abrir = opendir($directorio)) {

        echo "<h2> Imagenes del directorio</h2>";
        while (false !== ($leer = readdir($abrir))) {

            if ($leer != "." && $leer != "..") {
                
                echo "<img src='$directorio/$leer' alt='$leer' style='width:100px; height:auto; margin:5px;'><br>"; 
            }
        }
        closedir($abrir);
    }

?>
<h1>Selecciona una imagen para subir:</h1>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="imagen" accept="image/*" required>
    <input type="submit" value="Subir imagen">
</form>