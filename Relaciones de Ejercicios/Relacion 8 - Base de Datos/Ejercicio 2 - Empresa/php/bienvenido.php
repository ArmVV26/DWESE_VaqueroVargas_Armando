<?php
    // Inicio las sesiones
    session_start();

    // Se establece la conexion
    require_once '../config/config.php';
    require_once '../lib/conexion.php';

    $conexion = new Conexion();
    $pdo = $conexion->getPDO();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Pagina de Bienvenida</title>
</head>
<body>
    <h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
    <?php
        if ($_SESSION['rol'] == 'admin') {
    ?>
    <a class="admin" href="admin.php">Zona Admin</a>
    <?php
        }
    ?>
</body>
</html>