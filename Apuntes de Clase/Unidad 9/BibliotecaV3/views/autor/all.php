<?php
// VISTA PARA LA LISTA DE LOS AUTORES
// view/libro/all.php

// Recuperamos la lista de libros
$listaAutores = $data["listaAutores"];

// Si hay algún mensaje de feedback, lo mostramos
if (isset($data["info"])) {
    echo "<div style='color:blue'>".$data["info"]."</div>";
}
  
if (isset($data["error"])) {
    echo "<div style='color:red'>".$data["error"]."</div>";
}

// Vamos a meter el formulario de búsqueda de libros en un fichero buscar.php dentro de
// /views/libro. Aquí lo incluiremos con un require_once.
echo "<form action='index.php'>
        <input type='hidden' name='action' value='buscarAutores'>
        <input type='text' name='textoBusqueda'>
        <input type='submit' value='Buscar'>
      </form><br>";

      // Ahora, la tabla con los datos de los libros
if (count($listaAutores) == 0) {
    echo "No hay datos";
} else {
    echo "<table border ='1'>";
    foreach ($listaAutores as $fila) {
      echo "<tr>";
      echo "<td>" . $fila->nombre . "</td>";
      echo "<td>" . $fila->apellido . "</td>";
      echo "<td><a href='index.php?action=formularioModificarLibro&idLibro=" . $fila->idLibro . "'>Modificar</a></td>";
      echo "<td><a href='index.php?action=borrarLibro&idLibro=" . $fila->idLibro . "'>Borrar</a></td>";
      echo "</tr>";
    }
    echo "</table>";
}
echo "<p><a href='index.php?action=formularioInsertarLibros'>Nuevo</a></p>";