<?php
require_once "Wifi.php";
require_once "Bluetooth.php";
require_once "Device.php";

class Tablet extends Device{
    use Wifi, Bluetooth;

    private $modeloDispositivo;

    function __construct($nombreDispositivo, $modeloDispositivo){
        parent::__construct($nombreDispositivo);
        $this->modeloDispositivo = $modeloDispositivo;
    }

    public function leerLibro($libro){
        return "Leyendo " . $libro;
    }

    public function getNombre(){
        return $this->nombreDispositivo;
    }


    public function mostrarModelo(){
        return $this->modeloDispositivo;
    }
}