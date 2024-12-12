<?php
require_once 'connection.php';

try{
    $host = "localhost";
$dbname = "dwes";
$usuario = "root";
$password = "";
$pdo = conectarBBDD("mysql", $host, $dbname, "utf8mb4", $usuario, $password);

$notas = mostrarNotas($pdo, $_SESSION['username']);
//echo json_encode($notas);
/*var_dump($_SESSION['username']);
var_dump($_SESSION['userId']);*/

}catch(PDOException $e){
    "error al Consultar la base de datos " . $e->getMessage();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
</head>
<body>
    <h1><?php echo $_SESSION['username']; ?> </h1>

    <h2>Notas</h2>

    <div>
        <?php 
        // Comprobamos si hay resultados
        if ($notas) {
            echo "<table border='1'>";
            echo "<tr><th>Asignatura</th><th>Nota</th></tr>";
            
            foreach ($notas as $nota) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($nota['asignatura_nombre']) . "</td>";
                echo "<td>" . htmlspecialchars($nota['nota']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No hay notas disponibles.</p>";
        }
        ?>
    </div>

    <form action="intranet.php">
        <button type="submit">Volver</button>
    </form>
</body>
</html>