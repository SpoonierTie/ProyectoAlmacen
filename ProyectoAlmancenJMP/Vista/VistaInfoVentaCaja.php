<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="../Controlador/ControladorBorrarCaja.php" method="POST">
            <h1 align="center">VENTA CAJA</h1>
            <table border="1" align="center">
                <tr>
                    <th>Código</th>
                    <th>Contenido</th>
                    <th>Alto</th>
                    <th>Ancho</th>
                    <th>Profundidad</th>
                    <th>Material</th>
                    <th>Color</th>
                </tr>
                <?php
                include "../Modelo/Caja.php";
                session_start();
                $caja = $_SESSION['caja'];
                foreach ($caja as $fila) {
                    //echo $fila['nombre'];
                    //echo $fila['apellidos'];
                    ?>
                    <tbody>
                    <td> <?php echo $fila->getCodigo(); ?></td>
                    <td> <?php echo $fila->getContenido(); ?></td>
                    <td> <?php echo $fila->getAlto(); ?></td>
                    <td> <?php echo $fila->getAncho(); ?></td>
                    <td> <?php echo $fila->getProfundidad(); ?></td>
                    <td> <?php echo $fila->getMaterial(); ?></td>
                    <td bgcolor="<?php echo $fila->getColor(); ?>"></td>
                    </tbody>
                    <input type="submit" value="Borrar">
                    <?php
                    // put your code here
                }
                ?>
            </table>
        </form>
    </body>
</html>
