<?php
$link = mysqli_connect('localhost', 'root');
mysqli_select_db ($link, 'capitales');

$query = "SELECT * FROM Ciudades";
$result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Ciudades</title>
</head>
<body>
    <h2>Listado de Ciudades</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Ciudad</th>
            <th>País</th>
            <th>Habitantes</th>
            <th>Superficie</th>
            <th>Tiene Metro</th>
        </tr>
        <?php while ($fila = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo $fila['id']; ?></td>
                <td><?php echo $fila['ciudad']; ?></td>
                <td><?php echo $fila['pais']; ?></td>
                <td><?php echo $fila['habitantes']; ?></td>
                <td><?php echo $fila['superficie']; ?></td>
                <td><?php echo $fila['tieneMetro'] ? 'Sí' : 'No'; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
mysqli_free_result($result);
mysqli_close($link);
?>