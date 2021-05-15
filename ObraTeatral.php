<?php


class ObraTeatral extends Funciones {
    
    
    public function obetenerCosto() {
        $precio = parent::obtenerCosto();
        $precio = $precio + (($precio * 45) /100);
        return  $precio;
    }
    
}