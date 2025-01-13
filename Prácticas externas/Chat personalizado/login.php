<?php

require_once "connection.php";


if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_SESSION['username'])){
    $usuario = $_POST['username'];
    $contra = $_POST['password'];
    $_POST[] = array();

}else if(isset($_SESSION['username'])){
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