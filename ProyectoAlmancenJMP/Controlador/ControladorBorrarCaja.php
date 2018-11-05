<?php
include "../DAO/DaoOperaciones.php";
session_start();

$codigoCaja = $_SESSION['codigoCaja'];

$mensaje = DaoOperaciones::venderCaja($codigoCaja);

header("Location:../Vista/VistaMensajesError.php?mensaje=$mensaje");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

