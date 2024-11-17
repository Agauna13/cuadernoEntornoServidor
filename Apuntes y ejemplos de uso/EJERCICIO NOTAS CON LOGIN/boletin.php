<?php
//boletin.php

class Boletin
{
    private $servidor;
    private $entornoCliente;
    private $despliegue;
    private $diseny;
    private $eie;
    private $notas = [];

    function __construct(
        $servidor,
        $entornoCliente,
        $despliegue,
        $diseny,
        $eie,
    ) {
        $this->servidor = $servidor;
        $this->entornoCliente = $entornoCliente;
        $this->despliegue = $despliegue;
        $this->diseny = $diseny;
        $this->eie = $eie;
        $this->notas = [$servidor, $entornoCliente, $despliegue, $diseny, $eie];
    }


    public function getServidor()
    {
        return $this->servidor;
    }

    public function getEntornoCliente()
    {
        return $this->entornoCliente;
    }

    public function getDespliegue()
    {
        return $this->despliegue;
    }

    public function getDiseny()
    {
        return $this->diseny;
    }

    public function getEie()
    {
        return $this->eie;
    }

    function obtenerCalificacion($nota){
        $calificacion = "";
        switch (true) {
            case ($nota >= 0 && $nota < 5):
                $calificacion .= "Suspenso";
                break;
            case ($nota >= 5 && $nota <= 6):
                $calificacion .= "Bien";
                break;
            case ($nota > 6 && $nota <= 8):
                $calificacion .= "Notable";
                break;
            case ($nota > 8 && $nota <= 10):
                $calificacion .= "Excelente";
                break;
        }
        return $calificacion;
    }

    public function notasAlumno()
    {
        return "<p> Servidor: " . $this->servidor . "<strong> "  . $this->obtenerCalificacion($this->servidor) . "</strong>.<br>
        Desarrollo Web en entorno cliente: " . $this->entornoCliente . "<strong> "  . $this->obtenerCalificacion($this->entornoCliente) . "</strong>.<br>
        Depliegue de aplicaciones: " . $this->despliegue . "<strong> "  . $this->obtenerCalificacion($this->despliegue) . "</strong>.<br>
        Diseño de interfaces Web: " . $this->diseny . "<strong> " . $this->obtenerCalificacion($this->diseny) . "</strong>.<br>
        Empresa e iniciativa emprendedora: " . $this->eie . "<strong> "  . $this->obtenerCalificacion($this->eie) . "</strong>.<br>
        </p>";
    }

    public function notaMedia()
    {
        $media = array_sum($this->notas) / 5;
        return $media;
    }

    public function repetidor(){
        $repetidor = 'Pasa al siguiente curso';
        foreach($this->notas as $nota){
            if($this->obtenerCalificacion($nota) == "Suspenso"){
                return "Repite Curso";
            }
        }
        return $repetidor;
        
    }
}
