<?php

include_once "../Modelo/Estanteria.php";
include "../DAO/DaoOperaciones.php";

$codigo = $_REQUEST['codigo'];
$numLejas = $_REQUEST['numLejas'];
$idPasillo = $_REQUEST['pasillosdisponibles'];
$numero = $_REQUEST['lugardisponible'];

$estanteria = new Estanteria($codigo, $numLejas, $idPasillo, $numero,0);

$mensaje = DaoOperaciones::añadirEstanteria($estanteria);

header("Location:../Vista/VistaMensaje.php?mensaje=$mensaje");

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

