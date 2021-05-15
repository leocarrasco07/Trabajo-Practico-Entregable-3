<?php

class Funciones {
    
    private $nombre;
    
    private $hora_inicio; // array indexado
    
    private $durac_Obra;  // array indexado
    
    private $precio;
    
    public function __construct($nombre, $hora_inicio, $durac_Obra, $precio) {
        $this->nombre = $nombre;
        $this->hora_inicio = $hora_inicio;
        $this->durac_Obra = $durac_Obra;
        $this->precio = $precio;
    }
    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getHora_inicio()
    {
        return $this->hora_inicio;
    }

    /**
     * @return mixed
     */
    public function getDurac_Obra()
    {
        return $this->durac_Obra;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @param mixed $hora_inicio
     */
    public function setHora_inicio($hora_inicio)
    {
        $this->hora_inicio = $hora_inicio;
    }

    /**
     * @param mixed $durac_Obra
     */
    public function setDurac_Obra($durac_Obra)
    {
        $this->durac_Obra = $durac_Obra;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }
    
    public function DuracionFinal() {
        
        $hora = $this->getHora_inicio()[0] * 3600;
        $minutos = $this->getHora_inicio()[1] * 60;
        $duracionHora = $this->getDurac_Obra()[0] * 3600;
        $duracionMinutos = $this->getDurac_Obra()[1] * 60;
        $SegundosFinal= $hora + $duracionHora + $duracionMinutos + $minutos;
        
        $horaFinal = floor($SegundosFinal / 3600);
        $minutosFinal = floor(($SegundosFinal - ($horaFinal * 3600)) / 60);
        
        $HorarioFinal = DateTime::createFromFormat("H:i", "".$horaFinal.":".$minutosFinal."");
        return $HorarioFinal->format("H:i");
        
    }
    
    public function obtenerCosto() {
        $precio = $this->getPrecio();
        return $precio;
    }

    
    public function __toString() {
        $string = "Nombre: ".$this->getNombre()."\n".
            "Hora Inicio: ".$this->getHora_inicio()[0].":".$this->getHora_inicio()[1]."\n".
            "Duracion: ".$this->getDurac_Obra()[0].":".$this->getDurac_Obra()[1]."\n".
            "Precio: ".$this->getPrecio()."\n";
        return $string;
    }
}