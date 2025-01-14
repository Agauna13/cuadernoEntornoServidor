<?php
/*
Crear chat_db!

CREATE TABLE mensajes (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Campo ID único y autoincremental
    usuario VARCHAR(50) NOT NULL,      -- Campo para el nombre del usuario, máximo 50 caracteres
    mensaje TEXT NOT NULL,             -- Campo para el contenido del mensaje
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Fecha y hora de creación automática
);
*/

session_start(); // Inicia la sesión para manejar variables globales de usuario

// Configuración de la conexión a la base de datos
$host = "localhost"; // Servidor de base de datos (en este caso, local)
$user = "root";      // Usuario por defecto en XAMPP
$pass = "";          // Contraseña vacía (por defecto en XAMPP)
$db   = "chat_db";   // Nombre de la base de datos que usaremos

// Conexión a MySQL
$conn = new mysqli($host, $user, $pass, $db); // Establece una nueva conexión a la base de datos

// Verifica la conexión
if ($conn->connect_error) { // Si hay un error al conectar
    die("Error de conexión: " . $conn->connect_error); // Detén la ejecución y muestra el error
}

// Lógica para insertar mensajes
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Comprueba si la solicitud es de tipo POST

    if (!empty($_SESSION['usuario'])) { // Si hay un usuario en sesión
        $usuario = $_SESSION['usuario']; // Usa el usuario de la sesión
    } else { // Si no hay usuario en la sesión
        $usuario = $_POST['usuario'];   // Toma el nombre del usuario del formulario
        $_SESSION['usuario'] = $usuario; // Guarda el usuario en la sesión para reutilizarlo
    }

    $mensaje = $_POST['mensaje']; // Obtiene el mensaje enviado desde el formulario

    // Evita entradas vacías
    if (!empty($usuario) && !empty($mensaje)) { // Comprueba que usuario y mensaje no estén vacíos
        $sql = "INSERT INTO mensajes (usuario, mensaje) VALUES ('$usuario', '$mensaje')"; // Inserta el mensaje en la base de datos
        if ($conn->query($sql)) { // Si la consulta se ejecuta correctamente
            // Redirige para evitar reenvío de formulario (Patrón Post/Redirect/Get)
            header("Location: index.php"); // Redirige a la misma página
            exit(); // Detiene la ejecución del script
        } else if (!$conn->query($sql)) { // Si ocurre un error al ejecutar la consulta
            echo "Error al enviar el mensaje: " . $conn->error; // Muestra el error
        }
    }
}

// Recupera los mensajes de la base de datos
$sql = "SELECT * FROM mensajes ORDER BY fecha DESC"; // Selecciona todos los mensajes ordenados por fecha descendente
$result = $conn->query($sql); // Ejecuta la consulta y almacena el resultado
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- Codificación UTF-8 para caracteres especiales -->
    <title>Chat Básico con PHP y MySQL</title>
    <style>
        /* Estilos omitidos porque no requieren comentarios línea por línea */
    </style>
</head>
<body>
    <div class="chat-box">
        <h2>Bienvenido a mi sala de Chat</h2>
        <!-- Lista de mensajes -->
        <div class="mensajes-container">
            <?php if ($result->num_rows > 0) { // Si hay mensajes en la base de datos
                while ($row = $result->fetch_assoc()) { // Recorre cada fila obtenida ?>
                    <div class="mensaje">
                        <strong><?php echo htmlspecialchars($row['usuario']); ?>:</strong> <!-- Nombre del usuario -->
                        <p><?php echo htmlspecialchars($row['mensaje']); ?></p> <!-- Contenido del mensaje -->
                        <small><?php echo $row['fecha']; ?></small> <!-- Fecha y hora del mensaje -->
                    </div>
                <?php }
            } else { // Si no hay mensajes
                echo "<p>Aún no hay mensajes. ¡Escribe el primero!</p>"; // Mensaje por defecto
            } ?>
        </div>

        <!-- Formulario para enviar mensajes -->
        <form method="POST" action="index.php"> <!-- Envío de datos mediante POST -->
            <?php
            if (!empty($_SESSION['usuario'])) { // Si hay un usuario en sesión
                echo '<input type="text" name="usuario" value="' . $_SESSION['usuario'] . '" required disabled>'; // Campo deshabilitado con el nombre
            } else { // Si no hay usuario en sesión
                echo '<input type="text" name="usuario" placeholder="Tu nombre" required>'; // Campo para ingresar el nombre
            }
            ?>
            <textarea name="mensaje" placeholder="Escribe tu mensaje aquí..." rows="3" required></textarea> <!-- Campo para escribir el mensaje -->
            <button type="submit">Enviar</button> <!-- Botón para enviar el formulario -->
            <button onclick="window.location.reload();" style="float: right;">Recargar</button> <!-- Botón para recargar la página -->
        </form>
    </div>
</body>
</html>


<?php
// Cierra la conexión a la base de datos
$conn->close(); // Libera recursos relacionados con la conexión
?>
