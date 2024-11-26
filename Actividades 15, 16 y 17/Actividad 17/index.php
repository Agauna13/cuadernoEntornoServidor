<?php

require "Movil.php";
require "Tablet.php";

$samsung = new Movil("Samgung", "603807972");
$ipad = new Tablet("ipad", "ipad Mini");

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
    }
    .samsung{
        background-color: rgba(0, 50, 255, 0.5);
        color: white;
        text-align: center;
    }

    .sobrevalorado{
        background-color: lightgray;
        color: white;
        text-align: center;
    }
</style>

<body>


    <div class="samsung">
        <p><?php echo $samsung->connectBluetooth($samsung->getNombre()); ?></p>

        <p><?php echo $samsung->disconnectBluetooth($samsung->getNombre()); ?></p>

        <p><?php echo $samsung->connectWifi($samsung->getNombre()); ?></p>

        <p><?php echo $samsung->disconnectWifi($samsung->getNombre()); ?></p>


        <p><?php echo $samsung->llamar(685522020); ?></p>

    </div>



    <div class="sobrevalorado">

        <p><?php echo $ipad->connectBluetooth($ipad->getNombre()); ?></p>

        <p><?php echo $samsung->disconnectBluetooth($ipad->getNombre()); ?></p>

        <p><?php echo $samsung->connectWifi($ipad->getNombre()); ?></p>

        <p><?php echo $samsung->disconnectWifi($ipad->getNombre()); ?></p>


        <p><?php echo $ipad->leerLibro("El ciclo de la puerta de la muerte "); ?> En <?php echo $ipad->mostrarModelo(); ?></p>

    </div>

</body>

</html>