<html>
    <head></head>
    <body>
        <?php

            // Tuve que agregar esto porque sino apache me devolvía "Message is missing sender's address"
            $encabezado = 'From: ' .$_POST["correo"] . "\r\n". 
            'Reply-To: ' . $_POST["correo"]. "\r\n" . 
            'X-Mailer: PHP/' . phpversion();

            function mandarmail($mail,$asunto,$mensaje,$headers){
                if(mail($mail,$asunto,$mensaje,$headers)){
                echo "Correo enviado";
                return true;
            }
            else{
                echo "Error al enviar correo";
                return false;
            }
            }


            mandarmail($_POST["correo"],$_POST["asunto"],$_POST["mensaje"],$encabezado);
        ?>
    </body>
</html>