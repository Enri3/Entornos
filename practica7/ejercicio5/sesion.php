<?php
session_start();

// Verificamos que los datos fueron enviados
if (isset($_POST['user']) && isset($_POST['contra'])) {
    
    $_SESSION['user'] = $_POST['user'];
    $_SESSION['contra'] = $_POST['contra'];

    header("Location: perfil.php");
    exit();

} else {
    echo "Debe proporcionar un nombre de usuario y clave.";
}

?>