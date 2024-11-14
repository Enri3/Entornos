<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página de Bienvenida</title>
</head>
<body>
    <?php if (isset($_SESSION['nombre'])): ?>
        <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?>!</h2>
        <p>Has iniciado sesión correctamente.</p>
    <?php else: ?>
        <h2>Acceso Denegado</h2>
        <p>No tienes permiso para acceder a esta página. <a href="login.php">Iniciar Sesión</a></p>
    <?php endif; ?>
</body>
</html>
