<?php

    // 1º Crear fichero con varias lineas
    $fich = fopen("index.txt", "w");
    if ($fich){
        
        $contenido = "Hola buenos dias\nHola buenas tardes\nHola buenas noches";
        fwrite($fich, $contenido);
        fclose($fich);
        
        echo "<h3>Contenido añadido</h3>";
    
    // 2º Abrir en modo lectura y leer con fgets()
        leerFichero("index.txt");
    }

    function leerFichero($fichero) {
        $fich = fopen($fichero, "r");
        if ($fich){ 
        
            echo "<h2>Leer fichero con fgets()</h2>";
            while (false !== ($carácter = fgets($fich))) {
                echo "$carácter <br>";
            }
            fclose($fich);
        }
    }

    // 3º Escribe dentro de ese fichero texto nuevo
    $fich = fopen("index.txt", "a+");
    if ($fich){
        
        $contenido = "\nBUENOS DIAS";
        fwrite($fich, $contenido);
        fclose($fich);

        echo "<h3>Contenido añadido</h3>";
    }

    // 4º Copiar ese fichero en otro
    if (copy("index.txt", "index-copia.txt")) {

        echo "<h3>Archivo copiado</h3>";
        leerFichero("index-copia.txt");
    }

    // 5ª Renombrar
    if (rename("index-copia.txt", "cosas.txt")) {
     
        echo "<h3>Archivo renombrado</h3>";
    }

    // 6º Eliminar este archivo
    if (unlink("cosas.txt")) {

        echo "<h3>Archivo eliminado</h3>";
    }

?>