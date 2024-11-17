<?php
//index.php
session_start();

$error = '';

if (isset($_SESSION["username"]) && !(isset($_SESSION["error"]))) {
    header("Location: /fichaPersonal.php");
}
if (isset($_SESSION["error"])) {
    $error = $_SESSION["error"];
    unset($_SESSION["error"]);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<style>
    body{
        margin: 0 auto;
        width: 70vw;
        font-family: 'Courier New', Courier, monospace;
        background-color: darkgray;
    }
    header{
        display: flex;
        flex-direction: row;
        background-color: black;
        color: white;
        justify-content: space-evenly;
        align-items: center;
        height: 15vh;

    }
    .login{
        color: white;
        background-color: inherit;

    }

    button{
        border: none;
        background-color: inherit;
        color: white;
    }

    button:hover{
        transform: scale(1.2);
    }

    input{
        background-color: inherit;
        color: white;
        border: none;
    }
</style>

<body>
    <header>
        <div class="login">
            <form action="logIn.php" method="POST">
                <input type="text" name="username" placeholder="Username">
                <input type="number" name="password" placeholder="Password">
                <button type="submit">Log In</button>
            </form>
        </div>
    </header>

    <?php if ($error): ?>
        <p style="color: red; font-size: 0.8rem;"><?php echo $error; ?>
        <?php endif; ?>
</body>

</html>