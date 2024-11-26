<?php

require "./Circulo.php";
require "./Rectangulo.php";
require "./Triangulo.php";
//require "./Forma.php";


$circulo = new Circulo(30);
$rectangulo = new Rectangulo(20, 50);
$triangulo = new Triangulo(10, 15);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Areas geométricas</h2>
    <p>Nuestro círculo tiene un Radio de <?php echo $circulo->getRadio();?> y un área de <?php echo $circulo->calcularArea();?>. El perimetro es <?php echo $circulo->calcularPerimetro()?></p>

    <p>Nuestro Rectangulo tiene una base <?php echo $rectangulo->getBase(); ?>, una altura de <?php echo $rectangulo->getAltura();?>  y un área de <?php echo $rectangulo->calcularArea(); ?>. el perimetro es <?php echo $rectangulo->calcularPerimetro()?> </p>

    <p>Nuestro triangulo tiene una base <?php echo $triangulo->getBase()?>, una altura de <?php echo $triangulo->getAltura()?> y un area de <?php echo $triangulo->calcularArea() ?>. El perimetro es <?php echo $triangulo->calcularPerimetro() ?></p>
</body>
</html>