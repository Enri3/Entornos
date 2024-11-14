<?php
session_start();

// Conectar a la base de datos
$link = mysqli_connect('localhost', 'root');
mysqli_select_db ($link, 'base2');

if (!$link) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener el correo ingresado
$mail = $_POST['mail'];

// Consulta para verificar si el correo existe
$query = "SELECT nombre FROM alumnos WHERE mail = ?";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "s", $mail);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $nombre);
mysqli_stmt_fetch($stmt);

if ($nombre) {
    // Almacenar el nombre en la variable de sesión
    $_SESSION['nombre'] = $nombre;
    echo "<p>Bienvenido, $nombre. <a href='bienvenida.php'>Ir a la página de bienvenida</a></p>";
} else {
    echo "<p>Correo no registrado. <a href='login.php'>Intentar de nuevo</a></p>";
}

// Cerrar la conexión y liberar recursos
mysqli_stmt_close($stmt);
mysqli_close($link);
?>
