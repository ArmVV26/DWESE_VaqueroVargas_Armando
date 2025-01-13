<?php

    // Inicio las sesiones
    session_start();

    $_SESSION['errorIdS'] = $_SESSION['errorIdS'] ?? 0;
    $_SESSION['tiempoUltInt'] = $_SESSION['tiempoUltInt'] ?? null;

    // Se establece la conexion
    require_once './config/config.php';
    require_once './lib/conexion.php';

    $conexion = new Conexion();
    $pdo = $conexion->getPDO();

    // Formulario de Inicio de Sesion
    $login = "";
    if (isset($_POST['login'])) {

        // Recojo los valores que paso por el formulario de Registro
        $correo = $_POST['email'];
        $password = $_POST['pass'];

        /*
            0. Compruebo que se introducen valores en el formulario.
            1. Compruebo que el correo esta dentro de la base de datos.
            
        */

        if ($correo && $password) {

            $comprobarEmail ="
                SELECT id, password_hash
                FROM usuarios
                WHERE email = :correo;
            ";
            $stmt = $pdo->prepare($comprobarEmail);
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();

            if (!$stmt->rowCount() == 1) {
                $login = "ERROR - El correo tiene que ser valido";
                $_SESSION['errorIdS']++;
            } else {
                
                $user = $stmt->fetch();
                if (password_verify($password, $user['password_hash'])) {
                    
                    // Uso la sesion para que en bienvenido.php me muestre el correo.
                    $_SESSION['email'] = $correo;
                    header("Location: php/bienvenido.php");
                }else{
                    // Guardo el tiempo en el que se ha intentado iniciar sesion.
                    $_SESSION['tiempoUltInt'] = time();
                    // Sumo uno a los errores.
                    $_SESSION['errorIdS']++;
                }
            }
        }
    }

    // Reiniciar la varible
    // $_SESSION['errorIdS'] = 0;

    // Hacer que el usuario no haga mas de 5 intentos durante 5 segundos.
    echo $_SESSION['errorIdS'];
    $bloqueado = "";
    if ($_SESSION['errorIdS'] >= 3) {
        
        echo "<br>". $_SESSION['tiempoUltInt'] ."<br>";
        echo time() ."<br>";
        echo $_SESSION['tiempoUltInt'] - time();
        if ($_SESSION['tiempoUltInt'] && $_SESSION['tiempoUltInt'] > time()) {
            $tiempo_restante = $_SESSION['tiempoUltInt'] - time();
            $login = "Bloqueado durante ". $tiempo_restante ." segundos";
            $bloqueado = "disabled";
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Formulario de Inico de Sesion</title>
</head>
<body>
    
    <h2>Formulario de Incio de Sesion</h2>

    <form action="" method="POST" enctype="multipart/form-data">

        <label for="email">Correo: </label>
        <input type="mail" id="email" name="email" <?php echo $bloqueado ?>><br><br>
        
        <label for="pass">Contraseña: </label>
        <input type="password" id="pass" name="pass" <?php echo $bloqueado ?>><br><br>

        <input type="submit" formmethod="post" name="login" value="Iniciar Sesion" <?php echo $bloqueado ?>>
    </form>
    
    <p class="error rojo"><?php echo $login; ?></p><br>

    <a class="boton" href="php/registro.php">Formulario de Registro</a>

</body>
</html>