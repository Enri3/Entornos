<?php
// Iniciar la sesión (si es necesario)
session_start();

// Conectar a la base de datos
$link = mysqli_connect('localhost', 'root', '');

// Seleccionar la base de datos 'prueba'
mysqli_select_db($link, 'prueba');

// Comprobar si se envió el formulario de búsqueda
if (isset($_POST['buscar'])) {
    // Obtener el término de búsqueda
    $termino = mysqli_real_escape_string($link, $_POST['termino']);

    // Consulta SQL para buscar la canción
    $query = "SELECT * FROM buscador WHERE canciones LIKE '%$termino%'";
    $result = mysqli_query($link, $query);

    // Comprobar si se encontraron resultados
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Resultados de la búsqueda:</h2>";
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>" . htmlspecialchars($row['canciones']) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No se encontraron canciones que coincidan con '$termino'.</p>";
    }
}

// Cerrar la conexión
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscador de Canciones</title>
</head>
<body>
    <h1>Buscador de Canciones</h1>
    <form action="index.php" method="post">
        <label for="termino">Buscar Canción:</label>
        <input type="text" name="termino" id="termino" required>
        <button type="submit" name="buscar">Buscar</button>
    </form>
</body>
</html>
