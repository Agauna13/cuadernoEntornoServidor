<?php
    session_start();

    $error = "";

    if(isset($_SESSION['error'])){
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
    }else if(isset($_SESSION['username'])){
        header('Location: chat.php');
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
<body>
    <form action="login.php" method = "POST">
        <input type="text" name="username" placeholder="Nombre de usuario">
        <input type="password" name="password" placeholder="Contraseña">
        <input type="submit" value="Iniciar sesión">
        <a href="register.php">Registrarse</a>
        <p><?php echo $error; ?></p>
    </form>
</body>
</html>