<?php
// Borrar la cookie 'tipo_titular'
setcookie('tipo_titular', '', time() - 3600); // Expira en el pasado

// Redirigir a la página principal

?>
<h1>Preferencia de titular borrada</h1>
<a href="index.php">Volver a la página inicial</a>