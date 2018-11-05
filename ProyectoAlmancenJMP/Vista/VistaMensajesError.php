<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ERROR</title>
        <style>
            thead{
                background-color: red;
            }
        </style>
    </head>
    <body>
        <table border="1" align="center">
            <thead>
                <tr>
                    <th>ERROR</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php
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
