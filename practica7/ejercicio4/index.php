<!--
Confeccionar una página que simule ser la de un periódico. La misma debe permitir configurar qué
tipo de titular deseamos que aparezca al visitarla, pudiendo ser:
Noticia política, Noticia económica o Noticia deportiva.
Mediante tres objetos de tipo radio, permitir seleccionar qué titular debe mostrar el periódico.
Almacenar en una cookie el tipo de titular que desea ver el cliente. La primera vez que visita el
sitio deben aparecer los tres titulares. Disponer un hipervínculo a una tercer página que borre la
cookie creada. 
-->


<?php
// Verificar si la cookie 'tipo_titular' está configurada
$tipo_titular = isset($_COOKIE['tipo_titular']) ? $_COOKIE['tipo_titular'] : 'todos';

function mostrarTitular($tipo) {
    switch ($tipo) {
        case 'politica':
            echo "<h2>Titular de Política</h2><p>Últimas noticias sobre política nacional e internacional...</p>";
            break;
        case 'economia':
            echo "<h2>Titular de Economía</h2><p>Análisis de los mercados y la economía mundial...</p>";
            break;
        case 'deportes':
            echo "<h2>Titular de Deportes</h2><p>Las noticias más destacadas del mundo deportivo...</p>";
            break;
        case 'todos':
            echo "<h2>Titular de Política</h2><p>Últimas noticias sobre política nacional e internacional...</p>";
            echo "<h2>Titular de Economía</h2><p>Análisis de los mercados y la economía mundial...</p>";
            echo "<h2>Titular de Deportes</h2><p>Las noticias más destacadas del mundo deportivo...</p>";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Periódico Diario</title>
</head>
<body>
    <h1>Periódico Diario</h1>

    <!-- Mostrar el titular seleccionado o todos si no hay selección -->
    <?php mostrarTitular($tipo_titular); ?>

    <hr>
    <p>
        <a href="configurar.php">Configurar tipo de titular</a> |
        <a href="borrar_cookie.php">Borrar preferencia de titular</a>
    </p>
</body>
</html>
