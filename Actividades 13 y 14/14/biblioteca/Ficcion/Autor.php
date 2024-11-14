<?php
    namespace biblioteca\Ficcion;
    class Autor{
        private $nombre;
        private $nacionalidad;

        function __construct($nombre, $nacionalidad){
            $this->nombre = $nombre;
            $this->nacionalidad = $nacionalidad;
        }



        public function getNombre(){
            return $this->nombre;
        }


        public function getNacionalidad(){
            return $this->nacionalidad;
        }
    }

?>
