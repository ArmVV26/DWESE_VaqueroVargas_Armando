<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>Formulario de Acceso</title>
  </head>
  <body style="font-family: Verdana;">
    <header>
      <h1>Formulario de Acceso</h1>
    </header>

    <main>
        <form action="" method="post" enctype="multipart/form-data">

            <label for="usuario">Usuario: </label>
            <input type="text" id="usuario" name="usuario"><br><br>

            <label for="pass">Contraseña: </label>
            <input type="text" id="pass" name="pass"><br><br>

            <input type="submit" formmethod="post" value="Entrar">
        </form>
    </main>

    <?php
      
      $usuario = null;
      $pass = null;

      if ($_SERVER["REQUEST_METHOD"] == "POST") {

          if (!empty($_POST['usuario']) &&
              !empty($_POST['pass'])) {

              $usuario = htmlspecialchars($_POST['usuario']);
              $pass = htmlspecialchars($_POST['pass']);
          }
      }

      if ($usuario !== null && $pass !== null) {

        if ($usuario == "usuario" && $pass == "1234") {

          // El header se encarga de redirigir a una web 
          header("Location: ../Formulario-Inicial/Formulario-Inicial.html");
        
        }else{
          echo "<p style='color:red;'>Error al introducir el usuario o la contraseña</p>";
        }
      }
      
    ?>

  </body>
</html>
