<?php

include "../DAO/DaoOperaciones.php";

session_start();

$arrayInventario = DaoOperaciones::inventario();

$_SESSION['inventario'] = $arrayInventario;
header("Location:../Vista/VistaInventario.php");

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

