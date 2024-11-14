<?php
// Verificar si se ha enviado un formulario para configurar el tipo de titular
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo_titular = $_POST['tipo_titular'];
    
    // Guardar la preferencia en una cookie que dura 7 días
    setcookie('tipo_titular', $tipo_titular, time() + (7 * 24 * 60 * 60));
    
    // Redirigir a la página principal
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Configurar Titular</title>
</head>
<body>
    <h1>Configurar Tipo de Titular</h1>

    <form method="POST" action="">
        <p>Selecciona el tipo de titular que deseas ver:</p>
        <input type="radio" name="tipo_titular" value="politica" required> Noticia Política<br>
        <input type="radio" name="tipo_titular" value="economia"> Noticia Económica<br>
        <input type="radio" name="tipo_titular" value="deportes"> Noticia Deportiva<br><br>
        
        <button type="submit">Guardar Preferencia</button>
    </form>
</body>
</html>
