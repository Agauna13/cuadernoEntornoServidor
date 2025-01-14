<?php

session_start();
/*
Crear chat_db_def y la tabla mensajes (si no existen):

CREATE DATABASE IF NOT EXISTS chat_db_def;

USE chat_db_def;

CREATE TABLE IF NOT EXISTS mensajes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    mensaje TEXT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255)
);
*/
/**
 * Instanciamos los datos de acceso a la base de datos
 */
$host = "localhost";    // Estamos trabajando en equipo local
$user = "root";         // Usuario predeterminado en XAMPP
$pass = "";             // Por defecto no hay contraseña
$db   = "chat_db_alan_adamson";

try {
    $dsn = "mysql:host=$host"; //Creamos el dsn que usaremos para pasar como parámetro el nombre de usuario de la base de datos
    $pdo = new PDO($dsn, $user, $pass); //Declaramos el objeto PDO pasando como parametro el DSN de antes y le introducimos el usuario y contraseña para acceder a la base de datos
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Para poder hacer manejo de errores con PDO

    $pdo->exec("CREATE DATABASE IF NOT EXISTS $db"); //ejecutamos la query para crear la base de datos en caso de que no exista
    $pdo->exec("USE $db");//nos ponemos 'dentro' de la base de datos creada, es decir la 'usamos'

    $pdo->exec("CREATE TABLE IF NOT EXISTS mensajes ( 
        id INT AUTO_INCREMENT PRIMARY KEY,
        usuario VARCHAR(50) NOT NULL,
        mensaje TEXT NOT NULL,
        fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");//query para crear la tabla mensajes, con un id autoincremental PK, un usuario no nulo de 50 caracteres, un mensaje de texto no nulo y la fecha y hora del momento en el que se ejecuta la query

    $pdo->exec("CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255)
    )");//creamos la tabla usuarios con un id PK autoincremental, un nombre de usuario que no se puede repetir de 50 caracteres como maximo y una contraseñan de maximo 255 caracteres en de tipo string

    $stmt = $pdo->prepare("INSERT IGNORE INTO usuarios (username, password) VALUES (:username, :password)"); //query para insertar usuarios dentro de la tabla
    $adminPassword = password_hash("admin", PASSWORD_DEFAULT); //hasheamos la contraseña 'admin'
    $stmt->execute([':username' => 'admin', ':password' => $adminPassword]); //asociamos los parametros para que puedan insertarse en la query preparada
    $stmt->execute([':username' => 'invitado', ':password' => NULL]); //inserción de un invitado con contraseña 'null'
    //insertanto usuario nuevo
    $newUserPassword = password_hash('12345', PASSWORD_DEFAULT); //hasheamos la contraseña
    $stmt->execute([':username' => 'alan', ':password'=>$newUserPassword]);  //creamos el usuario alan con la contraseña hasheada arriba

} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}