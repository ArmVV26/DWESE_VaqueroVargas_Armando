<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
      <h1>Formulario de Incio de Sesion</h1>
    </header>

    <main>
        <form action="" method="get" enctype="multipart/form-data">

            <label for="usuario">Usuario: </label>
            <input type="text" id="usuario" name="usuario"><br><br>

            <label for="pass">Contraseña: </label>
            <input type="password" id="pass" name="pass"><br><br>

            <input type="submit" formmethod="get" value="Entrar"><br><br>
        </form>
    </main>

    <?php

        include 'datos.php';

        $usuario = null;
        $pass = null;
  
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
  
            if (!empty($_GET['usuario'])){

                $usuario = htmlspecialchars($_GET['usuario']);
                $pass = htmlspecialchars($_GET['pass']);
            }
        }

        if ($usuario !== null && $pass !== null) {

            try{
                if (login($usuario, $pass)){

                    escribeUsuario($usuario);

                    echo "<br><br>";
                    escribePrestamos($usuario);
                }else{
                    throw new Exception("ERROR DEL SISTEMA: Usuario no encontrado");
                }

            }catch (Exception $e) {
                echo "<b>", $e->getMessage() ,"</b>";
            }
        }
    
    ?>

</body>
</html>