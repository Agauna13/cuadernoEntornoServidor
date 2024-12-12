<?php
session_start();

$error = "";

if (isset($_SESSION['errorConsulta'])) {
    $error .= $_SESSION['errorConsulta'];
    unset($_SESSION['errorConsulta']);
}else if (isset($_SESSION["username"])){
    header("location: /intranet.php");
}else{
    unset($_SESSION['username']);
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
    <h2>Log In</h2>
    <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="Nombre de usuario">
        <input type="password" name="password" placeholder="Contraseña">
        <button type="submit">Log In</button>
    </form>
    <form action="register.php">
        <button type="submit">
            Regístrate
        </button>
    </form>

    <p style= "color: red"><?php echo $error; ?></p>

</body>

</html>