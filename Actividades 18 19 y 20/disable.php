<?php
require_once 'connection.php';

try {

    $host = "localhost";
    $dbname = "dwes";
    $usuario = "root";
    $password = "";
    $pdo = conectarBBDD("mysql", $host, $dbname, "utf8mb4", $usuario, $password);

    dropUser($pdo, $_SESSION['username']);

    $_SESSION['errorConsulta'] = "Usuario eliminado con éxito";
    header("Location: logout.php");
    exit();

}catch (Exception $e) {
    die("Error al iniciar Sesion " . $e->getMessage());
}


?>