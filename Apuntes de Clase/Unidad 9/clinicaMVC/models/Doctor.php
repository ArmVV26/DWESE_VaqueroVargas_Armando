<?php
    namespace Models;
    class Doctor {

        function __construct(
            private string $id,
            private string $nombre,
            private string $apellidos,
            private string $telefono,
            private string $especialidad,
        ){}
    
        public function getId(): int {
            return $this->id;
        }
        
        public function setId(int $id) {
           $this->id = $id;
        }

        public function getNombre(): string {
            return $this->nombre;
        }

        public function setNombre(string $nombre) {
            $this->nombre = $nombre;
        }

        public function getApellidos(): string {
            return $this->apellidos;
        }
        
        public function setApellidos (string $apellid) {
            $this->apellidos = $apellidos;
        }
        
        public function getTelefono(): string {
            return $this->telefono;
        }
        
        public function setTelefono(string $telefono) {
            $this->telefono = $telefono;
        }
        
        public function getEspecialidad(): string {
            return $this->especialidad;
        }

        public function setEspecialidad(string $especialidad) {
            $this->especialidad = $especialidad;
        }
    }
?>