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
		/* 	Actividad 2: Partiendo de una variable para “nota” que contendrá un valor de 1 a 10, prepara una
			estructura de control para determinar si el alumno esta “suspendido” (nota menor de 5) o aprobado con
			“bien” (6), “Notable” (7 y 8) o “Excelente” (9 y 10).*/
		 
		/* Debido a que la respuesta del ejercicio 2 ya está propuesta de la mejor manera en el propio pdf 
		   intentaré contestar a la 2 y la 3 en este mismo archivo */
		   function random(): float{  /*Función que me comprueba que la nota caiga entre 0 y 10, devuelve 0 antes de hacer una division por 0 */
			$division = rand(0, 10);
			if($division !== 0){
				return 10 / $division;
			}else{
				return 0;
			}
			
		}
		
		$nota = random(); /*Ponemos un Random entre 0 y 10 para que nos genere números aleatorios, al dividir 10 entre el numero random que nos sale, creamos decimales cada vez que se ejecute*/


		
		switch ($nota) {
			case 0:  /*Debido a un enorme misterio, he tenido que aislar el caso '0' porque caía entre el 5 y el 7 por algun motivo*/
				echo "<h1>$nota Un cero, en serio?</h1>";
				break;
			case ($nota < 5) : /*Estableciendo Rangos podemos poner cualquier nota con decimales*/
				echo"<h1> $nota no es suficiente para aprobar, deberías esforzarte más </h1>";
				break;
			case ($nota >=5 && $nota < 7):
				echo "<h1>$nota Muy bien pero te invitamos a mejorar, puedes hacerlo mejor.</h1>" ;
				break;
			case ($nota >= 7 && $nota <= 8.99):
				echo "<h1>$nota Excelente¡ El próximo harás un Perfect¡</h1>" ;
				break;	
			case ($nota >= 9 && $nota <= 10):
				echo "<h1>$nota Perfecto, inmejorable, de aquí a la NASA </h1>";
				break;
			default : "<h1>Introduce una nota entre 0 y 10, nada de letras, que nos conocemos.</h1>";

		}
	?>

</body>

</html>