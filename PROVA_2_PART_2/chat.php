<?php 

require_once "connectorDB.php";


//asignamos el usuario de session a la variable usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mensaje'])) {
    $usuario = $_SESSION['username'];
    $mensaje = $_POST['mensaje'];
//si el mensaje no está vacío, insertamos el mensaje en la base de datos con insertarMensaje() Y recargamos la página
    if (!empty($mensaje)) {
        if (insertarMensaje($usuario, $mensaje)) {
            header("Location: index.php");
            exit;
        } else {//si el envío falla enviamos un mensaje de error
            $_SESSION['error'] = "Error al enviar el mensaje.";
        }
    } else {
        $_SESSION['error'] = "El mensaje no puede estar vacío.";
    }
}



$username = $_SESSION['username'];

// Lista de mensajes
$mensajes = obtenerMensajes();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="chat-box">
        <h2>Bienvenido a mi sala de Chat</h2>
        <?php 
        if (!empty($mensajes)) { 
            foreach ($mensajes as $row) { ?>
                <div class="mensaje">
                    <strong><?php echo htmlspecialchars($row['usuario']); ?>:</strong>
                    <p><?php echo htmlspecialchars($row['mensaje']); ?></p>
                    <small><?php echo $row['fecha']; ?></small>
                </div>
            <?php } 
        } else { 
            echo "<p>Aún no hay mensajes. ¡Escribe el primero!</p>";
        } 
        ?>

        <form method="POST" action="chat.php">
            <h3><?php echo htmlspecialchars($_SESSION['username']); ?></h3>
            <textarea name="mensaje" placeholder="Escribe tu mensaje aquí..." rows="3" required></textarea>
            <button type="submit">Enviar</button>
        </form>
        <p><?php if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
            }?></p>
    </div>
</body>
</html> 
