<?php

    class Musical extends Funciones {
        
        private $director;
        
        private $cantPersonasEnEscena;
        
        public function __construct($nombre, $hora_inicio, $durac_Obra, $precio, $director, $cantPeronas) {
            parent::__construct($nombre, $hora_inicio, $durac_Obra, $precio);
            $this->director = $director;
            $this->cantPersonasEnEscena = $cantPeronas;
        }
        
        /**
         * @return mixed
         */
        public function getDirector()
        {
            return $this->director;
        }
    
        /**
         * @return mixed
         */
        public function getCantPersonasEnEscena()
        {
            return $this->cantPersonasEnEscena;
        }
    
        /**
         * @param mixed $director
         */
        public function setDirector($director)
        {
            $this->director = $director;
        }
    
        /**
         * @param mixed $cantPersonasEnEscena
         */
        public function setCantPersonasEnEscena($cantPersonasEnEscena)
        {
            $this->cantPersonasEnEscena = $cantPersonasEnEscena;
        }
        
        public function obetenerCosto() {
            $precio = parent::obtenerCosto();
            $precio = $precio + (($precio * 12) /100);
            return  $precio;
        }
                
    
        public function __toString() {
            $resp = parent::__toString();
            $resp = $resp . "Director: ".$this->getDirector()."\n".
                    "Cantidad De Personas en Escena: ".$this->getCantPersonasEnEscena()."\n";
            return $resp;
        }
        
    }