<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases Coche</title>
    <link rel="stylesheet" href="css/basico.css">
</head>
<body>
    <?php
        include('coche.php');

        $miCoche = new Coche();

        // 1º
        echo "<h1>Datos del coche</h1>";

        echo "<ul>";
        echo "<li>Marca: ". $miCoche->getMarca() . "</li>";
        echo "<li>Modelo: ". $miCoche->getModelo() . "</li>";
        echo "<li>Color: ". $miCoche->getColor() . "</li>";
        echo "<li>Caballos: ". $miCoche->getCaballos() . "</li>";
        echo "<li>Velocidad: ". $miCoche->getVelocidad() . "</li>";
        echo "<li>Plazas: ". $miCoche->getPlazas() . "</li>";
        echo "</ul>";

        // 2º
        $nuevoColor = "Amarillo";
        echo "<h2>Cambiamos el color del coche y lo ponemos amarillo</h2>";

        $miCoche->setColor($nuevoColor);
        echo "<p>El nuevo color de mi coche es: ". $miCoche->getColor() ."</p>";

        // 3º
        echo "<h2>Mi coche va a acelerar 4 veces y frenar una vez</h2>";

        $miCoche->acelerar()->acelerar()->acelerar()->acelerar()->frenar();
        echo "<p>Esta es ahora la velocidad del coche: ". $miCoche->getVelocidad() ."</p>";

        // 4º
        $otroCoche = new Coche(color: "Verde", modelo: "Gallardo");
        echo "<h1>Datos del nuevo coche</h1>";

        echo "<ul>";
        echo "<li>Marca: ". $otroCoche->getMarca() . "</li>";
        echo "<li>Modelo: ". $otroCoche->getModelo() . "</li>";
        echo "<li>Color: ". $otroCoche->getColor() . "</li>";
        echo "<li>Caballos: ". $otroCoche->getCaballos() . "</li>";
        echo "<li>Velocidad: ". $otroCoche->getVelocidad() . "</li>";
        echo "<li>Plazas: ". $otroCoche->getPlazas() . "</li>";
        echo "</ul>";


    ?>
</body>
</html>