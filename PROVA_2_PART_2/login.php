<?php

require_once "connectorDB.php";

//login basico donde comprobamos si el usuario ya esta 'online' y lo mandamos a chat
if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_SESSION['username'])){
    $usuario = $_POST['username'];
    $contra = $_POST['password'];

}else if(isset($_SESSION['username'])){
    header("Location: chat.php");
    exit();
}
//verificamos la contraseña
if(verifyPassword($usuario, $contra)){
    $_SESSION['username'] = $usuario;
    header("Location: chat.php");//si es correcta, le damos acceso a la sala de chat
}else{
    $_SESSION['error'] = "usuario o contraseña incorrectos";//si no, al index con un mensaje de error
    header("Location: index.php");
    exit();
}