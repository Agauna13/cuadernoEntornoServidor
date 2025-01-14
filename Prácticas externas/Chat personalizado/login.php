<?php

require_once "connection.php";


if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_SESSION['username'])){
    $usuario = $_POST['username'];
    $contra = $_POST['password'];

}else if(isset($_SESSION['username'])){
    //setcookie(name, value, expire, path, domain, secure, httponly); (Si es necesario instanciar una cookie)

    header("Location: chat.php");
    exit();
}

if(verifyPassword($usuario, $contra)){
    $_SESSION['username'] = $usuario;
    header("Location: chat.php");
}else{
    $_SESSION['error'] = "usuario o contraseña incorrectos";
    header("Location: index.php");
    exit();
}