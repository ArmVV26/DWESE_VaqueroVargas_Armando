<?php

    $usuarios = [
        "Armando" => [
            "contrasenia" => "hola123",
            "nombre" => "Armando",
            "nomComp" => "Vaquero Vargas, Armando", 
            "apellido1" => "Vaquero", 
            "apellido2" => "Vargas", 
            "edad" => 23, 
            "fechaAlta" => "2021-10-21"
        ],

        "Jose" => [
            "contrasenia" => "hola123", 
            "nombre" => "Jose",
            "nomComp" => "Martinez Perez, Jose",
            "apellido1" => "Martinez",
            "apellido2" => "Perez", 
            "edad" => 22, 
            "fechaAlta" => "2023-12-11"
        ],

        "Antonio" => [
            "contrasenia" => "hola123",
            "nombre" => "Antonio",
            "nomComp" => "Ortega Hernandez, Antonio", 
            "apellido1" => "Ortega",
            "apellido2" => "Hernandez", 
            "edad" => 21, 
            "fechaAlta" => "2021-8-18"
        ],
    ];

    $libros = [
        "1234567891234" => [
            "cant" => 5,
            "titulo" => "La triologia de la Fundacion",
            "editorial" => "Planeta",
            "edicion" => 1989,
            "autores" => [
                "nombre" => "Isaac",
                "apellido1" => "Asimov",
                "apellido2" => "Martin"
            ]
        ],

        "9876543219876" => [
            "cant" => 6,
            "titulo" => "1984",
            "editorial" => "Alfaguara",
            "edicion" => 1978,
            "autores" => [
                "nombre" => "Eric",
                "apellido1" => "Arthur",
                "apellido2" => "Blair"
            ]
        ],

        "1928374651023" => [
            "cant" => 10,
            "titulo" => "Dune",
            "editorial" => "Debolsillo",
            "edicion" => 1965,
            "autores" => [
                "nombre" => "Franklin",
                "apellido1" => "Patrick",
                "apellido2" => "Herbert"
            ]
        ],
                    
        "6543210987610" => [
            "cant" => 2,
            "titulo" => "El niño con el pijama de rayas",
            "editorial" => "Planeta",
            "edicion" => 2006,
            "autores" => [
                "nombre" => "John",
                "apellido1" => "Boyne",
                "apellido2" => "Martin"
            ]
        ],
    ];

    $prestamos = [
        [
            "isbn" => "1928374651023",
            "nombre" => "Armando",
            "fechaInicio" => "2024-11-17",
            "fechaFin" => "2024-11-25"
        ],

        [
            "isbn" => "9876543219876",
            "nombre" => "Jose",
            "fechaInicio" => "2024-11-10",
            "fechaFin" => "2024-11-18"
        ],

        [
            "isbn" => "1234567891234",
            "nombre" => "Antonio",
            "fechaInicio" => "2024-11-19",
            "fechaFin" => "2024-11-28"
        ]
    ];

    function login($usu, $pw) {

        GLOBAL $usuarios;

        if (empty($pw)){   

            throw new Exception("ERROR DEL SISTEMA: La contraseña no puede estar vacia"); 
        }

        return isset($usuarios[$usu]) && $usuarios[$usu]['contrasenia'] === $pw;
    }

    // login("Armando", "");
      
    function escribeUsuario($usu) {

        GLOBAL $usuarios;
        
        if (isset($usuarios[$usu])){
            
            setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain.1252');
            $fecha = strtotime($usuarios[$usu]['fechaAlta']);

            echo $usuarios[$usu]['nomComp'];
            echo "<br> Está con nosotros desde el ", strftime('%e de %B de %Y', $fecha);

        }else{

            throw new Exception ("ERROR DEL SISTEMA: El usuario no existe"); 
        }   
    }

    // escribeUsuario("Armanod");

    function restrasado($fechaFin) {
        
        $fechaActual = date("Y-m-d");

        if ($fechaActual > $fechaFin) {
            return "No";
        } else{
            return "Si";
        }
    }

    function escribePrestamos($usu) {

        GLOBAL $usuarios, $prestamos, $libros;


        if (isset($usuarios[$usu])) {

            echo "<table>";
            
            echo "<tr>
                    <th colspan = '5'> Prestamo realizados por ", $usuarios[$usu]["nombre"], "</th>
                  </tr>";

            echo "<tr>
                    <th>ISBN</th>
                    <th>Título</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th>Retrasado</th>
                  </tr>";

            foreach ($prestamos as $valor) {
                
                if ($usu == $valor['nombre']) {

                    echo "<tr>
                        <td>", $valor['isbn'],"</td>
                        <td>", $libros[$valor['isbn']]['titulo'],"</td>
                        <td>", date("d-F-Y", strtotime($valor['fechaInicio'])) ,"</td>
                        <td>", date("d-F-Y", strtotime($valor['fechaFin'])) ,"</td>
                        <td>", restrasado($valor['fechaFin']),"</th>
                    </tr>";
                }
            }

            echo "</table>";
        } else {
            throw new Exception("ERROR DEL SISTEMA: El usuario no existe");
        }  
    }

    // escribePrestamos("Jose");
?>