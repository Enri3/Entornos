<!-- 
Crear una cookie llamada “contador” que lleve la cuenta en el lado cliente del número de veces que
se ha accedido a la página contador.php. Si es la primera vez que se accede, la página dará la
bienvenida al usuario. Si ya se ha accedido anteriormente, la página hará uso de la cookie para
mostrar el número de veces que se ha visitado dicha página.
-->

<?php

        if (!isset($_COOKIE['visitas'])) {
            $visitas = 1;
            setcookie("visitas", $visitas , time()+ 3600*24*365);
        }
        else {
            $visitas = $_COOKIE['visitas'] + 1;
            setcookie("visitas", $visitas , time()+ 3600*24*365);
        }
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Práctica 7 Ejercicio 2</title>
    </head>
    <body>

    <?php
        if(isset($_COOKIE['visitas'])) {
            echo "Esta es tu visita número " .$_COOKIE['visitas'];
        }
                
        else {
            echo "¡Bienvenido! Esta es la primera vez que visitás la página";
        }
    ?>

    </body>
</html>