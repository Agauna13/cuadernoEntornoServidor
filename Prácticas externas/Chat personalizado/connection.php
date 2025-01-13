<?php

session_start();

function connection()
{
    $config = require "config/config.php";

    $conn = new mysqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);

    if ($conn->connect_error) {
        die("Error de conexión " . $conn->connect_error);
    }

    return $conn;
}

function getUserByUserName($username)
{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $connection = connection();
        $stmt = $connection->prepare("SELECT nombre_usuario FROM usuarios WHERE nombre_usuario = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['nombre_usuario'];
        } else {
            $_SESSION['errorbd'] = "No se encontró un usuario con el nombre de usuario introducido";
            return null;
        }

        $stmt->close();
    } catch (Exception $e) {
        die("Error al obtener el nombre de usuario " . $e->getMessage());
    }
}

function getUserId($username){
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    if(getUserByUserName($username)){

        try{
            $connection = connection();

            $stmt = $connection->prepare("SELECT id FROM usuarios WHERE nombre_usuario = ?");
            $stmt->bind_param("s", $username);

            $stmt->execute();

            $result = $stmt->get_result();

            if($result->num_rows >0){
                $row = $result->fetch_assoc();
                return $row['id'];
            }else{
                $_SESSION['errorbd'] = "No se encontró el id del usuario";
                return false;
            }
        }catch(Exception $e){
            error_log("Error al intentar obtener el id del usuario " . $e->getMessage());
        }
        
    }

    
}

function verifyPassword($username, $pass)
{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    if(getUserByUserName($username)){
        try {
            $connection = connection();
            $stmt = $connection->prepare("SELECT pass FROM usuarios WHERE nombre_usuario = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
    
            $result = $stmt->get_result();
    
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $dbData = $row['pass'];
    
                return password_verify($pass, $dbData);
            } else {
                $_SESSION['errobd'] = "Usuario no encontrado.";
                return false;
            }
    
    
            $stmt->close();
        } catch (Exception $e) {
            error_log("Error al consultar la base de datos en verifyPassword " . $e->getMessage());
            return false;
        }
    }else{
        return false;
    }
    
}

function createUser($username, $pass)
{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


    if(!getUserByUserName($username)){
        $encripted = password_hash($pass, PASSWORD_BCRYPT);
    try {
        $connection = connection();

        $stmt = $connection->prepare("INSERT INTO usuarios(nombre_usuario, pass) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $encripted);
        $result = $stmt->execute();
        $stmt->close();
        $connection->close();
        return $result;
    } catch (Exception $e) {
        error_log("Error al introducir el usuario a la base de datos " . $e->getMessage());
        return false;
    }
    }else{
        $_SESSION["error"] = "El usuario ya existe, consulte con el administrador.";
    }
    
}

function deleteUser($username) {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try{
        $connection = connection();

        $stmt =  $connection->prepare("DELETE * FROM usuarios WHERE nombre_usuario = ?");
        $stmt->bind_param("s", $username);
        $result = $stmt->execute();

        $stmt->close();
        $connection->close();

        return $result;
    }catch(Exception $e){
        error_log("Error al borrar el usuario " . $e->getMessage());
        return false;
    }
}

function checkState($username){
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    if(getUserByUserName($username)){
        try{
            $connection = connection();

            $stmt = $connection->prepare("SELECT estado FROM usuarios WHERE nombre_usuario = ?");
            $stmt->bind_param("s", $username);
            $result = $stmt->execute();

            $stmt->close();
            $connection->close();

            return $result;
        }catch(Exception $e){
            error_log("No se ha podido comprobar el estado del usuario " . $e->getMessage());
        }
    }else{
        $_SESSION['error'] = "usuario no encontrado.";
    }
}


function setState($username, $state){
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    if(getUserByUserName($username)){
        try{
            $connection = connection();

            $stmt = $connection->prepare("UPDATE usuarios SET estado = ? WHERE nombre_usuario = ?");
            $stmt->bind_param("is", $state, $username);
            $result = $stmt->execute();

            $stmt->close();
            $connection->close();

            return $result;
        }catch(Exception $e){
            error_log("No se ha podido actualizar el estado " . $e->getMessage());
            return false;
        }
    }
}



function banUser($username, $blockedUser, $blockUnblock) {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $idBloqueador = getUserId($username);
    $idUsuarioBloqueado = getUserId($blockedUser);
    if($blockUnblock){//Si es true estamos bloqueando al usuario
        try{
            $connection = connection();
    
            $stmt = $connection->prepare("INSERT INTO baneos(id_usuario_baneador, id_usuario_baneado) VALUES (?, ?)");
            $stmt->bind_param("ii", $idBloqueador, $idUsuarioBloqueado);
            $result = $stmt->execute();
            $stmt->close();
            $connection->close();
            return $result;
        }catch(Exception $e){
            error_log("Error al introducir la relacion de bloqueo " . $e->getMessage());
        }

    }
    
}



//Funciones para mensajes

function setMessage($sender, $remitent, $message){
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $idSender = getUserId($sender);
    $idRemitent = getUserId($remitent);

    try{
        $connection = connection();

        $stmt = $connection->prepare("INSERT INTO mensajes(id_usuario, id_destinatario, mensaje) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $idSender, $idRemitent, $message);
        $result = $stmt->execute();
        $stmt->close();
        $connection->close();

        return $result;
    }catch(Exception $e){
        error_log("Error al guardar el mensaje");
        return false;
    }

}

function getConversation($sender, $remitent){
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $idSender = getUserId($sender);
    $idRemitent = getUserId($remitent);

    try{
        $connection = connection();

        $stmt = $connection->prepare("SELECT * FROM mensajes WHERE id_usuario = ? AND id_destinatario = ?");
        $stmt->bind_param("iis", $idSender, $idRemitent);
        $stmt->execute();
        $result = $stmt->get_result();

        $messages = [];
        while ($row = $result->fetch_assoc()) {
            $messages[] = $row;  // Guardamos cada fila en el array
        }


        $stmt->close();
        $connection->close();

        return $messages;
    }catch(Exception $e){
        error_log("Error al Obtener la conversacion " . $e->getMessage());
        return false;
    }
    /* Para tratar los datos
    $sender = 'Juan';
$remitent = 'Maria';

// Llamamos a la función para obtener todos los datos de la conversación
$conversation = getConversation($sender, $remitent);

if ($conversation !== false) {
    // Ahora puedes acceder a los mensajes y desglosarlos
    foreach ($conversation as $message) {
        $id = $message['mensaje_id'];
        $mensaje = $message['mensaje'];
        $fecha = $message['fecha'];
        $idUsuario = $message['id_usuario'];
        $idDestinatario = $message['id_destinatario'];

        echo "Mensaje: $mensaje <br>";
        echo "Fecha: $fecha <br>";
        echo "ID Usuario: $idUsuario <br>";
        echo "ID Destinatario: $idDestinatario <br><br>";

        // Aquí puedes hacer más cosas con cada mensaje, como aplicar lógica adicional o guardarlos en otro formato
    }
} else {
    echo "Hubo un error al obtener la conversación.";
}
*/
}

function markAsRead($sender, $remitent){
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $remitentId = getUserId($remitent);
    $senderId = getUserId($sender);
    try{
        $connection = connection();

        $stmt = $connection->prepare("UPDATE mensajes SET estado = 1 WHERE id_destinatario = ? AND id_usuario = ?");
        $stmt->bind_param("ii", $senderId, $remitentId);
        $result = $stmt->execute();
        $stmt->close();
        $connection->close();

        return $result;
    }catch(Exception $e){
        error_log("Error al Actualizar el estado del mensaje " . $e->getMessage());
        return false;
    }
}


function checkIfNewMessage($sender, $remitent){
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $remitentId = getUserId($remitent);
    $senderId = getUserId($sender);
    try{
        $connection = connection();

        $stmt = $connection->prepare("SELECT * FROM mensajes WHERE estado = 0 AND (id_destinatario = ? AND id_usuario = ?)");
        $stmt->bind_param("ii", $senderId, $remitentId);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $connection->close();

        return $result->num_rows > 0;
    }catch(Exception $e){
        error_log("Error al Comprobar Mensajes " . $e->getMessage());
        return false;
    }
}


/*function databaseLink($query, $types, $errorbd, $erroLog, $returnData, ...$values){
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try{
        $connection = connection();
        $stmt = $connection->prepare($query);
        $stmt->bind_param($types, ...$values);
        $result = $stmt->execute();
    }
} Pendiente hacer funcion polivalente para consultar la base de datos*/