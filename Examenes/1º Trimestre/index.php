<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>Formulario de Acceso</title>
    <link rel="stylesheet" href="basico.css">
  </head>
  <body>
    <?php  
        
        // Incluyo el contenido del archivo metodos.php
        include 'metodos.php';
        // Variables que tomaran el valor del formulario
        $user = $password = null;

        // Compruebo que el formulario se hace con POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Compruebo que las variables no estan vacias. Si no estan vacias relleno las variables de antes
            if (!empty($_POST['user']) &&
                !empty($_POST['password'])) {

                // Las variables del formmulario las añado a las variables que he generado yo
                $user = htmlspecialchars($_POST['user']);
                $password = htmlspecialchars($_POST['password']);
            }
        }

        // Compruebo que no esta vacio el formulario
        if ($user !== null && $password !== null) {

            // Recogo los posibles errores que me pueda dar (como no encontrar el usuario)
            try{
                // Genero los arrays de metodos
                rellenaUsuarios();
                rellenaProductos(5);
                rellenaPedidos();
                
                // Compruebo que el usuario y contraseña que se ha introducido en el formulario existen
                if (isset($usuarios[$user]) && $usuarios[$user]['contrasenia'] == $password) {
                    
                    // Muestro los pedidos del usuario indicado
                    echo "<p>Pedidos para el DNI: $user</p>";
                    mostrarPedidos($user);
                     // Aqui genero el enlace para ir al formulario otra vez
                    echo "<br>";
                    echo "<a href='.'>[ Volver al Formulario ]</a>";
                }else{
                    // Aqui le indico que el usuario existe o no, y ademas si la contraseña es valida o no
                    $user = isset($usuarios[$user]) ? "" : "Error - El usuario no es valido";
                    $password = "Error - La contraseña no es valida";
                    ?>
                    <header>
                    <h1>Formulario de Acceso</h1>
                    </header>

                    <main>
                        <form action="" method="post" enctype="multipart/form-data">

                            <label for="user">Usuario: </label>
                            <input type="text" id="user" name="user">
                            <span><?php echo $user ?></span><br><br>

                            <label for="password">Contraseña: </label>
                            <input type="pass" id="password" name="password">
                            <span><?php echo $password ?></span><br><br>

                            <input type="submit" formmethod="post" value="Entrar">
                        </form>
                    </main>
                    <?php
                }
                
            }catch (Exception $e) { 
                // De esta manera muestro el error
                echo "<span> ". $e->getMessage() ."</span>";
            }

        }else {
            
    ?>
    <header>
      <h1>Formulario de Acceso</h1>
    </header>

    <main>
        <form action="" method="post" enctype="multipart/form-data">

            <label for="user">Usuario: </label>
            <input type="text" id="user" name="user">
            <!-- De esta manera muestro el valor de Error de Usuario -->
            <span><?php $user ?></span><br><br>

            <label for="password">Contraseña: </label>
            <input type="pass" id="password" name="password">
            <!-- De esta manera muestro el valor de Error de Contraseña -->
            <span><?php $password ?></span><br><br>

            <input type="submit" formmethod="post" value="Entrar">
        </form>
    </main>
    <?php
        }
    ?>

  </body>
</html>
