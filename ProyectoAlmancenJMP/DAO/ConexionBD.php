<?php

$conexion = new mysqli("localhost", "root", "root");
$error = $conexion->connect_errno;
if ($error != null) {
    echo "<p>Error $error estableciendo la conexion:"
    . "$conexion->connect_error</p>";
    exit();
} else {
    $conexion->select_db('bd_almacen_jmp');
    $error = $conexion->errno;
    if ($error != null) {
        echo "<p>Error $error conectando a la base de datos:"
        . "$conexion->error</p>";
        exit();
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

