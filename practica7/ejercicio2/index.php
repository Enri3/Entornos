<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Práctica 5 Ejercicio 2</title>
    </head>
    <body>

    <?php
        if ($visitas >= 1) {
            echo "Esta es tu visita número " .$_COOKIE['visitas'];
        }
                
        else {
            echo "¡Bienvenido! Esta es la primera vez que visitás la página";
        }
    ?>

    </body>
</html>