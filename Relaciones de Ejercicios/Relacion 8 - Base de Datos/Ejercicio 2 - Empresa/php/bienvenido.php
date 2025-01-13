<?php
    // Inicio las sesiones
    session_start();

    // Se establece la conexion
    require_once '../config/config.php';
    require_once '../lib/conexion.php';

    $conexion = new Conexion();
    $pdo = $conexion->getPDO();

    echo " <h1>Bienvenido ". $_SESSION['email'] ." </h1>";

?>