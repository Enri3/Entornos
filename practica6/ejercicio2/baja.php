<?php
$link = mysqli_connect('localhost', 'root');
mysqli_select_db ($link, 'capitales');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $query = "DELETE FROM Ciudades WHERE id = $id";
    mysqli_query($link, $query);
    echo "Ciudad eliminada.";
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Baja de Ciudad</title>
</head>
<body>
    <h2>Baja de Ciudad</h2>
    <form method="POST" action="baja.php">
        ID de la Ciudad: <input type="number" name="id" required><br>
        <button type="submit">Eliminar Ciudad</button>
    </form>
</body>
</html>