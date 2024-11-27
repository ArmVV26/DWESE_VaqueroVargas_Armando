<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Formulario</title>
</head>
<body style="font-family: Verdana">
    <header>
        <h1>Estos son los datos introducidos</h1>
    </header>

    <main>
    <?php

        /* Esto es otra manera de sanitizar la entrada para que sea mas segura
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $vivienda = filter_input(INPUT_POST, 'vivienda', FILTER_SANITIZE_STRING);
            }        
        */

        $nombre = null;
        $apellidos = null;
        $fechaNac = null;
        $mail = null;
        $lenguajes = null;
        $paginaWeb = null;
        $comentarios = null;
        $pass = null;
        $repitePass = null;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (!empty($_POST['nombre']) &&
                !empty($_POST['apellidos']) && 
                !empty($_POST['fechaNac']) && 
                !empty($_POST['mail']) &&
                !empty($_POST['lenguajes']) && 
                !empty($_POST['paginaWeb']) &&
                !empty($_POST['comentarios']) && 
                !empty($_POST['pass']) &&
                !empty($_POST['pass2'])) {

                $nombre = htmlspecialchars($_POST['nombre']);
                $apellidos = htmlspecialchars($_POST['apellidos']);

                $fechaNac = htmlspecialchars($_POST['fechaNac']);
                
                $mail = htmlspecialchars($_POST['mail']);

                $lenguajes = ($_POST['lenguajes']);

                $paginaWeb = htmlspecialchars($_POST['paginaWeb']);
                $comentarios = htmlspecialchars($_POST['comentarios']);

                $pass = htmlspecialchars($_POST['pass']);
                $repitePass = htmlspecialchars($_POST['pass2']);
            }
        }

        if ($nombre !== null && $apellidos !== null && $fechaNac !== null &&
            $mail !== null && $lenguajes !== null && $paginaWeb !== null &&
            $comentarios !== null && $pass !== null && $repitePass !== null) {

            echo "<ul>";

            echo "<li>Nombre: $nombre</li>";
            echo "<li>Apellidos: $apellidos</li>";
            echo "<li>Fecha de Nacimiento: $fechaNac</li>";
            echo "<li>Correo Electronico: $mail</li>";

            $programacion = "";
            foreach ($lenguajes as $key => $valor) {
                if ($key == 0) {
                    $programacion = "$valor";
                }else{
                    $programacion = "$valor, $programacion";
                }
            }
            echo "<li>Lenguajes de Programacion: $programacion</li>";
            
            echo "<li>Crear Paginas Web Estaticas: $paginaWeb</li>";
            echo "<li>Comentarios: $comentarios</li>";
            echo "<li>Contraseña 1: $pass</li>";
            echo "<li>Contraseña 2: $repitePass</li>";

            echo "</ul>";
            
        }else{
            echo "<p>No se han introducido datos suficientes</p>";
        }

        echo "<a href='./Formulario-Inicial.html'>[ Volver ]</a>";
    ?>
    </main>
</body>
</html>