<?php
session_start();

function conectarBBDD(
    $tipo = "mysql",
    $host,
    $dbname,
    $charset = "utf8mb4",
    $usuario = "root",
    $password = ""
) {
    try {
        $dsn = "$tipo:host=$host;dbname=$dbname;charset=$charset";
        $pdo = new PDO($dsn, $usuario, $password);
        // Establecer el modo de error de PDO a Excepción
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        // En caso de error, detener el script y mostrar mensaje
        die("Error al conectar a la base de datos: " . $e->getMessage());
    }
}

function getUserByName(PDO $pdo, $username)
{
    try {
        $sql = "SELECT * FROM usuarios WHERE nombre = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve todos los resultados
    } catch (PDOException $e) {
        die("Error en la consulta: " . $e->getMessage());
    }
}

function getUserByUsername(PDO $pdo, $username)
{
    try {
        $sql = "SELECT * FROM usuarios WHERE nombre_usuario = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($result)) {
            return false;
        } else {
            return true;
        }
    } catch (PDOException $e) {
        echo "Error al consultar la base de datos " . $e->getMessage();
    }
}

function getUserId(PDO $pdo, $username)
{
    try {
        $sql = "SELECT id FROM usuarios WHERE nombre_usuario = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['userId'] = $result['id'];
        return $result['id'];
    } catch (PDOException $e) {
        echo "Error al consultar la base de datos " . $e->getMessage();
    }
}

function checkPassword(PDO $pdo, $username, $password)
{
    try {
        $sql = "SELECT `password` FROM usuarios WHERE nombre_usuario = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return password_verify($password, $result['password']);
    } catch (PDOException $e) {
        die("Error al consultar la base de datos " . $e->getMessage());
    }
}

function checkEstado(PDO $pdo, $username)
{
    try {
        $sql = "SELECT estado FROM usuarios WHERE nombre_usuario = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result['estado'] === 1) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        die("Error al consultar la base de datos " . $e->getMessage());
    }
}


function dropUser(PDO $pdo, $username)
{
    try {
        if (checkEstado($pdo, $username)) {
            $sql = "UPDATE usuarios SET estado = 0 WHERE nombre_usuario = :username";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
        } else {
            $_SESSION['errorConsulta'] = "El usuario se encuenta incactivo";
            header("Location: index.php");
            exit();
        }
    } catch (PDOException $e) {
        die("Error al actualizar la base de datos " . $e->getMessage());
    }
}

function newUser(PDO $pdo, $nameOfUser, $surnameOfUser, $username, $password)
{
    try {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO usuarios(nombre, apellido, nombre_usuario, `password`, estado) VALUES ('$nameOfUser', '$surnameOfUser', '$username', '$password', 1);";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        matriculaDwes($pdo, $username);
    } catch (PDOException $e) {
        die("Error al insertar los datos " . $e->getMessage());
    }
}


function matriculaDwes(PDO $pdo, $username)
{
    try {
        $id = getUserId($pdo, $username);
        $sql = "INSERT INTO alumnos_asignaturas (alumno_id, asignatura_id, nota) SELECT $id , id, NULL FROM asignaturas;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error al insertar los datos " . $e->getMessage());
    }
}

function mostrarNotas(PDO $pdo, $username)
{
    try {
        $id = getUserId($pdo, $username);
        $sql = "SELECT usuarios.nombre AS usuario_nombre, asignaturas.nombre AS asignatura_nombre, alumnos_asignaturas_1.nota
                FROM usuarios 
                JOIN alumnos_asignaturas AS alumnos_asignaturas_1 
                    ON usuarios.id = alumnos_asignaturas_1.alumno_id 
                JOIN asignaturas 
                    ON alumnos_asignaturas_1.asignatura_id = asignaturas.id 
                WHERE usuarios.id = :id;";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        "Error al consultar la Base de datos " . $e->getMessage();
    }
}
