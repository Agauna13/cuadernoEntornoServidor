<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Document</title>
</head>

<body>
<?php
/*Ejercicio 1*/
session_start();

if (!isset($_SESSION['n'])) {
    $_SESSION['n'] = 1;
} else {
    $_SESSION['n']++;
}
echo "<h1>Nombre d'accessos a aquesta pàgina: " . $_SESSION['n'] . "</h1>";
?>


</body>



</html>