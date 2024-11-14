<?php
session_start();

// Conectar a la base de datos
$link = mysqli_connect('localhost', 'root');
mysqli_select_db($link, 'Compras');

// Verificar si el carrito no está vacío
if (empty($_SESSION['carrito'])) {
    echo "<h2>El carrito está vacío</h2>";
    exit;
}

// Obtener los productos del carrito y sus detalles
$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
</head>
<body>
    <h1>Carrito de Compras</h1>
    
    <table border="1">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($_SESSION['carrito'] as $producto_id => $cantidad) {
                // Obtener los detalles del producto desde la base de datos
                $query = "SELECT * FROM catálogo WHERE id = $producto_id";
                $result = mysqli_query($link, $query);
                $producto = mysqli_fetch_assoc($result);

                // Calcular el total para ese producto
                $subtotal = $producto['precio'] * $cantidad;
                $total += $subtotal;
            ?>
            <tr>
                <td><?php echo $producto['producto']; ?></td>
                <td><?php echo $cantidad; ?></td>
                <td><?php echo number_format($producto['precio'], 2, ',', '.'); ?> €</td>
                <td><?php echo number_format($subtotal, 2, ',', '.'); ?> €</td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    
    <h2>Total: <?php echo number_format($total, 2, ',', '.'); ?> €</h2>

    <hr>
    <a href="index.php">Seguir Comprando</a> | <a href="vaciar_carrito.php">Vaciar Carrito</a>
</body>
</html>

<?php
// Cerrar la conexión
mysqli_close($link);
?>
