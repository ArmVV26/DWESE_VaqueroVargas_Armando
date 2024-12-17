<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Array Multidimensional</title>
</head>
<body>
    <?php
        $productos = [
            ["nombre"=>"Camaras", "precio"=>850, "stock"=>10],
            ["nombre"=>"Televisores", "precio"=>350, "stock"=>15],
            ["nombre"=>"Portatiles", "precio"=>450, "stock"=>5],
            ["nombre"=>"Aspiradora", "precio"=>450, "stock"=>30],
            ["nombre"=>"Microondas", "precio"=>350, "stock"=>35],
            ["nombre"=>"Televisores", "precio"=>550, "stock"=>25],
            ["nombre"=>"Lavadoras", "precio"=>450, "stock"=>10],
            ["nombre"=>"Neveras", "precio"=>1000, "stock"=>4],
            ["nombre"=>"Aspiradora", "precio"=>670, "stock"=>15]
        ];

        function mostrarArray($array){
            foreach($array as $valores) {
                print_r($valores);
                echo "<br>";
            }
        }
        
        // Mostrar el original
        echo "<h3>Original</h3>";
        mostrarArray($productos);

        // Ordenado por nombre ascendente y por stock ascendente
        function ordenar($a, $b) {
            if(strcmp($a["nombre"], $b["nombre"]) == 0) {
                return $b["stock"] - $a["stock"]; // Esto devuelve 0, 1 o -1 en funcion ascendente del stock
            }else{
                return strcmp($a["nombre"], $b["nombre"]);
            }
        }

        echo "<br><h3>Ordenado por Nomrbe y Stock</h3>";
        usort($productos, "ordenar");
        mostrarArray($productos);

        // Comprobar que existe Lavadoras
        $buscar = "Lavadoras";
        $opcion = false;
        foreach($productos as $valores){
           if(in_array($buscar, $valores)){
            $opcion = true;
           }
        }
        if ($opcion){
            echo "<br> Las $buscar estan dentro del array";
        }else{
            echo "<br> Las $buscar no estan dentro del array";
        }

        // Calcular el valor total de todos los productos en stock
        $valorTotal = 0;
        foreach($productos as $valores) {
            $calculo = $valores["precio"] * $valores["stock"];
            $valorTotal += $calculo;
        }

        echo "<br> El valor total de los productos es el siguiente: $valorTotal";
    
    ?>
</body>
</html>