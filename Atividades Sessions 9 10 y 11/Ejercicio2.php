<?php
session_start();

// Inicializa las variables de sesión si no están definidas
if (!isset($_SESSION['suma'])) {
	$_SESSION['suma'] = 0;
}
if (!isset($_SESSION['comptador'])) {
	$_SESSION['comptador'] = 0;
}

// Comprueba si se ha enviado un número
if (isset($_POST['numero'])) {
	$numero = floatval($_POST['numero']);
	$_SESSION['suma'] += $numero;
	$_SESSION['comptador']++;

	// Si la suma supera 10.000, muestra el resultado
	if ($_SESSION['suma'] >= 10000) {
		$mitjana = $_SESSION['suma'] / $_SESSION['comptador'];
		echo "<h1>Total acumulado: " . $_SESSION['suma'] . "</h1>";
		echo "<h2>Contador de números introducidos: " . $_SESSION['comptador'] . "</h2>";
		echo "<h3>Media: " . $mitjana . "</h3>";

		// Reinicia las variables de sesión
		session_destroy(); // Opcional: si quieres reiniciar la sesión
		exit; // Detiene la ejecución del script
	}
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contador de Números</title>
</head>

<body>
	<h1>Introduce números (suma máxima: 10.000)</h1>
	<form method="post">
		<input type="number" name="numero" step="any" required>
		<input type="submit" value="Añadir">
	</form>
	<h2>Total acumulado: <?php echo $_SESSION['suma']; ?></h2>
	<h3>Número de números introducidos: <?php echo $_SESSION['comptador']; ?></h3>


</body>

</html>