<?php

session_start();



function connection(){
    $host = "localhost";    // Estamos trabajando en equipo local
    $user = "root";         // Usuario predeterminado en XAMPP
    $pass = "";             // Por defecto no hay contraseña
    $db   = "chat_db_alan_adamson";
    $dsn = "mysql:host=$host;dbname=$db";

    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}

function getUserByUsername($username){
    try {
        $sql = "SELECT * FROM usuarios WHERE username = :username";
        $pdo = connection();
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve todos los resultados
    } catch (PDOException $e) {
        die("Error en la consulta: " . $e->getMessage());
        
    }
}


function verifyPassword($username, $pass){

    try {
        $pdo = connection();
        $stmt = $pdo->prepare("SELECT password FROM usuarios WHERE username = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $user['password'] !== null) {
            return password_verify($pass, $user['password']);
        } else {
            return false;
        }
    } catch (PDOException $e) {
        error_log("Error en verifyPassword: " . $e->getMessage());
        return false;
    }

}

function obtenerMensajes(){

    try{
        $pdo = connection();
        $stmt = $pdo->prepare("SELECT * FROM mensajes ORDER BY fecha DESC");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

        
    }catch(Exception $e){
        
        error_log("error al obtener los mensajes " . $e->getMessage());
    }

}
//consulta preparada con una transaction, es la unica donde tiene algo de sentido ya que es la que hace un update en la base de datos
function insertarMensaje($username, $mensaje) {
    try {
        $pdo = connection();
        $pdo->beginTransaction();
        $stmt = $pdo->prepare("INSERT INTO mensajes (usuario, mensaje) VALUES (:usuario, :mensaje)");
        $stmt->bindParam(':usuario', $username, PDO::PARAM_STR);
        $stmt->bindParam(':mensaje', $mensaje, PDO::PARAM_STR);
        $stmt->execute();
        $pdo->commit();
        return true;
    } catch (Exception $e) {
        $pdo->rollback();
        error_log("Error al insertar el mensaje: " . $e->getMessage());
        return false;
    }
}