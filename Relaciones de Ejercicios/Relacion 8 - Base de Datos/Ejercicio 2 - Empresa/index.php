<?php
    // Inicio las sesiones
    session_start();

    $_SESSION['errorIdS'] = $_SESSION['errorIdS'] ?? 0;
    $_SESSION['ultIdS'] = $_SESSION['ultIdS'] ?? time();

    // Se establece la conexión
    require_once './config/config.php';
    require_once './lib/conexion.php';

    $conexion = new Conexion();
    $pdo = $conexion->getPDO();

    // Variables de control.
    $login = "";
    $bloqueado = "";
    $tiempoBloqueado = 0;

    // Bloqueo de formulario si se han cometido 3 o más errores.
    if ($_SESSION['errorIdS'] >= 0) {
        // Calculamos el tiempo restante para desbloquear el formulario.
        // 5 segundos por cada error a partir del tercero.
        $tiempoRestante = (5 * ($_SESSION['errorIdS'] - 2)) * (time() - $_SESSION['ultIdS'] );
        // Tiempo que esta bloqueado el formulario.
        $tiempoBloqueado = (5 * ($_SESSION['errorIdS'] - 2));
        if ($tiempoRestante > 0) {
            // Bloqueamos el formulario.
            $bloqueado = 'disabled';
            $_SESSION['errorIdS']++;
            $tiempoBloqueado--;
        } else {
            $_SESSION['ultIdS'] = time();
        }
    }

    // Formulario de Inicio de Sesión
    if (isset($_POST['login'])) {
        // Comprobamos si el usuario tiene que esperar para intentar iniciar sesión.  
        if ($tiempoBloqueado > 0) {
            $login = "Por favor, espera $tiempoBloqueado segundos antes de intentar nuevamente.";
        } else {
            // Recojo los valores que paso por el formulario de Inicio de Sesión.
            $correo = $_POST['email'];
            $password = $_POST['pass'];

             /*
                0. Compruebo que se introducen valores en el formulario.
                1. Compruebo que el correo esta dentro de la base de datos.
                2. Compruebo que la contraseña es correcta.
            */
            if ($correo && $password) {
                // Comprobamos si el correo está en la base de datos.
                $comprobarEmail = "
                    SELECT id, password_hash, rol, nombre
                    FROM usuarios
                    WHERE email = :correo;
                ";
                $stmt = $pdo->prepare($comprobarEmail);
                $stmt->bindParam(':correo', $correo);
                $stmt->execute();

                if (!$stmt->rowCount() == 1) {
                    // Si no se encuentra el correo en la base de datos, sumamos un error y guardo el ultimo intento.  
                    $login = "ERROR - El correo tiene que ser válido";
                    $_SESSION['errorIdS']++;
                    $_SESSION['ultIdS'] = time();
                } else {
                    // Si el correo está en la base de datos, comprobamos la contraseña.
                    $user = $stmt->fetch();
                    if (password_verify($password, $user['password_hash'])) {
                        // Si la contraseña es correcta, guardamos el correo en la sesión y reiniciamos los errores.
                        $_SESSION['email'] = $correo;
                        $_SESSION['rol'] = $user['rol'];
                        $_SESSION['nombre'] = $user['nombre'];
                        $_SESSION['errorIdS'] = 0; // Reiniciamos errores al iniciar sesión correctamente.
                        header("Location: php/bienvenido.php");
                    } else {
                        // Si la contraseña no es correcta, sumamos un error y guardo el ultimo intento.
                        $_SESSION['errorIdS']++;
                        $_SESSION['ultIdS'] = time();
                        $login = "ERROR - La contraseña no es correcta";
                    }
                }
            }
        }
    }
    // Reseteo de errores.
    // $_SESSION['errorIdS'] = 0;
    // echo "<br>" . $_SESSION['errorIdS'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Formulario de Inicio de Sesión</title>
    <!-- Script para desbloquear el formulario cuando pase el tiempo. -->
    <script>
        let tiempoRestante = <?php echo $tiempoRestante; ?>;
        if (tiempoRestante > 0) {
            const interval = setInterval(() => {
                tiempoRestante--;
                if (tiempoRestante <= 0) {
                    clearInterval(interval);
                    document.querySelectorAll('input').forEach(input => input.removeAttribute('disabled'));
                }
            }, 1000);
        }
    </script>
</head>
<body>
    <h2>Formulario de Inicio de Sesión</h2>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="email">Correo: </label>
        <input type="mail" id="email" name="email" <?php echo $bloqueado; ?>><br><br>
        
        <label for="pass">Contraseña: </label>
        <input type="password" id="pass" name="pass" <?php echo $bloqueado; ?>><br><br>

        <input type="submit" formmethod="post" name="login" value="Iniciar Sesión" <?php echo $bloqueado; ?>>
    </form>
    
    <p class="error rojo"><?php echo $login; ?></p><br>

    <a class="boton" href="php/registro.php">Formulario de Registro</a>
</body>
</html>
