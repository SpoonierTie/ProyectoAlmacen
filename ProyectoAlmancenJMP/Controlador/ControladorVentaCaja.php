<?php
include "../DAO/DaoOperaciones.php";
session_start();

$codigoCaja = $_REQUEST['codigoCaja'];

$ArrayCajas = DaoOperaciones::sacarInformacionCaja($codigoCaja);

$_SESSION['codigoCaja'] = $codigoCaja;
$_SESSION['caja'] = $ArrayCajas;
header("Location:../Vista/VistaInfoVentaCaja.php");

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

