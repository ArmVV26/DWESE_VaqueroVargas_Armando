<?php

    require_once __DIR__  . '/../config/config.php';

    class Conexion {
        private $pdo;

        public function __construct() {
            try {

                $this->pdo = new PDO(SERVIDOR, USUARIO, PASS);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                
                die("Error al conectar a la base de datos: " . $e->getMessage());
            }
        }

        public function getPDO() {
            return $this->pdo;
        }
    }


?>