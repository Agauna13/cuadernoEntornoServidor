<?php 

trait Bluetooth {
    private $bluetooth = false;
    public function connectBluetooth($nombreDispositivo){
        $this->bluetooth = true;
        return "Bluetooth conectado en " . $nombreDispositivo .  " Estado: " . ($this->bluetooth ? "Encendido" : "apagado");
    }


    public function disconnectBluetooth($nombreDispositivo): string {
        $this->bluetooth = false;
        return "Bluetooth desconcectado en ". $nombreDispositivo .  " Estado: " . ($this->bluetooth ? " Encendido" : "Apagado");
    }
}

?>