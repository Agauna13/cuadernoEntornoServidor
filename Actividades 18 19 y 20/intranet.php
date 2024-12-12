<?php
require_once 'connection.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido <?php echo $_SESSION['username']?></h1>

    <form action="mostrarNotas.php">
        <button type="submit">Ver Notas</button>
    </form>

    <form action="disable.php">
        <button type="submit">Darme de Baja</button>
    </form>
    <form action="logout.php">
        <button type="submit">Log Out</button>
    </form>

    

    
</body>
</html>