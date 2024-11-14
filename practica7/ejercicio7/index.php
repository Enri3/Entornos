<!-- 
Confeccionar un CARRITO DE COMPRAS simple, usando Base de Datos. Se debe crear una base de
datos con el nombre Compras. En dicha base crear una tabla llamada catálogo con los siguientes
atributos:
id
producto del tipo varchar de 100
precio del tipo numérico decimal de 9 entero y 2 decimales
-->

<?php
// Iniciar la sesión
session_start();

// Conectar a la base de datos
$link = mysqli_connect('localhost', 'root');
mysqli_select_db ($link, 'base2');

if (!$link) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Procesar el formulario de inserción
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $codigocurso = $_POST['codigocurso'];
    $mail = $_POST['mail'];

    // Insertar el nuevo alumno en la tabla 'alumnos'
    $query = "INSERT INTO alumnos (nombre, codigocurso, mail) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "sis", $nombre, $codigocurso, $mail);

    if (mysqli_stmt_execute($stmt)) {
        echo "<p>Alumno registrado exitosamente.</p>";
    } else {
        echo "<p>Error al registrar el alumno: " . mysqli_error($link) . "</p>";
    }

    // Liberar el statement
    mysqli_stmt_close($stmt);
}

// Cerrar la conexión
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Nuevos Alumnos e Inicio de Sesión</title>
</head>
<body>
    <h2>Registrar Nuevo Alumno</h2>
    <form action="index.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="codigocurso">Código del Curso:</label>
        <input type="number" name="codigocurso" id="codigocurso" required><br><br>

        <label for="mail">Correo Electrónico:</label>
        <input type="email" name="mail" id="mail" required><br><br>

        <button type="submit">Registrar Alumno</button>
    </form>

    <hr>

    <h2>Opciones</h2>
    <!-- Enlace para iniciar sesión -->
    <p>¿Ya tienes una cuenta? <a href="login.php">Iniciar Sesión</a></p>
</body>
</html>
