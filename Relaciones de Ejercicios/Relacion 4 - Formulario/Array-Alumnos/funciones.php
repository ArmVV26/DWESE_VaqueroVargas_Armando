<?php
    function crearArray(){
        return [ "Jose" => 6.7, "Maria" => 4.5, "Pepe" => 7.6, "Andrea" => 8];
    }

    function mostrarArray($alumnos){
        echo "<table>";

        echo "<tr> <th>Alumno</th> <th>Nota</th> </tr>";
        arsort($alumnos);
        foreach($alumnos as $key => $valor){
            echo "<tr> 
                    <td>$key</td>
                    <td>$valor</td>
                  </tr>";
        }

        echo "</table>";
    }

    function agregarAlumno(&$alumnos, $nombre, $nota){
        if(array_key_exists($nombre, $alumnos)){
            echo "<p>El alumno $nombre, ya estaba en el array, por lo que su nota ha sido actualizada</p>";
        }else {
            echo "<p>Alumno $nombre añadido</p>";
        }
        $alumnos[$nombre] = $nota;
    }

    function calcularMedia($alumnos) {
        
        $nota = 0;

        foreach($alumnos as $key => $valor) {
            $nota += $valor;
        }

        return $nota / count($alumnos);
    }

?>