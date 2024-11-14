<?php
session_start();

// Verificamos que las variables de sesión existen
if (isset($_SESSION['user']) && isset($_SESSION['contra'])) {
    $username = $_SESSION['user'];
    $password = $_SESSION['contra'];
} else {
    echo "No ha iniciado sesión.";
    exit();
}
?>

<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Práctica 7 Ejercicio 5</title>
</head>

<body>
    <h2>Bienvenido, <?php echo ($username); ?></h2>
    <p>Su clave es: <?php echo ($password); ?></p>
</body>

</html>