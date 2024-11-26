<?php
require_once "./Forma.php";
class Circulo implements Forma{
    
    private $radio;


    public function __construct($radio){
        $this->radio = $radio;
    }

    public function getRadio(){
        return $this->radio;
    }

    public function calcularArea(){
        return ($this->radio ** 2) * 3.1416;
    }

    function calcularPerimetro(){
        return ($this->radio * 2) * 3.1416;
    }

}