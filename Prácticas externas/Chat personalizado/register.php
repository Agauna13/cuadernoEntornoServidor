<?php
    require_once "connection.php";

    $error = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_SESSION['username'])){
        $username = $_POST['username'];
        $pass = $_POST['password'];

        if(createUser($username, $pass)){
            $_SESSION['username'] = $username;
            header("Location: chat.php");
            exit();
        }else{
            $_SESSION['error'] = "Hubo un error al crear la cuenta. Intenta nuevamente.";
            header("Location: register.php");
            exit();
        }
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
    <form action="register.php" method = "POST">
        <input type="text" name="username" placeholder="Nombre de usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Registrame</button>
        <a href="index.php">Ya tienes cuenta? Inicia sesión</a>
        <?php if (isset($_SESSION['error'])): ?>
            <p><?php echo $_SESSION['error']; ?></p>
            <?php unset($_SESSION['error']); ?>  <!-- Borramos el error después de mostrarlo -->
        <?php endif; ?>
        

    </form>
</body>
</html>