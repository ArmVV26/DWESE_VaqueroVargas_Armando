<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Centro Educativo</title>
</head>
<body>
    <?php
        $profesores =[
            ["numRegistro" => "P001", "nombre" => "Luis", "apellido" => "Martinez Perez", "telefono" => 612345678, "fechaNac" => "1980-11-03"],
            ["numRegistro" => "P002", "nombre" => "Carmen ", "apellido" => "Sanchez Garcia", "telefono" => 689123456, "fechaNac" => "1975-12-07"],
            ["numRegistro" => "P003", "nombre" => "Antonio", "apellido" => "Garcia Fernandez", "telefono" => 621987654, "fechaNac" => "1982-05-11"],
            ["numRegistro" => "P004", "nombre" => "Maria", "apellido" => "Fernandez Lopez", "telefono" =>  634567890, "fechaNac" => "1991-08-02"],
            ["numRegistro" => "P005", "nombre" => "Javier", "apellido" => "Rodriguez Morales", "telefono" => 655234567, "fechaNac" => "1992-12-06"],
        ];
        
        // Funcion que nos permita mostrar el numero de registro de cada profesor
        function mostrarRegistro($profesores) {
            foreach($profesores as $prof) {
                echo $prof["numRegistro"]. " - ". $prof["nombre"] ."<br>";
            }
        }
        mostrarRegistro($profesores);

        // Funcion anonima con array_map();
        $verProfesores = function($profesores) {
            echo $profesores["numRegistro"] ." - ". $profesores["nombre"] ."<br>";
        };

        echo "<br> Funcion Anonima <br>";
        array_map($verProfesores, $profesores); // Lleva como un foreach integrado

        // Funcion anonima que muestre profesores nacidos a partir del 1990
        $comprobarProf = function($profesores){

            $year = strtotime('1990-1-1');
            $yearProf = strtotime($profesores["fechaNac"]);
            
            if($yearProf >= $year ) {
                echo "[{$profesores["numRegistro"]}] - {$profesores["nombre"]} {$profesores["apellido"]} - {$profesores["telefono"]} - {$profesores["fechaNac"]} <br>";
            }
        };
        
        echo "<br> Funcion Anonima (1990) <br>";
        array_filter($profesores, $comprobarProf);
    ?>
</body>
</html>