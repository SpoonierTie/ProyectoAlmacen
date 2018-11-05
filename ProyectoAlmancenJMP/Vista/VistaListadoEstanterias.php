<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista Estanterias</title>
        <link rel="stylesheet" type="text/css" href="../CSS/styleTablas.css" title="style">
    </head>
    <body>
        <h1 align="center">Listado Estanterias</h1>
        <table border="1" align="center">
            <tr>
                <th>Código</th>
                <th>Número de Lejas</th>
                <th>Pasillo</th>
                <th>Número</th>
                <th>Número Lejas Ocupadas</th>
            </tr>
            <?php
            include "../Modelo/Estanteria.php";
            session_start();
            $estanteria = $_SESSION['estanteria'];
            foreach ($estanteria as $fila) {
                //echo $fila['nombre'];
                //echo $fila['apellidos'];
                ?>
                <tbody>
                <td> <?php echo $fila->codigoEstanteria; ?></td>
                <td> <?php echo $fila->numLejas; ?></td>
                <td> <?php echo $fila->pasillo;?></td>
                <td> <?php echo $fila->numero;?></td>
                <td> <?php echo $fila->numLejasOcupadas;?></td>
            </tbody>
            <?php
            // put your code here
        }
        ?>
    </table>
    </body>
</html>
