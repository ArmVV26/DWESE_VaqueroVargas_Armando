<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Inmobiliaria</title>
    <link rel="stylesheet" href="../css/basico.css">
</head>
<body >
    <header>
        <h1 style="color: blue;">Insercción de vivienda</h1>
    </header>

    <main>
        <p>Estos son los datos introducidos: </p>
    <?php

        /*
            Si los datos llegan aqui, quiere decir que los campos requeridos direccion, precio y tamaño 
                (aunque los campos vivienda, zona y dormitorios serian tambien requeridos pero son campos
                que no se pueden dejar en blanco) tienen contenido, por lo que la vivienda se podria mostrar

            Primero declaro los valores que no son del formulario y despues los que si. Uso tambien el operador
                de coalescencia (??)
        */

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            
            $idVivienda = ($_GET['idVivienda']) ?? null;
            $rutasFotos = ($_GET['rutasFotos']) ?? null;
            $errores = ($_GET['errores']) ?? null;

            $vivienda = htmlspecialchars($_GET['vivienda']) ?? null;
            $zona = htmlspecialchars($_GET['zona']) ?? null;
            $direccion = htmlspecialchars($_GET['direccion']) ?? null;
            $dormitorios = intval($_GET['dormitorios']) ?? 0;
            $precio = intval($_GET['precio']) ?? 0;
            $tamaño = intval($_GET['tamaño']) ?? 0;
            $extras = ($_GET['extras']) ?? null;
            $observaciones = htmlspecialchars($_GET['observaciones']) ?? 'Ninguna Observacion';
            
            //Mostrar errores de las fotos
            print_r($errores);

            echo "<ul>";

            echo "<li>Id: $idVivienda</li>";
            echo "<li>Tipo: $vivienda</li>";
            echo "<li>Zona: $zona</li>";
            echo "<li>Dirección: $direccion</li>";
            echo "<li>Número de dormitorios: $dormitorios</li>";
            echo "<li>Precio: $precio</li>";
            echo "<li>Tamaño: $tamaño</li>";
            
            //Recorre el array extras y muestra las opciones que se han seleccionado
            $extrasCadena = "Ninguno";
            if ($extras !== null) {
                foreach ($extras as $key => $valor) {
                    if ($key == 0) {
                        $extrasCadena = "$valor";
                    }else{
                        $extrasCadena = "$valor, $extrasCadena";
                    }
                }
            }  

           echo "<li>Extras: $extrasCadena</li>";

           // Recorro el array de las rutas de las fotos y las muestro con un enlace
            if (count($rutasFotos) > 0) {
                echo "<li>Fotos: <br>";

                foreach ($rutasFotos as $foto) {
                    echo "<a href='$foto' target='_blank'>$foto</a><br>";
                }
                echo "</li>";
            }

            echo "<li>Observaciones: $observaciones</li>";

            echo "</ul>";

        }else{
            echo "<p>No se han introducido los datos suficientes para registrar la vivienda</p>";
        }

        echo "<a href='../index.php'>[ Insertar otra Vivienda ]</a>";
    ?>
    </main>
</body>
</html>