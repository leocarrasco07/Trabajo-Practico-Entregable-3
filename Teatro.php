<?php

class Teatro {
    
    private  $nombreTeatro;
    
    private $direccion;
    
    private $arrayFunciones;
    
    public function __construct($nombreTeatro, $direccion, $funciones) {
        $this->nombreTeatro = $nombreTeatro;
        $this->direccion = $direccion;
        $this->arrayFunciones = $funciones;       
    }
    /**
     * @return mixed
     */
    public function getNombreTeatro()
    {
        return $this->nombreTeatro;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @return mixed
     */
    public function getarrayFunciones()
    {
        return $this->arrayFunciones;
    }

    /**
     * @param mixed $nombreTeatro
     */
    public function setNombreTeatro($nombreTeatro)
    {
        $this->nombreTeatro = $nombreTeatro;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @param mixed $Funciones
     */
    public function setarrayFunciones($Funciones)
    {
        $this->arrayFunciones = $Funciones;
    }

    public function cambiarNombreTeatro($nombreNuevo) {
        $this-> setNombreTeatro($nombreNuevo);
        
    }
    
    public function cambiarDireccTeatro($nuevaDirec) {
        $this->setDireccion($nuevaDirec);
    }
    
    public function cambiarNombreFun($nuevoNombreFun, $nombreACambiar) {
        $funcion = $this->getarrayFunciones();
        $resp = null;
        for ($i = 0; $i < count($funcion); $i++) {
            if ($funcion[$i]["nombre"] == $nombreACambiar) {
                $funcion[$i]["nombre"] = $nuevoNombreFun;
                $this->setFunciones($funcion);
                $resp = true;
            }
            else{
                $resp = false; //no existe el nombre en el array funciones
            }
        }
        
        return $resp;
    }
    
    public function CambiarNombreFuncion($nombreNuevo, $nombreFunc) {
        $arrayFunciones= $this->getarrayFunciones();
        for ($i = 0; $i < count($arrayFunciones); $i++) {
            $nombre = $arrayFunciones[$i]->getNombre();
            if ($nombreFunc == $nombre) {
                $arrayNuevo = $arrayFunciones[$i]->setNombre($nombreNuevo);
                array_push($arrayFunciones,$arrayNuevo);
                $this->setarrayFunciones($arrayFunciones);
            }
            else{
                $resp = "no se pudo cambiar";
            }
        }
        return $resp;
    }
    
    public function CambiarPrecioFuncion($nuevoPrecio, $nombreFuncion) {
        $arrayFunciones= $this->getarrayFunciones();
        for ($i = 0; $i < count($arrayFunciones); $i++) {
            $nombre = $arrayFunciones[$i]->getNombre();
            if ($nombreFuncion == $nombre) {
                $arrayNuevo = $arrayFunciones[$i]->setPrecio($nuevoPrecio);
                array_push($arrayFunciones,$arrayNuevo);
                $this->setarrayFunciones($arrayFunciones);
                $resp = true;
            }
            else{
                $resp = false;
            }
        }
        return $resp;
    }
    
    public function solapado($ObjFuncion) {
        $horaInicio = $ObjFuncion->getHora_inicio()[0];
        $minutosInicio = $ObjFuncion->getHora_inicio()[1];
        $horaInicioFinal = DateTime::createFromFormat("H:i","".$horaInicio.":".$minutosInicio."");
        $horaInicioFinal = $horaInicioFinal->format("H:i");
       
        
        $coleccionFunciones = $this->getarrayFunciones();
        
        for ($i = 0; $i < count($coleccionFunciones); $i++) {
            $horaColec = $coleccionFunciones[$i]->getHora_inicio()[0];
            $minutosColec = $coleccionFunciones[$i]->getHora_inicio()[1];
            $horaInicioFinalArray = DateTime::createFromFormat("H:i", "".$horaColec.":".$minutosColec."" );
            $horaInicioFinalArray = $horaInicioFinalArray->format("H:i");
            $duracionFinalArray = $coleccionFunciones[$i]->DuracionFinal();
            
            if ($horaInicioFinalArray < $horaInicioFinal && $horaInicioFinal > $duracionFinalArray) {
                $resp = true;
            }
            else {
                $resp = false;
            }
        }
        
        return $resp;
        
    }
    
    public function cargarFuncion($objFuncion) {        
        
        if ($this->solapado($objFuncion)) {
            $array = $this->getarrayFunciones();
            array_push($array, $objFuncion);
            $this->setarrayFunciones($array);
            $resp = true;
        }
        else {
            $resp = false;
        }
        return $resp;
    }
    
    public function cambiarPrecioFun($nombreFun, $nuevoPrecio) {
        $funcion = $this->getFunciones();
        $resp = null;
        for ($i = 0; $i < count($funcion); $i++) {
            if ($funcion[$i]["nombre"] == $nombreFun) {
                $funcion[$i]["precio"] = $nuevoPrecio;
                $this->setFunciones($funcion);
                $resp = true;
            }
            else{
                $resp = false; //no existe el nombre en el array funciones
            }
        }
        
        return $resp;
    }
    
    public function darCosto() {
        $costo = 0;
        $coleccion = $this->getarrayFunciones();
        for ($i = 0; $i < count($coleccion); $i++) {
            $costo = $costo + $coleccion[$i]->obtenerCosto();
        }
        return $costo;
    }
    
    
    public function __toString() {
        $resp = "nombreTeatro: ".$this->getNombreTeatro()."\n".
                "Direccion: ". $this->getDireccion()."\n".
                "Funciones : "."\n";
                
            for ($i = 0; $i < count($this->getarrayFunciones()); $i++) {
                $resp= $resp .$i .": ". $this->getarrayFunciones()[$i]->__toString()."\n";
            }
            return $resp;
    }
    
}