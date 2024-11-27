<?php
      
    $nombre = null;
    $telefono = null;
    $correo = null;

    $megErrorTel = "";
    $megErrorMail = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if ( !empty($_POST['nombre']) && 
             !empty($_POST['telefono']) && 
             !empty($_POST['correo']) ) {

            /*
                Para validar uso Filter_var($valor, OPCION).
                    En el email uso FILTER_VALIDATE_EMAIL.
                    En el telefono uso FILTER_VALIDATE_INT, y ademas
                        le doy los valores minimo y maximo.
            */    
            if (filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)){
                
                $correo = htmlspecialchars($_POST['correo']);
            }else{

                $megErrorMail = "Error - Correo introducido incorrecto";
            }
            
            if (filter_var($_POST['telefono'], FILTER_VALIDATE_INT, 
                    array("options" => array("min_range" => 100000000,
                    "max_range" => 999999999)))) {
                
                $telefono = intval($_POST['telefono']);                
            }else{

                $megErrorTel = "Error - Telefono introducido incorrecto (9 digitos)";
            }

            $nombre = htmlspecialchars($_POST['nombre']);
        }
    }

    if ($nombre !== null && $telefono !== null && $correo !== null) {

        echo "<h2>Formulario Validado Correctamente</h2>";
        echo "<p>Nombre: $nombre | Telefono: $telefono | Correo: $correo</p>";

    }
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Validacion</title>
</head>
<body style="font-family: Verdana;">
    <header>
      <h1>Formulario de Validacion</h1>
    </header>

    <main>
        <form action="" method="post" enctype="multipart/form-data">

            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre"><br><br>

            <label for="telefono">Telefono: </label>
            <input type="number" id="telefono" name="telefono">
            <b style="color:red;"><?php echo $megErrorTel; ?></b><br><br>

            <label for="correo">Correo: </label>
            <input type="text" id="correo" name="correo">
            <b style="color:red;"><?php echo $megErrorMail; ?></b><br><br>

            <input type="submit" formmethod="post" value="Comprobar">
        </form>
    </main>
      
</body>
</html>