<?php
    session_start();
//controlamos que no haya error al inciar sesion, feedback sobre todo para que el usuario sepa cual es el error a la hora de iniciar sesion si no responde el programa
    $error = "";

    if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
    } else if (isset($_SESSION['username'])) {
        header('Location: chat.php');
        exit();
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
    <form action="login.php" method="POST"> 
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="password">
        <button type="submit">Log In</button>
        <p><?php echo $error;?></p>
    </form>
</body>

</html>