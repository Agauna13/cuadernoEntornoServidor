<?php
require_once "Device.php";
require_once "Wifi.php";
require_once "Bluetooth.php";

class Movil extends Device{
    use Wifi, Bluetooth;
    private $numTelefono;

    function __construct($nombreDispositivo, $numTelefono){
        parent::__construct($nombreDispositivo);
        $this->numTelefono = $numTelefono;
    }


    public function llamar($telefono){
        return "Llamando a: " . $telefono;
    }

    public function getNombre(){
        return $this->nombreDispositivo;
    }


}