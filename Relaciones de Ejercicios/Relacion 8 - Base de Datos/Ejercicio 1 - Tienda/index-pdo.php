<?php
   // CONEXION CON PDO
    /* Credenciales para conectarse a la base de datos
        - Host de la base de datos y el servidor
        - Nombre del usuario
        - Contraseña del usuario
    */
    $host = "mysql:host=localhost;dbname=mistiendas;charset=utf8mb4";
    $username = "admin"; 
    $password = "1234";

    // Conecto a la base de datos con los datos guardados en las líneas anteriores	
    try {
        $pdo = new PDO($host, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error al conectar a la base de datos: " . $e->getMessage());
    }

    /* 
        Segun la seleccion del producto, recogere la opcion que indico y hare la consulta del stock 
            que necesito ver del producto que se indica en el formulario.
    */
    $stock = [];
    if (isset($_POST['producto'])) {
        // Obtengo el producto
        $productoSeleccionado = $_POST['producto'];

        try {
            $stockQuery = "
                SELECT tiendas.nombre AS tienda, stock.unidades 
                FROM tiendas 
                INNER JOIN stock ON tiendas.cod = stock.tienda 
                WHERE stock.codigoproducto = :producto
            ";
            $stmt = $pdo->prepare($stockQuery);
            $stmt->bindParam(':producto', $productoSeleccionado, PDO::PARAM_STR);
            $stmt->execute();
    
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $stock[] = $row;
            }
        } catch (PDOException $e) {
            die("Error al obtener stock: " . $e->getMessage());
        }
    }

    // Obtener lista de productos
    $productos = [];
    try {
        $productosQuery = "SELECT cod, nombre_corto FROM productos";
        $stmt = $pdo->query($productosQuery);
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $productos[] = $row;
        }
    } catch (PDOException $e) {
        die("Error al obtener productos: " . $e->getMessage());
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