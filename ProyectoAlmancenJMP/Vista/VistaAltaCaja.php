<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta Caja</title>
        <script type="text/javascript" src="../JavaScript/altaCajas.js"></script>
        <link rel="stylesheet" type="text/css" href="../CSS/styleVistaAltaCaja.css" title="style">
    </head>
    <body>
        <form action="../Controlador/ControladorInsertarCajas.php" method="POST">
            <fieldset id="fieldsetCaja">
                <legend id="caja">Alta Cajas</legend>
                <fieldset>    
                    Código: <input type="text" value="CA" name="codigo" required="">
                </fieldset><br>
                <fieldset>
                    <legend>Dimensiones:</legend>
                    Alto <input type="number" name="alto" min="1" required="">
                    <br><br>
                    Ancho <input type="number" name="ancho" min="1" required="">
                    <br><br>
                    Profundidad <input type="number" name="profundidad" min="1" required="">
                </fieldset><br>
                <fieldset>
                    Material: <input type="text" name="material" required=""><br><br>
                    Color: <input type="color" name="color" required="">
                </fieldset><br>
                <fieldset>
                    Contenido: <input type="text" name="contenido" required="">
                </fieldset><br>
                <fieldset>
                    <legend>Estantería</legend>
                    <select name="estanteriasdisponibles" onchange="lejasLibres(this.value)">
                        <option value="" selected="selected">Elige Estantería</option>
                        <?php
                        include "../Modelo/Estanteria.php";
                        session_start();
                        $ArrayEstanterias = $_SESSION['estanterias'];

                        foreach ($ArrayEstanterias as $fila) {
                            ?>
                            <!--Se muestra el pasillo y número de las estanterías-->
                            <option value="<?php echo $fila->id; ?>" ><?php echo "Pasillo: " . $fila->pasillo . " Número: " . $fila->numero ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <select name="lejasdisponibles" id="lejasdisponibles">
                        <option value="">Elige leja</option>
                    </select>
                </fieldset><br>
                <input type="submit" value="Enviar">
            </fieldset>
        </form>
        <?php
// put your code here
        ?>
    </body>
</html>
