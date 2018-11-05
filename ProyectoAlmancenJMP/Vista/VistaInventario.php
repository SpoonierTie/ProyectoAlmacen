<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/styleTablas.css" title="style">
        <title>Inventario</title>
    </head>
    <body>
        <h1 align="center">Inventario</h1>
        <table border="1" align="center">
            <thead>
                <tr>
                    <th>Código Estanteria</th>
                    <th>Pasillo</th>
                    <th>Número</th>
                    <th>Leja</th>
                    <th>Código Caja</th>
                    <th>Alto</th>
                    <th>Ancho</th>
                    <th>Profundidad</th>
                    <th>Material</th>
                    <th>Color</th>
                    <th>Contenido</th>
                    
                </tr>
            </thead>
            <?php
            session_start();
            $arrayInventario = $_SESSION['inventario'];
            foreach ($arrayInventario as $fila) {
                //echo $fila['nombre'];
                //echo $fila['apellidos'];
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $fila->codigoEstanteria; ?></td>
                        <td><?php echo $fila->pasillo; ?></td>
                        <td><?php echo $fila->numero; ?></td>
                        <td><?php echo $fila->numLeja; ?></td>
                        <td><?php echo $fila->codigoCaja; ?></td>
                        <td><?php echo $fila->alto; ?></td>
                        <td><?php echo $fila->ancho; ?></td>
                        <td><?php echo $fila->profundidad; ?></td>
                        <td><?php echo $fila->material; ?></td>
                        <td bgcolor="<?php echo $fila->color; ?>"></td>
                        <td><?php echo $fila->contenido; ?></td>    
                    </tr>
                </tbody>
                <?php
            }
            ?>
        </table>


    </body>
</html>
