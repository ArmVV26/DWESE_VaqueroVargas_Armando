<?php
      
    $nombre = $apellidos = $correo = $telefono = $empleo = $lenguaje = $url = null;

    $megErrorNom = $megErrorApe = $megErrorMail = $megErrorTel = 
    $megErrorEmpleo = $megErrorLeng = $megErrorURL = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // NOMBRE
        if (!empty($_POST['nombre'])) {

            $nombre = htmlspecialchars($_POST['nombre']);

            if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]+$/", $nombre)){
                
                $megErrorNom = "Error - El nombre tiene que ser valido";
            }
        }else {
            $megErrorNom = "Error - Tienes que introducir un nombre";
        }
        
        // APELLIDOS
        if (!empty($_POST['apellidos'])) {

            $apellidos = htmlspecialchars($_POST['apellidos']);

            if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]+$/", $apellidos)){

                $megErrorApe = "Error - Los apellidos tienen que ser valido";
            }
        }else {
            $megErrorApe = "Error - Tiene que introducir unos apellidos";
       }

       // CORREO
        if (!empty($_POST['correo'])) {
            
            $correo = htmlspecialchars($_POST['correo']);

            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {

                $megErrorMail = "Error - El correo tiene que ser valido";
            }
        }else {
            $megErrorMail = "Error - Tiene que introducir un correo";
       }

       // CORREO
        if (!empty($_POST['telefono'])) {
            
            $telefono = intval($_POST['telefono']);

            if (!preg_match("/^[0-9]{9}$/", $telefono)) {

                $megErrorTel = "Error - El telefono tiene que ser valido";
            }
        }else {
            $megErrorTel = "Error - Tiene que introducir un telefono";
        }

        // EMPLEO
        if (!empty($_POST['empleo'])) {
            
            $empleo = htmlspecialchars($_POST['empleo']);
        }else {
            $megErrorEmpleo = "Error - Tiene que introducir un empleo";
        }

        // LENGUAJE
        if (!empty($_POST['lenguaje'])) {

            $lenguaje = ($_POST['lenguaje']);
        }else {
            $megErrorLeng = "Error - Tiene que introducir un lenguaje";
        }

        // URL
        if (!empty($_POST['url'])) {

            $url = htmlspecialchars($_POST['url']);
            
            if (!filter_var($url, FILTER_VALIDATE_URL)) {

                $megErrorURL = "Error - La URL tiene que ser valida";
            }
        }else {
            $megErrorURL = "Error - Tiene que introducir una URL";
        }
    }

    if ($nombre !== null && $apellidos !== null && $correo !== null &&
        $telefono !== null && $empleo !== null && $lenguaje !== null && $url !== null &&
        $megErrorNom == "" && $megErrorApe == "" && $megErrorMail == "" &&
        $megErrorTel == "" && $megErrorEmpleo == "" && $megErrorLeng == "" && $megErrorURL == "") {

        echo "<h2>Formulario Validado Correctamente</h2>";
        echo "<p>Nombre: $nombre | Apellidos: $apellidos | Correo: $correo <br>
                 Telefono = $telefono | Empleo = $empleo | URL = $url </p>";
        print_r($lenguaje);
    }
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Validacion 2</title>
</head>
<body style="font-family: Verdana;">
    <header>
      <h1>Formulario de Validacion 2</h1>
    </header>

    <main>
        <form action="" method="post" enctype="multipart/form-data">

            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre">
            <b style="color:red;"><?php echo $megErrorNom; ?></b><br><br>

            <label for="apellidos">Apellidos: </label>
            <input type="text" id="apellidos" name="apellidos">
            <b style="color:red;"><?php echo $megErrorApe; ?></b><br><br>

            <label for="correo">Correo: </label>
            <input type="text" id="correo" name="correo">
            <b style="color:red;"><?php echo $megErrorMail; ?></b><br><br>

            <label for="telefono">Telefono: </label>
            <input type="number" id="telefono" name="telefono">
            <b style="color:red;"><?php echo $megErrorTel; ?></b><br><br>

            <label for="empleo">Empleo Actual: </label>
                <input type="radio" id="op1" name="empleo" value="Sin empleo">
                <label for="op1">Sin empleo</label>

                <input type="radio" id="op2" name="empleo" value="Media jornada">
                <label for="op2">Media jornada</label>

                <input type="radio" id="op3" name="empleo" value="Tiempo completo">
                <label for="op3">Tiempo completo</label>
            <b style="color:red;"><?php echo $megErrorEmpleo; ?></b><br><br>
            
            
            <label for="lenguaje">Lenguaje que domina: </label>
                <input type="checkbox" id="opcion1" name="lenguaje[]" value="Phyton">
                <label for="opcion1">Phyton</label>

                <input type="checkbox" id="opcion2" name="lenguaje[]" value="PHP">
                <label for="opcion2">PHP</label>

                <input type="checkbox" id="opcion3" name="lenguaje[]" value="JavaScript">
                <label for="opcion3">JavaScript</label>

                <input type="checkbox" id="opcion4" name="lenguaje[]" value="Java">
                <label for="opcion4">Java</label>

                <input type="checkbox" id="opcion5" name="lenguaje[]" value="C++">
                <label for="opcion5">C++</label>
            <b style="color:red;"><?php echo $megErrorLeng; ?></b><br><br>

            <label for="url">URL: </label>
            <input type="url" id="url" name="url">
            <b style="color:red;"><?php echo $megErrorURL; ?></b><br><br>

            <input type="submit" formmethod="post" value="Validar">
        </form>
    </main>
      
</body>
</html>