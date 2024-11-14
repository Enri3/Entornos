<!DOCTYPE html>

<!-- 
Crear una página que puede configurarse con distintos estilos CSS. El usuario es quien decide qué
aspecto desea que tenga la página, por medio de un formulario. Luego la página es capaz de
recordar, entre los distintos accesos que realice el usuario, el aspecto que había elegido para
mostrar la web. 
-->

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Práctica 5 Ejercicio 3</title>
    </head>
    <body>

    <form action="estilo.php" method="post">
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