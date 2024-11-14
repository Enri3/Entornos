<?php
// Borrar la cookie 'tipo_titular'
setcookie('tipo_titular', '', time() - 3600); // Expira en el pasado

// Redirigir a la página principal
header("Location: index.php");
exit();
?>
