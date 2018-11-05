<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta Estantería</title>
        <style>
            body{
                background-color: #A9F5A9;
            }
            table{
                background-color: #81F7F3;
                font-size: 20px;
                font-family: Helvetica;
                font-weight: bolder;
            }
            input{
                width: 150px;
                font-size: 20px;
            }
            select{
                width: auto;
                font-size: 20px;
            }
        </style>
        <script type="text/javascript" src="../JavaScript/altaEstanteria.js"></script>
    </head>
    <body>
        <h1 align="center">Insertar Estantería</h1>
        <table border="1" align="center">
            <thead>
                <tr>
                    <th>Estantería</th>
                </tr>
            </thead>
            <tbody>
            <form action="../Controlador/ControladorInsertarEstanterias.php" method="POST">
                <tr>
                    <td>Código: <input type="text" name="codigo" value="ES" required=""></td>
                </tr>
                <tr>
                    <td>Número de Lejas: <input type="number" name="numLejas" min="1" required=""></td>
                </tr>
                <tr>
                    <td>Pasillo: 
                        <select name="pasillosdisponibles" onchange="huecosLibres(this.value)">
                            <option value="" selected="selected">Elige Pasillo</option>
                            <?php
                            include "../Modelo/Pasillo.php";
                            session_start();
                            $ArrayPasillo = $_SESSION['pasillos'];

                            foreach ($ArrayPasillo as $fila) {
                                ?>
                                <!--Se muestra el pasillo y número de los lugares disponibles-->
                                <option value="<?php echo $fila->getId(); ?>" ><?php echo "Pasillo: " . $fila->getPasillo(); ?></option>
                                <?php
                            }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td>Número: 
                        <select name="lugardisponible" id="lugardisponible">
                            <option value="">Elige lugar</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="enviar" value="Enviar"></td>
                </tr>
            </form>
        </tbody>
    </table>

    <?php
    // put your code here
    ?>
</body>
</html>
