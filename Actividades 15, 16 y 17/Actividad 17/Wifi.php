<?php
    trait WiFi {
        private $wifiConnect = false;
    
        public function connectWiFi($nombreDispositivo){
            $this->wifiConnect = true;
            return "WiFi encendido en " . $nombreDispositivo . " Estado: " . ($this->wifiConnect ? "Encendido" : "Apagado");
        }
        public function disconnectWiFi($nombreDispositivo){
            $this->wifiConnect = false;
            return "WiFi apagado en ". $nombreDispositivo . " Estado: " . ($this->wifiConnect ? "Encendido" : "Apagado");
        }
    }

?>