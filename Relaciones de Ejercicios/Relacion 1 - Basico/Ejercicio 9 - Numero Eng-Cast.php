<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Traduccion</title>
    <style>
      table{
        text-align : center;
      }
    </style>
</head>
<body>
  <?php
    echo "<table>
            <tr>
              <th>Ingles</th>
              <th>Español</th>
            </tr>";

    $diccionario = array( 0 => 'zero', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five',
                          6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine', 10 => 'ten');


    for ($i = 0; $i < count($diccionario)-1; $i++ ) {
      echo "<tr>
              <td>" . $i . "</td>
              <td>" . $diccionario[$i] . "</td>
            </tr>";
    }


    echo "</table>";
  ?>
</body>
</html>