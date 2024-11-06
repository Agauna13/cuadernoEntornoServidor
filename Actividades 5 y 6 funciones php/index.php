<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Document</title>
</head>

<body>
	
	<h1>Actividad 5</h1>
	<FORM ACTION="index.php" METHOD="POST">
		<INPUT TYPE="text" NAME="palabra" placeholder="Introduzca una palabra">
		<INPUT TYPE="text" NAME="palabra2" placeholder="Introduzca otra palabra">
		<BR>

		<INPUT TYPE="submit" VALUE="Enviar">

	</FORM>

	<?php


	/**
	 * Un array asociativo de variables pasadas al script actual a través del método POST de HTTP cuando se
	 * emplea application/x-www-form-urlencoded o multipart/form-data como Content-Type de HTTP en la petición.
	 */

		$str1 = $_POST['palabra'];
		$str2 = $_POST['palabra2'];

		echo repeticiones($str1, $str2);
		function repeticiones($str1, $str2){
			$len1 = strlen($str1);
			$len2 = strlen($str2);
			$count = 0;

			for ($i = 0; $i <= $len1 - $len2; $i++) {
				$subs = substr($str1, $i, $len2);
				if ($subs == $str2) {
					$count++;
				}
			}

			return $count;
		}
	?>

		<h1>Actividad 6</h1>
		
		<FORM ACTION="index.php" METHOD="POST">
		<INPUT TYPE="text" NAME="arr" placeholder="Introduzca lista de numeros y he dicho numeros, no me seas...">
		<INPUT TYPE="number" NAME="arr2" placeholder="Introduzca numero a buscar">
		<BR>

		<INPUT TYPE="submit" VALUE="Enviar">


		<?php

		/* He optado por pedir por formulario una cadena de numeros, crear un array de los mismos y operar. */ 
		
		$arr = $_POST['arr'];
		$num = $_POST['arr2'];

		$arr = str_split($arr);
		$greater = 0;
		$smaller = 0;
		$same = 0;

		for($i = 0; $i< count($arr); $i++) {
			if($num == $arr[$i]){
				$same++;
			}else if($num > $arr[$i]){
				$smaller++;
			}else{
				$greater++;
			}

			echo 'Numero '.$arr[$i] . ' ';
			echo'<br>';
		}

		
		echo('mayores ' . $greater . ', Menores: ' . $smaller .', Iguales: '.$same);
		echo'<br>';

		?>

	</FORM>


</body>



</html>