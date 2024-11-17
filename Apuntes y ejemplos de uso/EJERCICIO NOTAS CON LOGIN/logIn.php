<?php
//login.php
session_start(); //inicializamos la sesión

$username = $_POST["username"]; //recogemos el valor del nombre de usuario insertado al formulario por el cliente
$password = $_POST["password"]; //Recogemos el valor de la contraseña recogida del formulario insertado por el cliente


$users = [
    "alan" => 1234,
    "tomeu" => 1234,
    "ana" => 1234,
    "rafel" => 1234,
    "joaquin" => 1234,
    "francesc" => 1234
];



if(isset($users[$username]) && $users[$username] == $password){ //cuidao con poner "username" (asi tal cual con comillas) para referirse al array $users ya que no hay ningun nombre de usuario username.
    $_SESSION["username"] = $username;
    header("Location: /formularioDatos.php");
    setcookie("sessionTimer", "active", time() + 120, "/"); //los parametros indican: el nombre de la cookie (es un array asociativo), el estado, el tiempo que estará activa y la ruta donde la cookie es valida, si solo se especifica / es en todo el proyecto
    exit();
    }else{
        $_SESSION["error"] = "Wrong username or password.";
        header("Location: /index.php");
        exit();
}

?>