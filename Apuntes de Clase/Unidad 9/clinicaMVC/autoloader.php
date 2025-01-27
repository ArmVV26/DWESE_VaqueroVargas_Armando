<?php
    spl_autoload_register(function ($clase) {

        $archivo = __DIR__ . '/' . str_replace('\\', '/', $clase) . '.php';
        
        if (file_exists($archivo)) {
            require $archivo;
        }else {
            die ("Error: No se pudo cargar la clase $clase. Archivo no encontrado: $archivo");
        }
    })
?>