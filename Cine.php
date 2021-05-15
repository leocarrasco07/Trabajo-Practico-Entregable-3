<?php

    class Cine extends Funciones {
        
        private $genero;
        
        private $origen;
        
        public function __construct($nombre, $hora_inicio, $durac_Obra, $precio, $genero, $origen) {
            parent::__construct($nombre, $hora_inicio, $durac_Obra, $precio);
            $this->genero = $genero;
            $this->origen = $origen;
        }
        
        /**
         * @return mixed
         */
        public function getGenero()
        {
            return $this->genero;
        }
    
        /**
         * @return mixed
         */
        public function getOrigen()
        {
            return $this->origen;
        }
    
        /**
         * @param mixed $genero
         */
        public function setGenero($genero)
        {
            $this->genero = $genero;
        }
    
        /**
         * @param mixed $origen
         */
        public function setOrigen($origen)
        {
            $this->origen = $origen;
        }
        
        public function obetenerCosto() {
            $precio = parent::obtenerCosto();
            $precio = $precio + (($precio * 65) /100);
            return  $precio;
        }
        
    
        public function __toString() {
            $resp = parent::__toString();
            $resp = $resp . "Genero: ".$this->getGenero()."\n".
                    "Origen: ".$this->getOrigen()."\n";
            return $resp;
        } 
    }