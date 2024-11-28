<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Edad</title>
</head>
<body style="font-family: Verdana;">
    <header>
      <h1>Formulario de Fecha de Nacimiento</h1>
    </header>

    <main>
        <form action="" method="post" enctype="multipart/form-data">

            <label for="edad">Edad: </label>
            <input type="date" id="edad" name="edad"><br><br>

            <input type="submit" formmethod="post" value="Entrar">
        </form>
    </main>

    <?php
      
        $edad = null;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (!empty($_POST['edad'])) {

                $edad = htmlspecialchars($_POST['edad']);
            }
        }

        date_default_timezone_set('UTC');
        $fechaActual = date("Y-m-d");
        
        if ($edad !== null) {
            
            $edad = explode("-", $edad);
            $fechaActual = explode("-", $fechaActual);

            $edadActual = $fechaActual[0] - $edad[0];

            if ($edad[1] > $fechaActual[1]) {
                $edadActual -= 1;
            }

            if ($edadActual > 18 && $edadActual < 85) {
                echo "<p>Puedes pasar dentro (tiene $edadActual años)</p>";
            }elseif ($edadActual > 85) {
                echo "<p>Eres demasiado mayor para entrar en el local (tiene $edadActual años)</p>";
            }else{
                echo "<p>Vete a casa a dormir (tiene $edadActual años)</p>";
            }

        }
      
    ?>
    
</body>
</html>