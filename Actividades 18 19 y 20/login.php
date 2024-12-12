<?php
require_once 'connection.php';
session_start();

$username = $_POST["username"];
$contrasenya = $_POST["password"];

try {

    $host = "localhost";
    $dbname = "dwes";
    $usuario = "root";
    $password = "";
    $pdo = conectarBBDD("mysql", $host, $dbname, "utf8mb4", $usuario, $password);



    if (getUserByUsername($pdo, $username) && checkPassword($pdo, $username, $contrasenya) && checkEstado($pdo, $username)) {
        $_SESSION["username"] = $username;
        header("Location: /intranet.php");
        exit();
    }else if(getUserByUsername($pdo, $username) && checkPassword($pdo, $username, $contrasenya) && !checkEstado($pdo, $username)){
        $_SESSION['errorConsulta'] = "El Usuario se encuentra inactivo, consulte con el administrador";
        header("Location: index.php");
        exit();
    }else {
        $_SESSION['errorConsulta'] = "Nombre de usuario o contraseña incorrectos";
        header("Location: index.php");
        exit();
    }
} catch (Exception $e) {
    die("Error al iniciar Sesion " . $e->getMessage());
}

