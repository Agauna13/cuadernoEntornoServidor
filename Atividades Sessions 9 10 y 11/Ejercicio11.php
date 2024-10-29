<?php
session_start();

if (!isset($_SESSION["colorFondo"])) {
    $_SESSION["colorFondo"] = "white";
}
if (!isset($_SESSION["colorTexto"])) {
    $_SESSION["colorTexto"] = "black";
}

if (isset($_POST["fondo"])) {
    $_SESSION["colorFondo"] = $_POST["fondo"];
}
if (isset($_POST["texto"])) {
    $_SESSION["colorTexto"] = $_POST["texto"];
}
/*
    $_SESSION y $_POST (entre otras) son 2 mapas clave-valor, que al inicializarlo le estamos indicando una clave
    a la que debemos asignarle un valor.
*/


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuració de Colors</title>
    <style>
        body {
            background-color: <?php echo $_SESSION["colorFondo"]; ?>;
            color: <?php echo $_SESSION["colorTexto"]; ?>;
        }
    </style>
</head>

<body>
    <h1>Elige tus colores favoritos</h1>
    <div class="contenedor">
        <form method="POST">
            <label for="fondo">Color de fondo:</label>
            <select name="fondo" id="fondo">
                <option value="white">Blanco</option>
                <option value="yellow">Amarillo</option>
                <option value="red">Rojo</option>
                <option value="blue">Azul</option>
                <option value="cyan">Cian</option>
                <option value="green">Verde</option>
            </select>

            <label for="texto">Color de texto:</label>
            <select name="texto" id="texto">
                <option value="black">Negro</option>
                <option value="yellow">Amarillo</option>
                <option value="red">Rojo</option>
                <option value="blue">Azul</option>
                <option value="cyan">Cian</option>
                <option value="green">Verde</option>
            </select>

            <button type="submit">Guardar</button>
        </form>
    </div>
</body>

</html>