<?php

    // Creo los arrays sin inicializar
    $usuarios = [];
    $productos = [];
    $pedidos = [];
    
    // Con esta funcion lo que hago es generar los usuarios dentro del array usuarios
    function rellenaUsuarios(){ 
        GLOBAL $usuarios;

       $usuarios = [
            "12341234A" => [
                "contrasenia" => "1234",
                "nombre" => "usuario1",
                "edad" => 22,
                "tarjeta" => [
                    "numero" => 12356,
                    "cvv" => 123
                ] 
            ],

            "98769876B" => [
                "contrasenia" => "1234",
                "nombre" => "usuario2",
                "edad" => 22,
                "tarjeta" => [
                    "numero" => 12356,
                    "cvv" => 123
                ] 
            ],

            "45674567G" => [
                "contrasenia" => "1234",
                "nombre" => "usuario3",
                "edad" => 22,
                "tarjeta" => [
                    "numero" => 12356,
                    "cvv" => 123
                ] 
            ]
        ];
    }

    // Esto es para ir comprobando el codigo
    // rellenaUsuarios();

    //Esta funcion genera los productos dentro de productos
    function rellenaProductos($numProductos) {

        GLOBAL $productos;

        // Genero tantos productos como indique por parametros
        for ($i = 0; $i < $numProductos; $i++) {
            
            // Segun el numero de productos que haya en el array genero el nombre sumandole 1
            $contadorProd = count($productos)+1; 

            // El nombre lo genero con el nombre de Producto + 00X. Siendo X el numero que genero con el contador
            $nombreProductos = "Producto" . str_pad($contadorProd, 3, '0', STR_PAD_LEFT);

            // Añado el producto al array
            $productos[] = [
                    "unidades" => rand(10,20),
                    "nombreProducto" => $nombreProductos,
                    "precio" => rand(1,50)
            ];
        } 
    }

    // Esto es para ir comprobando el codigo
    // rellenaProductos(5);

    // Con esta funcion genero los pedidos
    function rellenaPedidos() {

        GLOBAL $pedidos;
        GLOBAL $usuarios;
        GLOBAL $productos;
     
        // Recorro el array de usuarios ya que por cada usuario le asigno 3 pedidos
        foreach($usuarios as $dni => $contenido) {
            
            // Aqui le indico el numero de pedidos que quiero añadir (en este caso 3)
            for ($i = 0; $i < 3; $i++) {
                
                // Genero un id de Producto valido segun la cantidad de productos que haya
                $idProducto = rand(0, count($productos)-1);
                
                // Cojo una cantidad de productos en base a la cantidad que tiene ya
                $cantidad = rand(1, $productos[$idProducto]['unidades']);

                // Calculo el precio multiplicando la cantidad que tengo por la del precio del producto
                $precioLinea = $cantidad * $productos[$idProducto]['precio'];

                // Añado los pedidos dentro del array pedido
                $pedidos[] = [
                    "usuario" => $dni,
                    "idProducto" => $idProducto,
                    "cantidad" => $cantidad,
                    "precioLinea" => $precioLinea
                ];
            }
        }
    }

    // Esto es para ir comprobando el codigo
    // rellenaPedidos();

    // Funcion que me sirve para mostar en una tabla todo los pedidos del usuario que indique por parametros
    function mostrarPedidos($dniUsuario) {

        GLOBAL $pedidos;
        GLOBAL $usuarios;

        // Busco el usuario, para saber si existe. Si no existe envio un error.
        if (!isset($usuarios[$dniUsuario])) {
            
            throw new Exception("ERROR - Usuario introducido para mostrar invalido");
        }

        // Creo la tabla y la primera fila
        echo "<table>";
            
        echo "<tr>
                <th> ID Producto </th>
                <th> Cantidad </th>
                <th> Precio Línea (€) </th>
              </tr>";

        // Variable que recoge la suma total de los pedidos
        $totalLinea = 0;

        // Recorro el array de los pedidos
        foreach($pedidos as $key => $valor) {

            // Busco que pedido tiene como id de usuario el dni que paso por parametros
            if ($valor['usuario'] == $dniUsuario) {
                
                // Muestro los valores de los pedidos que tienen como id de usuario el dni que paso por parametros
                echo "<tr>
                        <td>". $valor['idProducto'] ."</td>
                        <td>". $valor['cantidad'] ."</td>
                        <td>". $valor['precioLinea'] ."</td>
                      </tr>";
                // Aqui sumo las lineas de precios
                $totalLinea += $valor['precioLinea'];
            }
        }

        // Y por ultimo en la tabla muestro el total de las lineas
        echo "<tr>
                <th colspan='2'> Total Pedido: </th>
                <th> ". $totalLinea ."
              </tr>";

        echo "</table>";
    }

    // Esto es para ir comprobando el codigo
    // mostrarPedidos("12341234A");

?>