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
		/*Actividad 4: Empleando estructuras de control de errores o excepciones (try... catch) e “if”, comprobar si
		una variable string contiene solo letras o no, y, si solo contiene letras, verificar si contiene la palabra
		“name” en su valor, independientemente de las mayusculas y minusculas. La variable inicial tiene el
		nombre y el valor siguiente: $name = "Nam11e", esta debe dar aviso de que “contiene caracteres
		diferentes de a-z A-Z”. Con el mismo codigo, modificar el valor de la variable inicial tal que: $name =
		"NamE". En este caso, se debe devolver “contiene la palabra name”. En caso de no cumplir ninguna de las
		condiciones previas, devolver el mensaje “introducir nombre nuevamente”.*/
		
		
		$palabra = "als123456kdjfasdnamekjf";
		$palabra = strtolower($palabra);
		$name = "name";
		$pos = strpos($palabra, $name);
		
		

		/** La estructura de control try//catch como en el resto de lenguajes (que conozco) funciona indicandole que intente el bloque de código 
		 * que le metamos al try, capturando el posible error que pueda arrojar e imprimiendo o ejecutando el error que le pongamos en el catch. 
		 * En algunos casos se utiliza la 3ra parte (finally) para ejecutar alguna otra función al salir de la estructura de control. Ésta última
		 * se ejecuta pase lo que pase, haya o no haya error
		 */

		try{
			if(preg_match("/[0-9]/" , $palabra)){  /** Explicación sobre la función preg_match() -> https://www.php.net/manual/es/function.preg-match.php */
				throw new Exception("La cadena insertada contiene numeros.");
			}else if($pos === false){		
				throw new Exception("La cadena no contiene name.");
			}else if(preg_match("/[name][0-9]{0}/", $palabra)){
				echo"la cadena contiene name sin numeros.";
			}

		}catch( Exception $e ) {
			echo "Excepcion capturada: ". $e->getMessage() ."";
		}
		
	
	?>

</body>

</html>