<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Include</title>
</head>
<body>
    <p>1. Clases</p>
    <p>2. Array</p>

    <form method="post" action="">
        <label for="opcion">Indica una Opcion: </label>
        <input type="text" id="opcion" name="opcion">
        <input type="submit" value="Enviar">
    </form>

    <?php

        $opcion = null;
        if ( isset($_POST['opcion']) && $_POST['opcion'] !== "") { // Para asegurarse de que no mete un codigo que pete mi codigo
            $opcion = (int)htmlspecialchars($_POST['opcion']);
        }

        switch($opcion){
            case "1":
                include 'clases.php';
                break;
            case "2":
                include 'Arrays.php';
                break;
            default:
                echo "Error";
        }
        /*
            case "1":
                header("Location: clases.php");
                break;
            case "2":
                header("Arrays.php");
                break;
            default:
                echo "Error";
        }
        */

    ?>
</body>
</html>