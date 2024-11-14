<?php
    session_start(); // Iniciamos la sesión
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Práctica 7 Ejercicio 5 - Login</title>
</head>

<body>
    <h2>Iniciar sesión</h2>

    <form action="session.php" method="post">
        <label for="username">Nombre de usuario:</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Clave:</label>
        <input type="password" name="password" id="password" required><br><br>

        <input type="submit" value="Iniciar sesión">
    </form>
    
</body>

</html>