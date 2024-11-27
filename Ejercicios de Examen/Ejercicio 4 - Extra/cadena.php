<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Archivos</title>
</head>
<body>
    <?php
        function calcula_extension($cadena){
            return strtoupper(substr(strstr($cadena, ".", false),1));
        }

        function tipo_fichero($extension){
            return match ($extension) {
                "PDF" => "Documento Adobe PDF",
                "TXT" => "Documento de texto",
                "HTML" => "Documento HTML", 
                "HTM"  => "Documento HTML",
                "PPT" => "Presentación Microsoft Powerpoint",
                "DOC" => "Documento Microsoft Word",
                "GIF" => "Imagen GIF",
                "JPG" => "Imagen JPG",
                "ZIP" => "Archivo comprimido ZIP",
                default => "Archivo ". $extension
            };
        }
    ?>
</body>
</html>