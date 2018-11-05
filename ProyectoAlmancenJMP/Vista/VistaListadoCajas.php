<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista Cajas</title>
        <link rel="stylesheet" type="text/css" href="../CSS/styleTablas.css" title="style">
    </head>
    <body>
        <h1 align="center">Listado Cajas</h1>
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
            $caja = $_SESSION['cajas'];
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
                <td bgcolor="<?php echo $fila->getColor();?>"></td>
            </tbody>
            <?php
            // put your code here
        }
        ?>
    </table>
</body>
</html>
