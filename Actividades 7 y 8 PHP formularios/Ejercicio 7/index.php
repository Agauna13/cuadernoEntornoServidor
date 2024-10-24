<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Document</title>
</head>

<body>
	<h1>Ejercicio 7</h1>

	<FORM ACTION="index.php" METHOD="POST">
		<INPUT TYPE="number" NAME="kw" placeholder="Please enter nº of units">
		<br>
		<INPUT TYPE="submit" VALUE="Enviar">
		
	</FORM>


	<?php

		$consumo = $_POST['kw'];
		
		if($consumo < 100){
			$consumo;
		}else if($consumo > 100 && $consumo <= 200){
			$consumo  = 100 + (($consumo - 100) * 2);
		}else if($consumo > 200 && $consumo <= 300){
			$consumo = 300 + (($consumo - 200) * 3);
		}else if($consumo > 300){
			$consumo = 100 + (100 * 2) + (100 * 3) + (($consumo - 300) *4);
		}
	?>
	
	<INPUt value = "<?php echo $consumo ?>">
</body>



</html>