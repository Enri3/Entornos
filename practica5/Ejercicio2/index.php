<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Práctica 5 Ejercicio 2</title>
    </head>

    <body>

        <?php

            $mailwebmaster = ""; // Ingresar el mail del webmaster.
            
            function mandarmail($mail,$asunto,$mensaje,$correo,$nombre,$telefono){

                $encabezado = 'From: ' .$nombre.' <' .$correo.'>' . "\r\n". 'X-Mailer: PHP/' . phpversion();
                $mensaje = "Nombre: ".$nombre."\n".
                           "Correo: ".$correo."\n".
                           "Teléfono: ".$telefono."\n"."\n".
                           "Te ha contactado con el siguiente mensaje: "."\n".$mensaje;

                if(mail($mail,$asunto,$mensaje,$encabezado)){
                    echo " Correo enviado!";
                    return true;
                }else{
                    echo " Error al enviar correo";
                    return false;
                }
            }

        ?>

        <form class="container mt-5" method="post">

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" placeholder="Enrico Reschini" name="nombre">
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label">Email</label>
                <input type="email" class="form-control" id="correo" placeholder="enrico@yahoo.com" name="correo">
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" placeholder="341 4548798" name="telefono">
                <div id="telefono" class="form-text">
                    Ingrese su teléfono sin el 0 y sin el 15 de la forma que se muestra en el ejemplo.
                </div>
            </div>

            <div class="mb-3">
                <label for="asunto" class="form-label">Asunto</label>
                <input type="text" class="form-control" id="asunto" placeholder="Consulta sobre CSS" name="asunto">
            </div>

            <div class="mb-3">
                <label for="mensaje" class="form-label">Cuerpo de Mensaje</label>
                <textarea class="form-control" id="mensaje" rows="3" name="mensaje"></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
            <?php 
                if(isset($_POST["enviar"])){
                    mandarmail($mailwebmaster,$_POST["asunto"],$_POST["mensaje"],$_POST["correo"],$_POST["nombre"],$_POST["telefono"]);}
            ?>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    
</html>