<!-- 
Crear un formulario que solicite la carga del nombre de usuario. Cuando se presione un botón
crear una cookie para dicho usuario. Luego cada vez que ingrese al formulario mostrar el último
nombre de usuario ingresado. 
-->

<?php

//Ver su recibo datos y creo la cookie, si no recibí nada chequeo la cookie

if(isset($_POST["nombre"])){
    $nombre = $_POST["nombre"];
    setcookie("nombre", $nombre, time() + (60*60*24*90));
}else{
    if (isset($_COOKIE["nombre"])){
        $nombre = $_COOKIE["nombre"];
    }
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>  
        <title>Práctica 5 Ejercicio 3</title>
    </head>
    <body>

        <?php
    
            if(isset($nombre)){
                echo '<p>Bienvenido! '.$nombre.' </p>';
            };
        ?>
        <form action="" method="post">
        
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
                </div>
            <button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
        </form>

    </body>
</html>