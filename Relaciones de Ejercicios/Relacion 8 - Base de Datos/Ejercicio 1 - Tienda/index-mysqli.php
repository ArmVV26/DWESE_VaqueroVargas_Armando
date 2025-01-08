<?php
    // CONEXION CON MYSQLI
    /* Credenciales para conectarse a la base de datos 
        - Nombre del servidor
        - Nombre del usuario
        - Contraseña del usuario
        - Nombre de la base de datos
    */
    $host = "localhost"; 
    $user = "admin";
    $password = "1234";
    $database = "mistiendas";

    // Conexion con le servidor
    $mysqli = new mysqli($host, $user, $password, $database);

    // Compruebo si da error la conexion. Si es el caso muestro el error
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        exit();
    }

    /* 
        Segun la seleccion del producto, recogere la opcion que indico y hare la consulta del stock 
            que necesito ver del producto que se indica en el formulario.
    */
    $stock = [];
    if (isset($_POST['producto'])) {
        // Obtengo el producto
        $productoSeleccionado = $_POST['producto'];

        // Consulta para obtener stock por tienda
        $stockQuery = "
            SELECT tiendas.nombre AS tienda, stock.unidades 
            FROM tiendas 
            INNER JOIN stock ON tiendas.cod = stock.tienda 
            WHERE stock.producto = '$productoSeleccionado'
        ";
        // Obtengo el resultado de la consulta
        $stockResult = $mysqli->query($stockQuery);

        // Mostrar el stock
        if ($stockResult->num_rows > 0) {
            while ($row = $stockResult->fetch_assoc()) {
                $stock[] =[
                    'tienda' => htmlspecialchars($row['tienda']),
                    'unidades' => htmlspecialchars($row['unidades'])
                ];
            }
        } else {
            $stock = "<p>No hay stock disponible para este producto.</p>";
        }
    }

    // Obtener lista de productos
    $productos = [];
    $productosQuery = "SELECT cod, nombre_corto FROM productos";
    $productosResult = $mysqli->query($productosQuery);

    if ($productosResult && $productosResult->num_rows > 0) {
        while ($row = $productosResult->fetch_assoc()) {
            $productos[] = $row;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda - BDD</title>
</head>
<body>
    <h1>Ejercicio: Conjuntos de resultados en MySQLi</h1>

    <form action="" method="POST" enctype="multipart/form-data">

        <label for="producto">Producto:</label>
        <select name="producto" id="producto" required>
            <?php foreach ($productos as $prod): ?>
                <option value="<?= htmlspecialchars($prod['cod']) ?>">
                    <?= htmlspecialchars($prod['nombre_corto']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Mostrar stock</button>
    </form>

    <?php if (isset($_POST['producto'])): 
        ?>
        <h2>Stock del producto seleccionado</h2>
        <table border="1">
            <tr>
                <th>Tienda</th>
                <th>Unidades</th>
            </tr>
            <?php if (count($stock) > 0): ?>
                <?php foreach ($stock as $fila): ?>
                    <tr>
                        <td><?= htmlspecialchars($fila['tienda']) ?></td>
                        <td><?= htmlspecialchars($fila['unidades']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2">No hay stock para este producto.</td>
                </tr>
            <?php endif; ?>
        </table>
    <?php endif; ?>
</body>
</html>