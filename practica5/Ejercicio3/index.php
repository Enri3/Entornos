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
            
            function mandarmail($mail,$nombre){

                $encabezado = 'From: mail@sitio.com'. "\r\n". 'X-Mailer: PHP/' . phpversion();
                $asunto = "Te han recomendado visitarnos!";
                $mensaje = $nombre.
                           " cree que nuestro sitio es buenisimo y vos deberías conocerlo!"."\n".
                           "Visitanos en: www.nuestrositio.com";

                if(mail($mail,$asunto,$mensaje,$encabezado)){
                    echo " Recomendación enviada!";
                    return true;
                }else{
                    echo " Error al enviar la recomendación";
                    return false;
                }
            }

        ?>
        
        <div class="container mt-3">
          <h3>Recomendanos!</h3>

          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
            Recomendar a un amigo
          </button>
          
            <?php 
                        if(isset($_POST["enviar"])){
                            mandarmail($_POST["correo"],$_POST["nombre"]);
                          }
            ?>
        </div>

        <div class="modal" id="myModal">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Ingrese los datos!</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
              <form class="container mt-5" method="post">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Su nombre</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre" name="nombre">
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Email de su amigo</label>
                    <input type="email" class="form-control" id="correo" placeholder="Ingrese el mail de su amigo para enviar la recomendación" name="correo">
                </div>

                
                </form>
              </div>
                    
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="enviar" data-bs-dismiss="modal">Recomendanos!</button>
              </div>
            </div>
          </div>
        </div>

    </body>
</html>