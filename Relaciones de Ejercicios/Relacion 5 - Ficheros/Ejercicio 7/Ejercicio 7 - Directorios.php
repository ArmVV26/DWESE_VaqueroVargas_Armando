<?php
    $directorio = "/carpeta";

    if (is_dir($directorio)) {

        move_uploaded_file("index.txt", $directorio."index.txt");
        
        if ($contenido = opendir($directorio)) {

            while(($cont = readdir($contenido)) !== false) {
                echo "Nombre Archivo = $cont | Tipo Archivo = ". filetype($directorio, $cont). "\n";
            }

            closedir($directorio);
        }
    }else {

        mkdir($directorio);
    }
?>