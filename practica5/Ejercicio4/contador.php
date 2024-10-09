<?php
//Seteo contador
    if(!isset($_SESSION["contador"])){
        $_SESSION["contador"] = 1;
    }else{
        $_SESSION["contador"]++;
    }

    // Mostrar el total de visitas
    echo "<font face='arial' size='3'>Cantidad de visitas:".$_SESSION["contador"]."</font>";
?>
