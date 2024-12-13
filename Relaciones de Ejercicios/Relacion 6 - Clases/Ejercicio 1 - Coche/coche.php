<?php

    class Coche
    {
        public function __construct 
        (
            private string $color = "Rojo",
            private string $marca = "Ferrari",
            private string $modelo = "Aventador",
            private int $velocidad = 300,
            private int $caballos = 500,
            private int $plazas = 2
        )
        {}
        
        // Getter
        public function getColor()
        {
            return $this->color;
        }

        public function getMarca()
        {
            return $this->marca;
        }

        public function getModelo()
        {
            return $this->modelo;
        }

        public function getVelocidad()
        {
            return $this->velocidad;
        }

        public function getCaballos()
        {
            return $this->caballos;
        }

        public function getPlazas()
        {
            return $this->plazas;
        }

        // Setter
        public function setColor($Color)
        {
            $this->color = $Color;
        }

        public function setMarca($Marca)
        {
            $this->color = $Marca;
        }

        public function setModelo($Modelo)
        {
            $this->color = $Modelo;
        }

        public function setVelocidad($Velocidad)
        {
            $this->color = $Velocidad;
        }

        public function setCaballos($Caballos)
        {
            $this->color = $Caballos;
        }

        public function setPlazas($Plazas)
        {
            $this->color = $Plazas;
        }
        
        // Metodos
        public function frenar(){
            $this->velocidad -= 1; 
            return $this;
        }

        public function acelerar(){
            $this->velocidad += 1;
            return $this; 
        }        
    }
?>