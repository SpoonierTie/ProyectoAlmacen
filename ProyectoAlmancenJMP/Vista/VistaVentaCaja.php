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
        <form action="../Controlador/ControladorVentaCaja.php" method="POST">
            <table border="1" align="center">
                <thead>
                    <tr>
                        <th>VENTA CAJA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Introduce el código de la CAJA:
                            <input type="text" name="codigoCaja"></td>
                    </tr>
                    <tr>
                        <td align="center"><input type="submit" value="Buscar"</td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
