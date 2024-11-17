<?php
//alumnado.php
class Alumno
{
    private $dni;
    private $nombreAlumno;
    private $apellido;
    private $curso;


    function __construct($dni, $nombreAlumno, $apellido, $curso)
    {
        $this->dni = $dni;
        $this->nombreAlumno = $nombreAlumno;
        $this->apellido = $apellido;
        $this->curso = $curso;
    }

    public function getNombreAlumno()
    {
        return $this->nombreAlumno;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getCurso()
    {
        return $this->curso;
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function datosAlumno()
    {
        return "<p>DNI: " . $this->dni . ".  Nombre: " . $this->nombreAlumno . ". Apellidos: " . $this->apellido . ". Curso: " . $this->curso . ".</p>";
    }
}
