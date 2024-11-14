<!-- 
Crear una página que puede configurarse con distintos estilos CSS. El usuario es quien decide qué
aspecto desea que tenga la página, por medio de un formulario. Luego la página es capaz de
recordar, entre los distintos accesos que realice el usuario, el aspecto que había elegido para
mostrar la web. 
-->

<?php

//Ver su recibo datos y creo la cookie, si no recibí nada chequeo la cookie

if(isset($_POST["estilo"])){
    $estilo = $_POST["estilo"];
    setcookie("estilo", $estilo, time() + (60*60*24*90));
}else{
    if (isset($_COOKIE["estilo"])){
        $estilo = $_COOKIE["estilo"];
    }
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <?php

        if(isset($estilo)){
            echo '<link rel="stylesheet" type="text/css" href="'.$estilo.'.css">';
        };
        ?>
        <title>Práctica 7 Ejercicio 1</title>
    </head>
    <body>

    <form action="" method="post">
        Selección de estilos de la página
        <select name="estilo" id="estilo">
            <option value="verde">Verde</option>
            <option value="rosa">Rosa</option>
            <option value="negro">Negro</option>
        </select>
        <input type="submit" value="Actualizar">
    </form>

    </body>
</html>