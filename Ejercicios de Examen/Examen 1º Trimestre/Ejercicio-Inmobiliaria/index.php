<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Inmobiliaria</title>
    <link rel="stylesheet" href="css/basico.css">
</head>
<body>
    <?php

        /*
            Funcion que sirve para generar un ID para la Vivienda, usando la fecha actual y un contador
                de 001 a 999 en funcion del registro que sea.
        */
        function generaId(){

            $fechaActual = date('Y-m-d');

            $archivoInmobiliaria = 'viviendas.txt';
            $registro = 1;

            if (file_exists($archivoInmobiliaria)) {
                
                $ultimoRegistro = file_get_contents($archivoInmobiliaria);
                $ultimoNum = (int)substr($ultimoRegistro, 10);

                $registro += $ultimoNum;
            }

            $id = $fechaActual ."_". str_pad($registro, 3, '0', STR_PAD_LEFT);

            file_put_contents($archivoInmobiliaria, $id);

            return $id;
        }

        // Se tiene que declarar estas variables por que si no da error en el formulario
        $direccion = null;
        $precio = null;
        $tamaño = null;

       if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (!empty($_POST['direccion']) && !empty($_POST['precio']) &&
                !empty($_POST['tamaño'])) {

                    $idVivienda = generaId();

                    $vivienda = htmlspecialchars($_POST['vivienda']) ?? '';
                    $zona = htmlspecialchars($_POST['zona']) ?? '';
                    $direccion = htmlspecialchars($_POST['direccion']) ?? '';
                    $dormitorios = intval($_POST['dormitorios']) ?? '';
                    $precio = intval($_POST['precio']) ?? '';
                    $tamaño = intval($_POST['tamaño']) ?? '';
                    $extras = ($_POST['extras']) ?? null;
                    $fotos = ($_FILES['fotos']) ?? [];
                    $observaciones = !empty($_POST['observaciones']) ? 
                                        htmlspecialchars($_POST['observaciones']) : 
                                        'Ninguna Observación' ;

                    /*
                        Creo un array para guardar las rutas de las fotos para posteriormente mostrarlas
                            en la web. Y otro para mostrar los errores que me salgan en las fotos.

                        Compruebo que la variable fotos no este vacia y compruebo que sea un array.
                        
                        Crea un directorio donde se van a guardar las fotos, tambien lo comprueba
                            si existe y si no, lo crea.
                        
                        Solo se permite tener 5 fotos por vivienda. El tamaño de la imagen no puede exceder
                            de los 100 KB, si no, no se guardara.

                        Obtengo la extension del archivo y el nombre. Genero con esto y junto al Id de la
                            vivienda un nombre para la imagen.

                        Compruebo que la imagen se ha movido bien al fichero de destino, y si es asi
                            lo que hago es guardar la direccion en el array que he creado al principio.
                        Es necesario indicar que para que en el otro documento pueda mostrar las fotos en el
                            directorio correcto es necesario indicarle a la rutaFinal a la hora de guardarla
                            que esta en el directorio de antes. Para ello se añade "../".
                    */

                    $rutasFotos = [];
                    $errores = [];
                    if ($fotos['name'][0] !== '' && is_array($fotos['name'])) {
                        
                        $carpetaFotos = 'fotos/';
                        if (!file_exists($carpetaFotos)) {
                            mkdir($carpetaFotos, 0777, true);
                        }

                        for ($i = 0; $i < min(5, count($fotos['name'])); $i++) {
                            
                            if ($fotos['size'][$i] > 1000 * 1024) {
                                $errores[] = "La foto ". $fotos['name'][$i] . " excede del limite (100 KB)";
                            }

                            $extension = pathinfo($fotos['name'][$i], PATHINFO_EXTENSION);
                            $nomFoto = pathinfo($fotos['name'][$i], PATHINFO_FILENAME);

                            $nomFinal = $idVivienda ."_". $nomFoto .".". $extension;

                            $rutaFinal = $carpetaFotos . $nomFinal;
                            
                            if (move_uploaded_file($fotos['tmp_name'][$i], $rutaFinal)) {
                                $rutasFotos[] = "../".$rutaFinal;
                            } else {
                                $errores[] = "Error al subir la foto ". $fotos['name'][$i];
                            }
                        }
                    } else {
                        $errores[] = "Las imagenes no estan bien validadas o no hay imagenes";
                    }
                    
                    /* 
                        De esta manera hago un GET con el que voy a poder pasarle al otro fichero todos los datos necesarios
                            para mostrarlos.
                    */
                    $datos = http_build_query([
                        "idVivienda" => $idVivienda,
                        "vivienda" => $vivienda,
                        "zona" => $zona,
                        "direccion" => $direccion,
                        "dormitorios" => $dormitorios,
                        "precio" => $precio,
                        "tamaño" => $tamaño,
                        "extras" => $extras,
                        "observaciones" => $observaciones,
                        "rutasFotos" => $rutasFotos,
                        "errores" => $errores
                    ]);

                    header("Location: php/mostrar.php?$datos"); // Le indico los datos de esta manera
            }else{

                empty($_POST['direccion']) ? $direccion = "¡Se necesita la dirección!" : "";
                empty($_POST['precio']) ? $precio = "¡Se necesita el precio!" : "";
                empty($_POST['tamaño']) ? $tamaño = "¡Se necesita el tamaño!" : "";
            }
        }        
    ?>

    <header>
        <h1>Insercción de vivienda</h1>
    </header>

    <main>
        <form action="" method="post" enctype="multipart/form-data">
            <p>Introduzca los datos de la vivienda: </p>
        <fieldset class="borde">
            <table>

                <tr>
                    <th>Tipo de vivienda: </th>
                    <td>
                        <select name="vivienda">
                            <option value="Piso">Piso</option>
                            <option value="Adosada">Adosada</option>
                            <option value="Chalet">Chalet</option>
                            <option value="Casa">Casa</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th>Zona: </th>
                    <td>
                        <select name="zona">
                            <option value="Centro">Centro</option>
                            <option value="Zaidín">Zaidín</option>
                            <option value="Chana">Chana</option>
                            <option value="Albaicín">Albaicín</option>
                            <option value="Sacromonte">Sacromonte</option>
                            <option value="Realejo">Realejo</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th>Dirección: </th>
                    <td>
                        <input type="text" id="direccion" name="direccion">
                        <?php echo "<span>$direccion</span>" ?>
                    </td>
                </tr>

                <tr>
                    <th>Número de <br> dormitorios: </th>
                    <td>
                        <input type="radio" id="dor1" name="dormitorios" value="1">
                        <label for="dor1">1</label>

                        <input type="radio" id="dor2" name="dormitorios" value="2">
                        <label for="dor2">2</label>

                        <input type="radio" id="dor3" name="dormitorios" value="3">
                        <label for="dor3">3</label>

                        <input type="radio" id="dor4" name="dormitorios" value="4" checked>
                        <label for="dor4">4</label>
                        
                        <input type="radio" id="dor5" name="dormitorios" value="5">
                        <label for="dor5">5</label>
                    </td>
                </tr>

                <tr>
                    <th>Precio:</th>
                    <td>
                        <input type="number" id="precio" name="precio">
                        <label for="precio">€</label>
                        <?php echo "<span>$precio</span>" ?>
                    </td>
                </tr>

                <tr>
                    <th>Tamaño:</th>
                    <td>
                        <input type="number" id="tamaño" name="tamaño">
                        <label for="tamaño">m²</label>
                        <?php echo "<span>$tamaño</span>" ?>
                    </td>
                </tr>

                <tr>
                    <th>Extras:</th>
                    <td>
                        <input type="checkbox" id="extras1" name="extras[]" value="Piscina">
                        <label for="extras1">Piscina</label>

                        <input type="checkbox" id="extras2" name="extras[]" value="Jardin">
                        <label for="extras2">Jardín</label>

                        <input type="checkbox" id="extras3" name="extras[]" value="Garaje" checked>
                        <label for="extras3">Garaje</label>
                    </td>
                </tr>

                <tr>
                    <th>Fotos (Max 5):</th>
                    <td>
                        <input type="file" id="fotos" name="fotos[]" accept="image/*" multiple>
                    </td>
                </tr>

                <tr>
                    <th>Observaciones:</th>
                    <td>
                        <textarea name="observaciones" id="observaciones" rows="5" cols="60" placeholder="Por ejemplo: Aire acondicionado frio/calor, trastero ..." style="resize: none;"></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2"><input type="submit" formmethod="post" value="Insertar vivienda"></td>
                </tr>

            </table>
        </fieldset>
        </form>
    </main>
        
</body>
</html>