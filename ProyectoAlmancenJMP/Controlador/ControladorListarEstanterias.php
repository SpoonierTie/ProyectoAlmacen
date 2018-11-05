<?php

include "../DAO/DaoOperaciones.php";
session_start();

$estanteria = DaoOperaciones::listarEstanterias();
$_SESSION['estanteria'] = $estanteria;

header("Location:../Vista/VistaListadoEstanterias.php");

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

