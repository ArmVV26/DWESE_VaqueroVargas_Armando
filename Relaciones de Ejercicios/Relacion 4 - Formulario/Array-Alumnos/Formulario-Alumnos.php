<?php

    include "funciones.php";

    // Recoger datos del formulario
    $nombre = null;
    $nota = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!empty($_POST['nombre']) &&
            !empty($_POST['nota'])) {

            $nombre = htmlspecialchars($_POST['nombre']);
            $nota = intval($_POST['nota']);
        }
    }

    // Crear array Alumnos
    $alumnos = crearArray();

    // Añadir alumno si hay, mostrar el array Alumnos y mostrar la media
    if($nombre !== null && $nota !== null) {

        agregarAlumno($alumnos, $nombre, $nota);
        mostrarArray($alumnos);

        echo "<p>La media de los alumnos es: ", calcularMedia($alumnos) ,"</p>";
    
    }else{

        mostrarArray($alumnos);
    
        echo "<p>La media de los alumnos es: ", calcularMedia($alumnos) ,"</p>";
    }
?>    

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Alumnos</title>
</head>
<body style="font-family: Verdana;">
<header>
    <h1>Formulario de Alumnos</h1>
    </header>

    <main>
        <form action="" method="post" enctype="multipart/form-data">

            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre"><br><br>

            <label for="nota">Nota: </label>
            <input type="text" id="nota" name="nota"><br><br>

            <input type="submit" formmethod="post" value="Añadir">
        </form>
    </main>
</body>
</html>