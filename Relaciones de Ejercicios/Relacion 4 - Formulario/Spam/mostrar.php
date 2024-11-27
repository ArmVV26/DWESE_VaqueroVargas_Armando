<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>Formulario de Spam</title>
  </head>
  <body style="font-family: Verdana;">
    <?php
      
      $nombre = null;
      $telefono = null;
      $correo = null;

      if ($_SERVER["REQUEST_METHOD"] == "POST") {

          if (!empty($_POST['nombre']) &&
              !empty($_POST['telefono']) &&
              !empty($_POST['correo'])) {

              $nombre = htmlspecialchars($_POST['nombre']);
              $telefono = htmlspecialchars($_POST['telefono']);
              $correo = htmlspecialchars($_POST['correo']);
          }
      }

      if ($nombre !== null && $telefono !== null && $correo !== null) {
        echo "<p> ¡Buenos días, $nombre! <br>
               Te voy a enviar spam a $correo y te llamaré de madrugada a $telefono <br>
               Enviado desde un Iphone </p>";
      }else{
        echo "<p>No se han introducido datos suficientes</p>";
      }
      
    ?>

  </body>
</html>
