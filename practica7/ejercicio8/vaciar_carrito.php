<?php
session_start();

// Vaciar el carrito
unset($_SESSION['carrito']);

// Redirigir a la página del carrito
header("Location: index.php");
exit;
?>
