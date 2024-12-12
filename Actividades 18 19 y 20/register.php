<?php
require_once 'connection.php';
$error = "";

if(isset($_SESSION['errorConsulta'])){
    $error .= $_SESSION['errorConsulta'];
    unset($_SESSION['errorConsulta']);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'] ?? null;
    $apellido = $_POST['apellido'] ?? null;
    $nombreUsuario = $_POST['username'] ?? null;
    $contrasenya = $_POST['password'] ?? null;
    $_SESSION['username'] = $nombreUsuario ?? null;

    if ($nombre && $apellido && $nombreUsuario && $contrasenya) {
        try {
            $host = "localhost";
            $dbname = "dwes";
            $usuario = "root";
            $password = "";
            $pdo = conectarBBDD("mysql", $host, $dbname, "utf8mb4", $usuario, $password);

            if(!getUserByUsername($pdo, $nombreUsuario)){
                newUser($pdo, $nombre, $apellido, $nombreUsuario, $contrasenya);
                header("Location: intranet.php");
                exit();
            }else{
                $_SESSION['errorConsulta'] = "El Nombre de usuario ya se encuentra Registrado, pruebe iniciando sesión";
                header("Location: register.php");
                exit();
            }
            
        } catch (Exception $e) {
            die("Error al crear el usuario: " . $e->getMessage());
        }
    } else {
        echo "Por favor, completa todos los campos.";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Regístrate</h2>
    <form action="" method="POST">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="apellido" placeholder="Apellido">
        <input type="text" name="username" placeholder="Nombre de usuario">
        <input type="password" name="password" placeholder="Contraseña">
        <button type="submit">Enviar</button>
    </form>
    <form action="index.php">
        <button type="submit">
            Ya tienes cuenta? logueate
        </button>
    </form>

    <p style= "color: red"><?php echo $error; ?></p>
</body>

</html>