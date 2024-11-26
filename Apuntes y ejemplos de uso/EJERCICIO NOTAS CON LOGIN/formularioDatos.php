<?php
//formularioDatos.php
require 'alumnado.php';
require 'boletin.php';
session_start();

if(isset($_SESSION["datosUsuario"]) && $_SESSION["datosUsuario"] == true){
    header("location: /fichaPersonal.php");
    exit();
}

if (!isset($_COOKIE["sessionTimer"])) {
    header("location: logOut.php");
    exit();
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
    body{
        margin: 0 auto;
        width: 70vw;
        font-family: 'Courier New', Courier, monospace;
        background-color: darkgray;
    }
    header{
        display: flex;
        flex-direction: row;
        background-color: black;
        color: white;
        justify-content: space-evenly;
        align-items: center;
        height: 15vh;

    }


    button{
        border: none;
        background-color: transparent;
        color: black;
    }

    button:hover{
        transform: scale(1.2);
    }

    input{
        background-color: inherit;
        color: black;
        border: none;
    }
</style>
<body>
    <header>


        <h3><?php echo substr($_SESSION["username"], -1) == 'a' ? "Bienvenida " . ucfirst($_SESSION["username"]) : "Bienvenido " . ucfirst($_SESSION["username"]); ?></h3>
    </header>
    <form action="/fichaPersonal.php" method="POST">
        <input type="text" name="dni" placeholder="DNI">
        <input type="text"  name= "apellido" placeholder="Apellido">
        <input type="text"  name= "curso" placeholder="Curso">
        <button type="submit">GUARDAR</button>
    </form>
</body>
</html>