<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Funciones Predefinidas</title>
</head>
<body>
    <?php
        function comparaPalabras($palabraUno, $palabraDos) {
            if (!strcmp($palabraUno,$palabraDos)) {
                echo "Las palabras son iguales";
            }elseif (strcmp($palabraUno, $palabraDos) < 0){
                echo "La palabra '". $palabraUno ."' es menor que la palabra '". $palabraDos ."'";
            }else{
                echo "La palabra '". $palabraUno ."' es mayor que la palabra '". $palabraDos ."'";
            }
        }

        function minuscula($fraseMin) {
            echo "<br> La frase en minusculas es: ". strtolower($fraseMin); 
        }

        function mayuscula($fraseMay) {
            echo "<br> La frase en mayusculas es: ". strtoupper($fraseMay);
        }

        function compruebaFrase ($fraseComp, $palabraComp) {
            if (strpos($fraseComp, $palabraComp)) {
                echo "<br> (con strpos) La palabra '". $palabraComp ."' esta en la posicion ".strpos($fraseComp, $palabraComp);
            }else {
                echo "<br> (con strpos) La palabra '". $palabraComp ."' no esta en la frase";
            }
    
            if (str_contains($fraseComp, $palabraComp)) {
                echo "<br> (con str_contains) La palabra '". $palabraComp ."' esta en la frase ";
            }else {
                echo "<br> (con str_contains) La palabra '". $palabraComp ."' no esta en la frase";
            }   
        }
        
        function compruebaInicioFin ($frase, $palabra) {
            if (str_starts_with($frase, $palabra)) {
                echo "<br> La frase comienza con la palabra '". $palabra ."'";
            }else {
                echo "<br> La frase no comienza con la palabra '". $palabra ."'";
            }
    
            if (str_ends_with($frase, $palabra)) {
                echo "<br> La frase acaba con la palabra '". $palabra ."'";
            }else {
                echo "<br> La frase no abaca con la palabra '". $palabra ."'";
            }
        }
    
    ?>
    <h3>Ejercicio 1.- Comprobar Palabras</h3>
    <form method="post" action="">
        <label for="palabraUno">Indica una palabra: </label>
        <input type="text" id="palabraUno" name="palabraUno"><br><br>
        <label for="palabraDos">Indica una palabra: </label>
        <input type="text" id="palabraDos" name="palabraDos"><br>
        <input type="submit" value="Enviar"><br><br>
    </form>

    <?php
        $palabraUno = null;
        $palabraDos = null;

        if (isset($_POST['palabraUno']) && !empty($_POST['palabraUno']) && isset($_POST['palabraDos']) && !empty($_POST['palabraDos'])) {
            $palabraUno = htmlspecialchars($_POST['palabraUno']);
            $palabraDos = htmlspecialchars($_POST['palabraDos']);
        }

        comparaPalabras($palabraUno, $palabraDos);
    ?>
    <hr>

    <h3>Ejercicio 2 y 3.- Minuscula y Mayuscula</h3>
    <form method="post" action="">
        <label for="fraseMin">Indica una frase (Mayuscula): </label>
        <input type="text" id="fraseMin" name="fraseMin"><br><br>
        <label for="fraseMay">Indica otra frase (Minuscula): </label>
        <input type="text" id="fraseMay" name="fraseMay"><br>
        <input type="submit" value="Enviar"><br>
    </form>

    <?php
        $fraseMin = null;

        if (isset($_POST['fraseMin']) && !empty($_POST['fraseMin'])) {
            $fraseMin = htmlspecialchars($_POST['fraseMin']);
        }

        minuscula($fraseMin);

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $fraseMay = null;

        if (isset($_POST['fraseMay']) && !empty($_POST['fraseMay'])) {
            $fraseMay = htmlspecialchars($_POST['fraseMay']);
        }

        mayuscula($fraseMay);
    ?>
    <hr>

    <h3>Ejercicio 4.- Comprobar la palabra en la frase</h3>
    <form method="post" action="">
        <label for="fraseComp">Indica una nueva frase: </label>
        <input type="text" id="fraseComp" name="fraseComp"><br><br>
        <label for="palabraComp">Indica una palabra: </label>
        <input type="text" id="palabraComp" name="palabraComp"><br>
        <input type="submit" value="Enviar"><br><br>
    </form>

    <?php
        $fraseComp = null;
        $palabraComp = null;

        if (isset($_POST['fraseComp']) && !empty($_POST['fraseComp']) && isset($_POST['palabraComp']) && !empty($_POST['palabraComp'])) {
            $fraseComp = htmlspecialchars($_POST['fraseComp']);
            $palabraComp = htmlspecialchars($_POST['palabraComp']);
        }

        compruebaFrase($fraseComp, $palabraComp);
    ?>
    <hr>
    
    <h3>Ejercicio 5.- Comprobar inicio y fin frase</h3>
    <form method="post" action="">
        <label for="frase">Indica una nueva frase: </label>
        <input type="text" id="frase" name="frase"><br><br>
        <label for="palabra">Indica una palabra: </label>
        <input type="text" id="palabra" name="palabra"><br>
        <input type="submit" value="Enviar"><br><br>
    </form>
    
    <?php       
        $frase = null;
        $palabra = null;

        if (isset($_POST['frase']) && !empty($_POST['frase']) && isset($_POST['palabra']) && !empty($_POST['palabra'])) {
            $frase = htmlspecialchars($_POST['frase']);
            $palabra = htmlspecialchars($_POST['palabra']);
        }

        compruebaInicioFin($frase, $palabra);
    ?>
    
</body>
</html>