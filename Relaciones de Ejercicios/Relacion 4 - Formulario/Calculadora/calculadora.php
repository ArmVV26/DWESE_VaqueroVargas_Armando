<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
      <h1>Calculadora</h1>
    </header>

    <main>
        <form action="" method="post" enctype="multipart/form-data">

            <label for="numeroUno">Numero (1): </label>
            <input type="number" id="numeroUno" name="numeroUno"><br><br>

            <label for="numeroDos">Numero (2): </label>
            <input type="number" id="numeroDos" name="numeroDos"><br><br>

            <input type="submit" formmethod="post" value="Sumar" name="opcion">
            <input type="submit" formmethod="post" value="Restar" name="opcion">
            <input type="submit" formmethod="post" value="Dividir" name="opcion">
            <input type="submit" formmethod="post" value="Multiplicar" name="opcion">
            <br><br>

        </form>
    </main>

    <?php

        $numeroUno = null;
        $numeroDos = null;
        $opcion = null;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
            if (!empty($_POST['numeroUno']) && 
                !empty($_POST['numeroDos']) &&
                !empty($_POST['opcion'])){

                $numeroUno = intval($_POST['numeroUno']);
                $numeroDos = intval($_POST['numeroDos']);
                $opcion = htmlspecialchars($_POST['opcion']);
            }
        }

        if ($numeroUno !== null && $numeroDos !== null && $opcion !== null) {

            $resultado = match($opcion){
                'Sumar' => 'El resultado es: '. $numeroUno + $numeroDos,
                'Restar' => 'El resultado es: '. $numeroUno - $numeroDos,
                'Dividir' => $numeroDos === 0 ? 
                    'No se puede dividir por cero' : 
                    'El resultado es: '. $numeroUno / $numeroDos,
                'Multiplicar' => 'El resultado es: '. $numeroUno * $numeroDos 
            };

            echo "<b>$resultado</b>";
        }

    ?>
    
</body>
</html>