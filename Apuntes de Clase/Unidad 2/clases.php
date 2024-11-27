<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clases</title>
</head>
<body>
<?php
    class Session{
        public Usuario $usuario;
        public function __construct($usuario) {
            $this->usuario = $usuario;
        }
        public function getUsuario(): Usuario {
            return $this->usuario;
        }
    }

    class Usuario{
        private $nombre;
        private Estudios $estudios;

        public function __construct($nombre,$estudios) {
            $this->nombre = $nombre;
            $this->estudios = $estudios;
        }

        public function getName(): string{
            return $this->nombre;
        }

        public function getEstudios(): Estudios{
            return $this->estudios;
        }


        public function setNombre(string $nombre): void{
            $this->nombre = $nombre;
        }
    }

    class Estudios{
        public $universidad;
        private $titulo;

        public function __construct($universidad, $titulo) {
            $this->universidad = $universidad;
            $this->titulo = $titulo;
        }

        public function getTitulo(): string{
            return $this->titulo;
        }
        public function getUniversidad():string{
            return $this->universidad;
        }
    }

    $Estudios = new Estudios("Granada","Desarrollador web");
    $Usuario = new Usuario("Adrian",$Estudios );
    $Session = new Session($Usuario);
   

    echo $universidad = $Session?->usuario?->getEstudios()?->universidad;
    
?>
</body>
</html>