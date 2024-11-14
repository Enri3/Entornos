<?php
// Conectar a la base de datos
$link = mysqli_connect('localhost', 'root');
mysqli_select_db ($link, 'capitales');

if (!$link) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Procesamiento de CRUD (alta, baja, modificación) - omitido para centrarnos en la paginación

// Configuración de paginación
$resultados_por_pagina = 5;
$query_total = "SELECT COUNT(*) AS total FROM Ciudades";
$result_total = mysqli_query($link, $query_total);
$row_total = mysqli_fetch_assoc($result_total);
$total_resultados = $row_total['total'];
$total_paginas = ceil($total_resultados / $resultados_por_pagina);

// Determinamos la página actual
$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$pagina_actual = max(1, min($pagina_actual, $total_paginas));

// Calcular el índice de inicio para la consulta
$inicio = ($pagina_actual - 1) * $resultados_por_pagina;

// Consulta para obtener los resultados de la página actual
$query = "SELECT * FROM Ciudades LIMIT $inicio, $resultados_por_pagina";
$result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Ciudades</title>
</head>
<body>
    <!-- Aquí va el formulario de CRUD (alta, baja, modificación) -->

    <!-- Listado de Ciudades con Paginación -->
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

    <!-- Navegación de la paginación mejorada -->
    <div>
        <?php
        // Determinamos el rango de páginas a mostrar alrededor de la página actual
        $rango = 2; // Número de páginas a mostrar a cada lado
        $inicio_rango = max(1, $pagina_actual - $rango);
        $fin_rango = min($total_paginas, $pagina_actual + $rango);

        // Enlace a la primera página
        if ($pagina_actual > 1) {
            echo '<a href="?pagina=1">Primera</a> ';
        }

        // Enlace a la página anterior
        if ($pagina_actual > 1) {
            echo '<a href="?pagina=' . ($pagina_actual - 1) . '">Anterior</a> ';
        }

        // Enlaces a las páginas dentro del rango
        for ($i = $inicio_rango; $i <= $fin_rango; $i++) {
            if ($i == $pagina_actual) {
                echo '<strong>' . $i . '</strong> ';
            } else {
                echo '<a href="?pagina=' . $i . '">' . $i . '</a> ';
            }
        }

        // Enlace a la página siguiente
        if ($pagina_actual < $total_paginas) {
            echo '<a href="?pagina=' . ($pagina_actual + 1) . '">Siguiente</a> ';
        }

        // Enlace a la última página
        if ($pagina_actual < $total_paginas) {
            echo '<a href="?pagina=' . $total_paginas . '">Última</a>';
        }
        ?>
    </div>
</body>
</html>

<?php
mysqli_free_result($result);
mysqli_close($link);
?>
