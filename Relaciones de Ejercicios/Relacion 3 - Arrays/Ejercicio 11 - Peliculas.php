<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Array Peliculas</title>
    <style>
        table,td{
            border:1px solid black;
        }
        td{
            width: 6rem;
        }
    </style>
</head>
<body>
    <?php
        function mostrarArray($peliculas) {
            for($i = 0; $i<count($peliculas); $i++) {
                echo "Película ". $i + 1 .": ". $peliculas[$i] ."<br>";
            }
        }

        function generaColor(){
            /*
                Sprintf -> Funcion que da formato a una cadena
                # -> Valor fijo que tienen todos los colores
                %06 -> Obliga a que se tenga que rellenar con 6 digitos
                X -> Hace que el numero se convierta a hexadecimal y en letras mayúsculas

                rand -> Genera numeros entre 0x000000 hasta 0xFFFFFF
            */
            $result = sprintf('#%06X', rand(0x000000, 0xFFFFFF));
            return $result;
        }

        $peliculas = ["El padrino", "Los miserables", "Interestellar", "Origen",
                      "El gran Torino", "Parasite", "El señor de los anillos",
                      "Forest Gump", "The Batman", "Harry Potter"];
        
        mostrarArray($peliculas);

        /*
            Creo la tabla, muestro los valores y le asigno el estilo color, que es una variable que ejecuta
              la funcion que nos devuelve el color
        */
        echo "<br><br>";
        echo "<table>";
        for($i = 0; $i<count($peliculas); $i++) {
            $color = generaColor();
            echo "<tr>";
            echo "<td style='color: $color;'>". $peliculas[$i] ."</td>";
            echo "</tr>";
        }
        echo "</table>";

    ?>
</body>
</html>