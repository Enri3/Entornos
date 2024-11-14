
<?php
session_start();

// Conectar a la base de datos
$link = mysqli_connect('localhost', 'root');
mysqli_select_db($link, 'Compras');

// Si se envió el formulario para agregar al carrito
if (isset($_POST['agregar'])) {
    $producto_id = $_POST['producto_id'];
    
    // Verificar si el producto ya está en el carrito
    if (!isset($_SESSION['carrito'][$producto_id])) {
        $_SESSION['carrito'][$producto_id] = 1;  // Si no está, lo agregamos con cantidad 1
    } else {
        $_SESSION['carrito'][$producto_id] += 1;  // Si ya está, incrementamos la cantidad
    }
}

// Obtener los productos del catálogo
$query = "SELECT * FROM catálogo";
$result = mysqli_query($link, $query);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
</head>
<body>
    <h1>Catálogo de Productos</h1>
    
    <table border="1">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($producto = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $producto['producto']; ?></td>
                <td><?php echo number_format($producto['precio'], 2, ',', '.'); ?> €</td>
                <td>
                    <!-- Formulario para agregar al carrito -->
                    <form action="index.php" method="post">
                        <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                        <button type="submit" name="agregar">Agregar al Carrito</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h2><a href="carrito.php">Ver Carrito</a></h2>
    
</body>
</html>

<?php
// Cerrar la conexión
mysqli_close($link);
?>
