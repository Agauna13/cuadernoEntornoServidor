<?php

require 'Vehiculo.php';

class Coche extends Vehiculo
{
    protected $marca;
    protected $modelo;
    protected $color;
    protected $vMax;



    public function __construct($marca, $modelo, $color, $vMax)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
        $this->vMax = $vMax;
        $this->nRuedas = 4;
    }

    public function getnRuedas()
    {
        return $this->nRuedas;
    }

    public function mostrarDetalles(){
        return "Este coche es un " . $this->marca . " " . $this->modelo . " de color " . $this->color . ", con " . $this->nRuedas . " ruedas y velocidad máxima de " . $this->vMax;
    }
}
