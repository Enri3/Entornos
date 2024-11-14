<?php
$link = mysqli_connect('localhost', 'root');
mysqli_select_db ($link, 'capitales');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $ciudad = $_POST['ciudad'];
    $pais = $_POST['pais'];
    $habitantes = $_POST['habitantes'];
    $superficie = $_POST['superficie'];
    $tieneMetro = isset($_POST['tieneMetro']) ? 1 : 0;

    $query = "UPDATE Ciudades SET ciudad='$ciudad', pais='$pais', habitantes=$habitantes, superficie=$superficie, tieneMetro=$tieneMetro WHERE id=$id";
    mysqli_query($link, $query);
    echo "Ciudad actualizada.";
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificación de Ciudad</title>
</head>
<body>
    <h2>Modificación de Ciudad</h2>
    <form method="POST" action="modificacion.php">
        ID de la Ciudad: <input type="number" name="id" required><br>
        Ciudad: <input type="text" name="ciudad"><br>
        País: <input type="text" name="pais"><br>
        Habitantes: <input type="number" name="habitantes"><br>
        Superficie: <input type="number" name="superficie"><br>
        ¿Tiene Metro?: <input type="checkbox" name="tieneMetro"><br>
        <button type="submit">Modificar Ciudad</button>
    </form>
</body>
</html>