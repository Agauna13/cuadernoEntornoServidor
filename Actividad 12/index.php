<?php
session_start();

if (isset($_SESSION["username"])){
    header("location: /intranet.php");
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
        <input type="text" value="username" name="username" placeholder="Nombre de usuario">
        <input type="text" value="password" name="password" placeholder="Contraseña">
        <button type="submit">Log In</button>
    </form>


</body>

</html>