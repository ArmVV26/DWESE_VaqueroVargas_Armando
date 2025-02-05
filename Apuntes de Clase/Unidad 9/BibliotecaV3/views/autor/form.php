<?php 

extract($data);

if (isset($personas)) {   
    echo "<h1>Modificación de autores</h1>";
} else {
    echo "<h1>Inserción de personas</h1>";
}


$idPersona = $personas -> idPersona ?? "";
$nombre = $nombre -> nombre ?? "";
$apellidos = $apellido -> apellidos ?? "";


echo "<form action = 'index.php' method = 'get'>
     <input type='hidden' name='idPersona' value='".$idPersona."'><br>
     Nombre:<input type='text' name='nombre' value='".$nombre."'><br>
     Apellidos:<input type='text' name='apellidos' value='".$apellidos."'><br>";

//Finalizamos el formulario
if (isset($personas)) {
    echo "  <input type='hidden' name='action' value='modificarAutor'>";
} else {
    echo "  <input type='hidden' name='action' value='insertarAutor'>";
}
echo "	<input type='submit'></form>";
echo "<p><a href='index.php'>Volver</a></p>";
?>