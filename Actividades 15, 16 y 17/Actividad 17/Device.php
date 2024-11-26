<?php
class Device{

    protected $nombreDispositivo;

    function __construct($nombreDispositivo){
        $this->nombreDispositivo = $nombreDispositivo;

    }

    public function getNombreDispositivo(){
        return $this->nombreDispositivo;
    }

}