<?php
//fichapersonal.php
require 'alumnado.php';
require 'boletin.php';
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: /index.php");
    exit();
}

if (!isset($_COOKIE["sessionTimer"])) {
    header("location: logOut.php");
    exit();
}


$dni = $_POST["dni"];
$nombre = ucfirst($_SESSION["username"]);
$apellido = $_POST["apellido"];
$curso = $_POST["curso"];


if ($dni != null && $nombre != null && $curso != null) {
    $_SESSION["datosUsuario"] = true;
} else {
    $_SESSION["datosUsuario"] = false;
    header("location: /formularioDatos.php");
}




$alumno = new Alumno($dni, $nombre, $apellido, $curso);

$alumnosNotas = [
    "Alan" => array("Servidor" => 7, "Entorno Cliente" => 9, "Despliegue" => 6, "Diseño De Interfaces" => 10, "EIE" => 6),
    "Tomeu" => array("Servidor" => 2, "Entorno Cliente" => 1, "Despliegue" => 9, "Diseño De Interfaces" => 1, "EIE" => 3),
    "Ana" => array("Servidor" => 3, "Entorno Cliente" => 4, "Despliegue" => 7, "Diseño De Interfaces" => 5, "EIE" => 8),
    "Rafel" => array("Servidor" => 6.5, "Entorno Cliente" => 4, "Despliegue" => 4, "Diseño De Interfaces" => 10, "EIE" => 3),
    "Joaquin" => array("Servidor" => 4, "Entorno Cliente" => 7, "Despliegue" => 1, "Diseño De Interfaces" => 2, "EIE" => 8),
    "Francesc" => array("Servidor" => 5, "Entorno Cliente" => 2, "Despliegue" => 7, "Diseño De Interfaces" => 3, "EIE" => 10)
];



$boletin = new Boletin($alumnosNotas[$nombre]["Servidor"], $alumnosNotas[$nombre]["Entorno Cliente"], $alumnosNotas[$nombre]["Despliegue"], $alumnosNotas[$nombre]["Diseño De Interfaces"], $alumnosNotas[$nombre]["EIE"]);

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boletín</title>
</head>
<style>
    body {
        margin: 0 auto;
        width: 70vw;
        font-family: 'Courier New', Courier, monospace;
        background-color: darkgray;
    }

    header {
        display: flex;
        flex-direction: row;
        background-color: black;
        color: white;
        justify-content: space-evenly;
        align-items: center;
        height: 15vh;

    }

    .login {
        color: white;
        background-color: inherit;

    }

    button {
        border: none;
        background-color: inherit;
        color: white;
    }

    button:hover {
        transform: scale(1.2);
    }

    input {
        background-color: inherit;
        color: white;
        border: none;
    }
</style>

<body>
    <header>
        <div class="logo"></div>
        <?php echo substr($nombre, -1) == 'a' ? "Bienvenida " . $nombre . ' ' . $apellido : "Bienvenido " . $nombre . ' ' . $apellido; ?>
        <form action="logOut.php">
            <button type="submit">Log Out</button>
        </form>

    </header>
    <div class="notas">
        <p>
            <?php echo $alumno->datosAlumno(); ?>
        </p>
        <h3>
            Calificaciones
        </h3>
        <div class="calificaciones">
            <?php echo $boletin->notasAlumno(); ?>
        </div>
        <div class="notaMedia">
            <p>Nota Media: <?php echo $boletin->notaMedia(); ?></p>
        </div>
        <div class="repite">
            <h3><?php echo $boletin->repetidor() ?></h3>
        </div>

    </div>
</body>

</html>