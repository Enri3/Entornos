<?php
session_start();

$_SESSION['user'] = $_POST['user'];
$_SESSION['contra'] = $_POST['pass'];


?>

<form action="perfil.php" method="post">
        <input type="submit" value="Ir al perfil">
</form>