<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Document</title>
</head>

<body>
	<h1>Actividad 8</h1>
	<FORM ACTION="index.php" METHOD="POST">
		<INPUT TYPE="number" NAME="n1" placeholder="Please enter nº of units">
		<br>
		<INPUT TYPE="number" NAME="n2" placeholder="Please enter nº of units">
		<br>
		
		<br>
		<INPUT TYPE="submit" name="calc" VALUE="add">
		<br>
		<INPUT TYPE="submit" name="calc" VALUE="substract">
		<br>
		<INPUT TYPE="submit" name="calc" VALUE="Multiply">
		<br>
		<INPUT TYPE="submit" name="calc" VALUE="Divide">

		<?php
			$n1 = $_POST['n1'];
			$n2 = $_POST['n2'];

			$calc = $_POST['calc'];
			$result = 0;
			switch($calc){
				case 'add':
					$result = $n1 + $n2;
					break;
				case 'substract':
					$result = $n1 - $n2;
					break;
				case 'Multiply':
					$result = $n1 * $n2;
					break;
				case 'Divide':
					if($n2 != 0){
						$result = $n1 / $n2;
					}else{
						$result = "No seas así, no me dividas por 0";
					}
					break;
				default:
				 	$result = "Math.Error";
			}

		
		?>

		<INPUt style = "width:max-content" value = "<?php print($result) ?>" placeholder="Resultado">
		
	</FORM>

</body>



</html>