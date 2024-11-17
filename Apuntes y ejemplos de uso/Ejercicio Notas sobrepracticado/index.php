<?php
$today = date('D');

$dia = [
    "Mo" => "Lunes",
    "Tu" => "Martes",
    "Wed" => "Miércoles",
    "Fri" => "Viernes",
    "Sat" => "Sábado",
    "Sun" => "Domingo"
];

$mes = [
    "Jan" => "Enero",
    "Feb" => "Febrero",
    "Mar" => "Marzo",
    "Apr" => "Abril",
    "May" => "Mayo",
    "Jun" => "Junio",
    "Jul" => "Julio",
    "Aug" => "Agosto",
    "Sep" => "Septiembre",
    "Oct" => "Octubre",
    "Nov" => "Noviembre",
    "Dec" => "Diciembre"
];

echo $dia[$today] . "día " . date('d') . " de " . $mes[date('M')] . " del " . date('Y');


$alumnosNotas = [
    "Alan" => array("Servidor" => 7, "Entorno Cliente" => 9, "Despliegue" => 6, "Diseño De Interfaces" => 10, "EIE" => 6),
    "Carlos" => array("Servidor" => 2, "Entorno Cliente" => 1, "Despliegue" => 9, "Diseño De Interfaces" => 1, "EIE" => 3),
    "Ana" => array("Servidor" => 3, "Entorno Cliente" => 4, "Despliegue" => 7, "Diseño De Interfaces" => 5, "EIE" => 8),
    "Juan" => array("Servidor" => 6, "Entorno Cliente" => 4, "Despliegue" => 4, "Diseño De Interfaces" => 10, "EIE" => 3),
    "Maria" => array("Servidor" => 4, "Entorno Cliente" => 7, "Despliegue" => 1, "Diseño De Interfaces" => 2, "EIE" => 8),
    "Pedro" => array("Servidor" => 5, "Entorno Cliente" => 2, "Despliegue" => 7, "Diseño De Interfaces" => 3, "EIE" => 10),
    "Lucía" => array("Servidor" => 9, "Entorno Cliente" => 10, "Despliegue" => 9, "Diseño De Interfaces" => 9, "EIE" => 2),
    "David" => array("Servidor" => 1, "Entorno Cliente" => 5, "Despliegue" => 4, "Diseño De Interfaces" => 1, "EIE" => 1),
    "Sofia" => array("Servidor" => 2, "Entorno Cliente" => 10, "Despliegue" => 8, "Diseño De Interfaces" => 2, "EIE" => 5),
    "Andrés" => array("Servidor" => 7, "Entorno Cliente" => 4, "Despliegue" => 10, "Diseño De Interfaces" => 10, "EIE" => 5),
    "Elena" => array("Servidor" => 3, "Entorno Cliente" => 8, "Despliegue" => 9, "Diseño De Interfaces" => 8, "EIE" => 3),
    "Raúl" => array("Servidor" => 9, "Entorno Cliente" => 3, "Despliegue" => 1, "Diseño De Interfaces" => 9, "EIE" => 6),
    "Isabel" => array("Servidor" => 2, "Entorno Cliente" => 2, "Despliegue" => 2, "Diseño De Interfaces" => 8, "EIE" => 5),
    "Fernando" => array("Servidor" => 4, "Entorno Cliente" => 9, "Despliegue" => 6, "Diseño De Interfaces" => 8, "EIE" => 3),
    "Cristina" => array("Servidor" => 2, "Entorno Cliente" => 10, "Despliegue" => 4, "Diseño De Interfaces" => 3, "EIE" => 8),
    "Miguel" => array("Servidor" => 5, "Entorno Cliente" => 7, "Despliegue" => 7, "Diseño De Interfaces" => 4, "EIE" => 6),
    "Laura" => array("Servidor" => 10, "Entorno Cliente" => 3, "Despliegue" => 8, "Diseño De Interfaces" => 5, "EIE" => 2),
    "Javier" => array("Servidor" => 10, "Entorno Cliente" => 5, "Despliegue" => 6, "Diseño De Interfaces" => 10, "EIE" => 3),
    "Beatriz" => array("Servidor" => 7, "Entorno Cliente" => 3, "Despliegue" => 5, "Diseño De Interfaces" => 7, "EIE" => 3),
    "José" => array("Servidor" => 9, "Entorno Cliente" => 1, "Despliegue" => 3, "Diseño De Interfaces" => 6, "EIE" => 5),
    "Sandra" => array("Servidor" => 9, "Entorno Cliente" => 10, "Despliegue" => 5, "Diseño De Interfaces" => 8, "EIE" => 1)
];


function obtenerCalificacion($nota)
{
    $calificacion = "";
    switch (true) {
        case ($nota >= 0 && $nota < 5):
            $calificacion .= "Suspenso";
            break;
        case ($nota > 5 && $nota <= 6):
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

function notaMedia($alumno)
{
    global $alumnosNotas;
    $media = 0;

    foreach ($alumnosNotas[$alumno] as $asignatura => $nota) {
        $media += $nota;
    }
    return $media = $media /= 5;
}

function notaAsignatura($alumno, $asignatura)
{
    global $alumnosNotas;
    return $alumnosNotas[$alumno][$asignatura];
}

function renderizarAlumno($alumno)
{
    global $alumnosNotas;
    $renderizado = "";
    foreach ($alumnosNotas[$alumno] as $asignatura => $nota) {
        $renderizado .= "<p>Asignatura: " . $asignatura . ". Nota: " . $nota . " Calificación: " . obtenerCalificacion($nota) . ".</p>";
    }
    return $renderizado;
}


function crearFila()
{
    global $alumnosNotas;
    $boletin = "";
    foreach ($alumnosNotas as $nombre => $notas) {
        $boletin .= "<div class = 'alumno'><h1>Nombre Alumno: " . $nombre . "</h1>" . renderizarAlumno($nombre) . "<h3>Nota Media: " . notaMedia($nombre) . "</h3></div>";
    }
    return $boletin;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        background-color: black;
        color: white;
    }

    .tabla {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-around;

    }

    .alumno {
        display: flex;
        flex-direction: column;
        align-content: center;
        width: 30%;
        text-align: center;
        border: 2px dashed white;
        margin: 2% 0% 3% 0%;
    }
</style>

<body>
    <div class="boletin">
        <h1>Notas Generales</h1>
        <div class="tabla">
            <?php echo crearFila(); ?>

        </div>
    </div>
</body>

</html>