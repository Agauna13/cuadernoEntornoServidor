<?php 

namespace biblioteca\Ciencia;

class Libro{
    private $titulo;
    private $año;

    private $autor;

    public function __construct($titulo, $año, $autor){
        $this->titulo = $titulo;
        $this->año = $año;
        $this->autor = $autor;
    }

    public function mostrarDatos(){
        return 'Nombre: '. $this->titulo.'<br> Año de publicación: ' . $this->año . '.<br> Autor:  ' . $this->autor->getNombre().'<br>Nacionalidad: '.$this->autor->getNacionalidad();
    }
}

?>