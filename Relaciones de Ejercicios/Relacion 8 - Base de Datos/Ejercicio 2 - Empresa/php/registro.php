<?php
    // Funcion para obtener el ultimo ID disponible
    function obtenerID($pdo) {
        // Obtengo el menor ID disponible
        $obtID = "
            SELECT MIN(user1.id + 1) AS next_id
            FROM usuarios user1 
            LEFT JOIN usuarios user2 
            ON user1.id + 1 = user2.id
            WHERE user2.id IS NULL;
        ";
        /*
            query -> Ejecuta la consulta directamente, sin verificar nada.
                    Al no usarse ningun dato externo se podria usar en este caso.
            
            prepare -> Es el que siempre se deberia usar, ya que verifica la inyeccion SQL.

            Enlace: https://es.stackoverflow.com/questions/452639/diferencia-consultas-preparadas-y-atributo-pdosqlsrv-attr-direct-query
        */
        $stmt = $pdo->query($obtID);
        // Con fecth obtenemos un array asociativo con la clave "next_id"
        $row = $stmt->fetch();
        // Devuelvo el valor y en el caso de que no tenga se le pone por defecto 1.
        return $row['next_id'] ?? 1;  
    }

    // Se establece la conexion
    require_once '../config/config.php';
    require_once '../lib/conexion.php';

    $conexion = new Conexion();
    $pdo = $conexion->getPDO();

    // Formulario de Registro
    $registrado = "";
    $class = "rojo"; // Esto para el color del mensaje
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {

        // Recojo los valores que paso por el formulario de Registro
        $correo = $_POST['email'];
        $password = $_POST['pass'];

        // Cifrado de la constraseña
        $password_cifrada = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

        /*
            0. Compruebo que he introducido datos en el formulario.
            1. Compruebo que el email es valido.
            2. Compruebo que no este ya registrado en la base de datos.
        */
        if ($correo && $password) {   
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $registrado = "Error - El correo tiene que ser valido";
            } else {
                $comprobarEmail ="
                    SELECT id
                    FROM usuarios
                    WHERE email = :correo; 
                ";
                $stmt = $pdo->prepare($comprobarEmail);
                $stmt->bindParam(':correo', $correo);
                $stmt->execute();

                if ($stmt->rowCount() > 0 ) {
                    $registrado = "ERROR - El correo '". $correo ."' ya se encuentra registrado en el sistema";            
                } else {
                    // Obtengo el ID
                    $id = obtenerID($pdo);

                    // Insertar el usuario en la base de datos
                    $insertUsuario = "
                        INSERT INTO usuarios (id, email, password_hash)
                        VALUES (:id, :correo, :password);
                    ";

                    $stmt = $pdo->prepare($insertUsuario);
                    $stmt->bindParam(':id', $id);
                    $stmt->bindParam(':correo', $correo);
                    $stmt->bindParam(':password', $password_cifrada);

                    if ($stmt->execute()) {
                        $registrado = "Usuario registrado correctamente con ID $id.";
                        $class = "verde";
                    } else {
                        $registrado = "Error al registrar el usuario.";
                    }
                } 
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Formulario de Registro</title>
</head>
<body>
    
    <h2>Formulario de Registro</h2>

    <form action="" method="POST" enctype="multipart/form-data">

        <label for="email">Correo: </label>
        <input type="mail" id="email" name="email"><br><br>
        
        <label for="pass">Contraseña: </label>
        <input type="password" id="pass" name="pass"><br><br>

        <input type="submit" formmethod="post" name="register" value="Registrar">
    </form><br>
    
    <p class="error <?php echo $class ?>"><?php echo $registrado; ?></p><br>

    <a class="boton" href="../">Formulario de Inicio de Sesion</a>

</body>
</html>