<?php

require 'biblioteca/Ciencia/Autor.php';

require 'biblioteca/Ciencia/Libro.php';

require 'biblioteca/Ficcion/Autor.php';

require 'biblioteca/Ficcion/Libro.php';




use biblioteca\Ficcion\Libro as LibroFiccion;
use biblioteca\Ficcion\Autor as AutorFiccion;
use biblioteca\Ciencia\Libro as LibroCiencia;
use biblioteca\Ciencia\Autor as AutorCiencia;

$philipKDick = new AutorFiccion('Philip K. Dick', 'US');
$richardDawkins = new AutorCiencia('Richard Dawkins', 'Kenia');

$bladeRunner = new LibroFiccion('Sueñan los androides con ovejas mecanicas?', 1968, $philipKDick);
$elGenEgoista = new LibroCiencia('El Gen Egoísta', 1976, $richardDawkins);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
            width: 1000px;
            margin: 0 auto;
        }
        .biblioteca{
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }
    </style>
</head>

<body>
    <h1>Biblioteca</h1>

    <div class="biblioteca">
        <div class="libro">
            <?php
            echo $bladeRunner->mostrarDatos();
            ?>
        </div>

        <div class="libro">
            <?php
            echo $elGenEgoista->mostrarDatos();
            ?>
        </div>
    </div>
</body>

</html>