<!--Realizar una página donde carguemos en un formulario el nombre de usuario y clave de un cliente.
Luego realizar una segunda página donde se creen dos variables de sesión. Y como última página
crear una tercera en la cual se recuperen los valores almacenados en las variables de sesión
anterior. -->

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

    <form action="sesion.php" method="post">
        <label for="user">Nombre de usuario:</label>
        <input type="text" name="user" id="user" required><br><br>

        <label for="pass">Clave:</label>
        <input type="pass" name="pass" id="pass" required><br><br>

        <input type="submit" value="Iniciar sesión">
    </form>
    
</body>

</html>