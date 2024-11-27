<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Hola Mundo</title>
</head>
<body>
	<?php
		// Esto es un comentario
		/*
			Comentario de varias lineas
		*/
		# Otra forma de comentar
		echo "Hola Mundo <br>";

		$var = 4;
		$$var = 6;
		echo $var;
		echo "<br>";
		echo $$var;

		$mensaje_es = "Hola";
		$mensaje_en = "Hello";
		$idioma = "es"; // en
		$mensaje = "mensaje_" .
		$idioma;
		echo "<br>", $$mensaje;

		$num = 2.5;
		function prueba(): void{
			global $num;
			$otroNum = $num;
			echo "<br>", $otroNum;
		}
		prueba();

	?>
</body>
</html>