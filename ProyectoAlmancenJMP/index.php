<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/styleIndex.css" title="style">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li class="submenu">
                        <a href="#">Estantería</a>
                        <ul class="children">
                            <li><a href="Controlador/ControladorPasillosLibres.php">Alta Estantería</a></li>
                            <li><a href="Controlador/ControladorListarEstanterias.php">Listar Estanterías</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#">Cajas</a>
                        <ul class="children">
                            <li><a href="Controlador/ControladorEstanteriasLibres.php">Alta Caja</a></li>
                            <li><a href="Controlador/ControladorListarCajas.php">Listar Cajas</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#">Almacén</a>
                        <ul class="children">
                            <li><a href="Vista/VistaVentaCaja.php">Venta Caja</a></li>
                            <li><a href="#">Devolver Caja</a></li>
                            <li><a href="Controlador/ControladorListarInventario.php">Inventario</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>   
        <?php
        // put your code here
        ?>
    </body>
</html>
