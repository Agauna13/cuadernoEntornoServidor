<?php
    require 'Coche.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        $coche = new Coche('Toyota', 'Corolla', 'Rojo', 180);

        echo $coche->mostrarDetalles();
    ?>


</body>

</html>