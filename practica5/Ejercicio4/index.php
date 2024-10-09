<?php
    // inicio de session
    session_start();

    if (isset($_POST["reinicio"])) {
        // Borrar variables de sesión
        session_unset();
        // Destruir la sesión
        session_destroy();
        // Empezarla de nuevo
        session_start();
    }
?>
<!DOCTYPE html>
<!-- Página que va a contener al contador de visitas -->
<html>

    <head></head>
    <body>
        <h2>Contador de visitas</h2>

        <?php include("contador.php"); ?>

        <form method="post">
            <input type="submit" name="reinicio" value="Reiniciar Sesion">
        </form>

        <form action="index.php">
            <input type="submit" value="Visitar de nuevo">
        </form>

    </body>
</html>