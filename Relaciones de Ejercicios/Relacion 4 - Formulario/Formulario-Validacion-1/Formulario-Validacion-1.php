<?php
      
    $nombre = null;
    $telefono = null;
    $correo = null;

    $megErrorNom = "";
    $megErrorTel = "";
    $megErrorMail = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!empty($_POST['nombre'])) {

            $nombre = htmlspecialchars($_POST['nombre']);

            // Uso preg_match para validar el nombre
            if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]+$/", $nombre)){
                
                $megErrorNom = "Error - El nombre tiene que ser valido";
            }
        }else {
            $megErrorNom = "Error - Tienes que introducir un nombre";
        }
            
        if (!empty($_POST['telefono'])) {

            $telefono = intval($_POST['telefono']);

            // Uso preg_match para validar el telefono
            if (!preg_match("/^[0-9]{9}$/", $telefono)) {

                $megErrorTel = "Error - El telefono tiene que ser valido";
            }
        }else {
            $megErrorTel = "Error - Tiene que introducir un telefono";
       }

        if (!empty($_POST['correo'])) {
            
            $correo = htmlspecialchars($_POST['correo']);

            // Y para validar el correo uso el filter_var
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {

                $megErrorMail = "Error - El correo tiene que ser valido";
            }
        }else {
            $megErrorMail = "Error - Tiene que introducir un correo";
       }
    }

    if ($nombre !== null && $telefono !== null && $correo !== null &&
        $megErrorNom == "" && $megErrorTel == "" && $megErrorMail == "") {

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
            <input type="text" id="nombre" name="nombre">
            <b style="color:red;"><?php echo $megErrorNom; ?></b><br><br>

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