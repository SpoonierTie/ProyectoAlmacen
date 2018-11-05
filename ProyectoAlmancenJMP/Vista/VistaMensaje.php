<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="3;URL=../index.php" />
        <title>CORRECTO</title>
        <style>
            thead{
                background-color: green;
            }
        </style>
    </head>
    <body>
        <table border="1" align="center">
            <thead>
                <tr>
                    <th>TODO CORRECTO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php
                        // put your code here
                        $mensaje = $_REQUEST['mensaje'];
                        echo $mensaje;
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
