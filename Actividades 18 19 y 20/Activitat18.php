<?php
require_once 'connection.php';

try {
    // Datos para la conexión
    $host = "localhost"; // Cambiar por la dirección IP del servidor
    $dbname = "practica";    // Cambiar por el nombre de la base de datos si es diferente
    $usuario = "root";   // Usuario de la base de datos
    $password = "";      // Contraseña de la base de datos

    // Conexión a la base de datos
    $pdo = conectarBBDD("mysql", $host, $dbname, "utf8mb4", $usuario, $password);
    echo "Conexión exitosa.\n";

    // Consultar usuarios por nombre
    $nombreUsuario = "alan"; // Cambiar por un valor existente en la tabla Usuarios
    $usuarios = getUserByName($pdo, $nombreUsuario);

    // Mostrar los resultados
    if (count($usuarios) > 0) {
        echo "Resultados encontrados:\n";
        foreach ($usuarios as $usuario) {
            echo "ID: " . $usuario['ID'] . ", Nombre: " . $usuario['nombre'] . "\n";
            
        }
    } else {
        echo "No se encontraron resultados para el nombre de usuario: $nombreUsuario.\n";
    }
} catch (Exception $e) {
    echo "Ha ocurrido un error: " . $e->getMessage();
}
?>
