<?php

    // Inicio las sesiones
    session_start();

    $_SESSION['errorIdS'] = $_SESSION['errorIdS'] ?? 0;
    $_SESSION['bloqueo'] = $_SESSION['bloqueo'] ?? null;

    // Se establece la conexion
    require_once './config/config.php';
    require_once './lib/conexion.php';

    $conexion = new Conexion();
    $pdo = $conexion->getPDO();

    $login = "";
    $bloqueado = false;

    // Verifico si el usuario esta bloqueado.
    if ($_SESSION['bloqueo'] ) {
        
        if ($_SESSION['bloqueo'] > time()) {
        
            $tiempo_restante = $_SESSION['bloqueo'] - time();
            $bloqueado = true;
            // $login = "Has superado el numero de intentos, espera $tiempo_restante segundos";
        } else {
            $_SESSION['bloqueo'] = null;
        }
    }

    // Formulario de Inicio de Sesion
    if (isset($_POST['login'])) {

        // Recojo los valores que paso por el formulario de Registro
        $correo = $_POST['email'];
        $password = $_POST['pass'];

        /*
            0. Compruebo que se introducen valores en el formulario.
            1. Compruebo que el correo esta dentro de la base de datos.
            2. Compruebo que la contraseña es correcta.
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
                    $_SESSION['errorIdS'] = 0; // Los errores se reinician.
                    $_SESSION['bloqueo'] = null; // Se reinicia el bloqueo.
                    header("Location: php/bienvenido.php");
                }else{
                    // Sumo uno a los errores.
                    $_SESSION['errorIdS']++;
                }
            }
        }
    }

    // $_SESSION['errorIdS'] = 0; // Los errores se reinician.

    // Compruebo el numero de intentos Bloqueo.
    echo $_SESSION['errorIdS'];
    if ($_SESSION['errorIdS'] >= 3) {

        $tiempo_bloqueado = ($_SESSION['errorIdS'] - 2) * 5; 
        $_SESSION['bloqueo'] = time() + $tiempo_bloqueado;
        
        $bloqueado = true;
        $login = "Has superado el numero de intentos, espera $tiempo_bloqueado segundos";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Formulario de Inico de Sesion</title>
    <script>
        // JavaScript para la cuenta regresiva y desbloqueo automático
        let tiempoRestante = <?php echo $tiempo_restante; ?>;
        const formInputs = document.querySelectorAll("input[type='mail'], input[type='password'], input[type='submit']");
        const timerElement = document.getElementById("timer");

        if (tiempoRestante > 0) {
            formInputs.forEach(input => input.disabled = true);

            const interval = setInterval(() => {
                if (tiempoRestante <= 0) {
                    clearInterval(interval);
                    formInputs.forEach(input => input.disabled = false);
                    timerElement.textContent = "";
                } else {
                    timerElement.textContent = `Tiempo restante: ${tiempoRestante} segundos`;
                    tiempoRestante--;
                }
            }, 1000);
        }
    </script>
</head>
<body>
    
    <h2>Formulario de Incio de Sesion</h2>

    <form action="" method="POST" enctype="multipart/form-data">

        <label for="email">Correo: </label>
        <input type="mail" id="email" name="email"><br><br>
        
        <label for="pass">Contraseña: </label>
        <input type="password" id="pass" name="pass" ><br><br>

        <input type="submit" formmethod="post" name="login" value="Iniciar Sesion">
    </form>
    
    <p class="error rojo"><?php echo $login; ?></p><br>

    <a class="boton" href="php/registro.php">Formulario de Registro</a>

</body>
</html>