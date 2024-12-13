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