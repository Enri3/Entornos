<?php
// Conexión a la base de datos
$link = mysqli_connect('localhost', 'root');
mysqli_select_db ($link, 'capitales');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ciudad = $_POST['ciudad'];
    $pais = $_POST['pais'];
    $habitantes = $_POST['habitantes'];
    $superficie = $_POST['superficie'];
    $tieneMetro = isset($_POST['tieneMetro']) ? 1 : 0;

    $query = "INSERT INTO Ciudades (ciudad, pais, habitantes, superficie, tieneMetro) VALUES ('$ciudad', '$pais', $habitantes, $superficie, $tieneMetro)";
    mysqli_query($link, $query);
    echo "Ciudad agregada correctamente.";
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Ciudad</title>
</head>
<body>
    <h2>Alta de Ciudad</h2>
    <form method="POST" action="alta.php">
        Ciudad: <input type="text" name="ciudad" required><br>
        País: <input type="text" name="pais" required><br>
        Habitantes: <input type="number" name="habitantes" required><br>
        Superficie: <input type="number" step="0.01" name="superficie" required><br>
        ¿Tiene Metro?: <input type="checkbox" name="tieneMetro"><br>
        <button type="submit">Agregar Ciudad</button>
    </form>
</body>
</html>