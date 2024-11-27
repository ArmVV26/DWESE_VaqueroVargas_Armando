<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Boletin de Notas</title>
    <style>
        body {
            font-family: Verdana;
            background-color: #66ccff;
            text-align: center;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }
        th {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
        // Calcular la media total 
        function mediaTotal($notas){
            $asignatura = array_keys($notas[1]);
            
            $media = 0;

            foreach($asignatura as $valor){
                $media += media($notas, $valor);
            }

            return number_format($media / count($asignatura), 2);
        }

        // Calcular la media de uno solo
        function media($notas, $asignatura){
            $suma = 0;

            for($i=0; $i<count($notas); $i++) {
                $suma += $notas[$i+1][$asignatura];
            }

            return number_format($suma / count($notas), 2);
        }
        
        $notas =[
            1 => ["Matematicas" => 3, "Lengua" => 8, "Fisica" => 7, "Latin" => 4, "Ingles" => 6],
            2 => ["Matematicas" => 10, "Lengua" => 5, "Fisica" => 2, "Latin" => 7, "Ingles" => 2],
            3 => ["Matematicas" => 7, "Lengua" => 3, "Fisica" => 1, "Latin" => 8, "Ingles" => 3],
        ];

        echo "<h1>Boletín de notas</h1>";

        echo "<table>
                <tr>
                    <th>Asignatura</th>
                    <th>Trimestre 1</th>
                    <th>Trimestre 2</th>
                    <th>Trimestre 3</th>
                    <th>Media</th>
                </tr>";

        $asignatura = array_keys($notas[1]);
        
        foreach($asignatura as $valor) {
            echo "<tr>";
            echo "<td>". $valor ."</td>";
            echo "<td>". $notas[1][$valor] ."</td>";
            echo "<td>". $notas[2][$valor] ."</td>";
            echo "<td>". $notas[3][$valor] ."</td>";
            echo "<td>". media($notas, $valor) ."</td>";
            echo "</tr>";
        }

        echo "</table>";

        echo "<h2>La media total es: ". mediaTotal($notas) ."</h2>";
    
    ?>
</body>
</html>