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
		/* Actividad 1: Partiendo de la variable: $today = date("D"); Mediante estructura de control, devolver un
			html que indique el día de la semana y un texto exclusivo para ese día. También tiene que devolver un
			texto en caso de que la variable no informe del día.*/
		 
		$today = date("D");
		echo date("l <br>");
		switch($today){
			case "Mon":
				echo "Vaya perezaa";
				break;
			case "Tue":
				echo "empezamos a calentar";
				break;
			case "Wed":
				echo "cuando se acabará esta semana?";
				break;
			
			case "Thu":
				echo "ya casi";
				break;
			case "Fri":
				echo "Yuhuuu, findee";
				break;
			case "Sat":
				echo "A descansar¡¡";
				break;
			case "Sun":
				echo "No quiero que sea mañana :'(";
			break;

			default: echo "No me seas, pásame un día de verdad";
		}

	?>

	<?php

	?>

</body>

</html>