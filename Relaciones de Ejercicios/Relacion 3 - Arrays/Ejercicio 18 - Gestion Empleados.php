<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestion de Empleados</title>
</head>
<body>
    <?php
        // Mostrar el array
        function mostrarArray($empleados){
            $ids = array_keys($empleados);
            $cont = 0;
            
            foreach($empleados as $persona) {
                echo "Persona $cont: ID: $ids[$cont] | Nombre: ". $persona["nombre"] ." | Salario: ". $persona["salario"] ."<br>";
                $cont++;
            }
        }

        $empleados = [
            101 => ["nombre" => "Juan", "salario" => 45000],
            106 => ["nombre" => "Ana", "salario" => 55000],
            104 => ["nombre" => "Luis", "salario" => 50000],
            105 => ["nombre" => "Marta", "salario" => 65000],
            103 => ["nombre" => "Antonio", "salario" => 40000],
            102 => ["nombre" => "Alex", "salario" => 35000],
            108 => ["nombre" => "Armando", "salario" => 30000],
            107 => ["nombre" => "Maria", "salario" => 90000],
        ];
        
        echo "<b>Array Original</b> <br>";
        mostrarArray($empleados);

        // Aumentar un 10% el sueldo de los que cobran menos de 50.000
        echo "<br><br>";

        function aumentar($empleados){
            if ($empleados["salario"] < 50000) {
                $empleados["salario"] *= 1.10;
            }
            return $empleados;
        }

        $empleados = array_map("aumentar", $empleados);
        echo "<b>Array mas un 10% </b><br>";
        mostrarArray($empleados);

        // Ordenar de forma ascendente por el ID
        echo "<br><br>";
        
        ksort($empleados);
        echo "<b>Array ordenador por ID </b><br>";
        mostrarArray($empleados);

        // Ordenar por empleados con mayor salario y mostrar los 3 primeros
        echo "<br><br>";
        echo "<b>Empleados con mas salario: </b><br>";      
        

        echo "<b>Opcion 1: </b><br>";
        // Creo otro array para que no me modifique el original
        $empleados2 = $empleados;      
        array_multisort(array_column($empleados2, 'salario'), SORT_DESC, $empleados2);
        $tresPrimeros = array_slice($empleados2, 0, 3);
        mostrarArray($tresPrimeros);


        echo "<b>Opcion 2: </b><br>";      
        $salario = [];

        foreach($empleados as $persona) {
            $salario[] = $persona["salario"];
        }
        
        arsort($salario);

        $salario = array_slice($salario, 0, 3);
        $tresEmpleados = [];

        foreach($empleados as $persona) {
            if(in_array($persona["salario"], $salario)) {
                $tresEmpleados[] = $persona;
            }
        }

        mostrarArray($tresEmpleados);


        echo "<b>Opcion 3 (Profesor): </b><br>";     
        $salarios = [];

        foreach($empleados as $key => $salario){
            $salarios[$key] = ["salario" => $salario["salario"], "nombre" => $salario["nombre"]];
        }

        arsort($salarios);
        $tres = array_slice($salarios, 0, 3);

        mostrarArray($tres);
    ?>
</body>
</html>