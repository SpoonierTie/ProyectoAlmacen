<?php

include "../DAO/DaoOperaciones.php";
include_once "../Modelo/Caja.php";
include_once "../Modelo/Ocupacion.php";
//include "../Modelo/ExcepcionInsertarCaja.php";
//include "../DAO/ConexionBD.php";

$codigo = $_REQUEST['codigo'];
$contenido = $_REQUEST['contenido'];
$alto = $_REQUEST['alto'];
$ancho = $_REQUEST['ancho'];
$profundidad = $_REQUEST['profundidad'];
$material = $_REQUEST['material'];
$color = $_REQUEST['color'];
$idEstanteria = $_REQUEST['estanteriasdisponibles'];
$leja = $_REQUEST['lejasdisponibles'];

$caja = new Caja($codigo, $contenido, $alto, $ancho, $profundidad, $material, $color);
$ocupacion = new Ocupacion($idEstanteria, $leja);

$conexion->autocommit(false);
try {
    
    DaoOperaciones::insertarCaja($caja, $ocupacion);
} catch (ExcepcionInsertarCaja $ex) {
    $conexion->rollback();
    header("Location:../Vista/VistaMensajesError.php?mensaje=$ex");
}

$conexion->commit();
$mensaje = "TRANSACCIÓN CORRECTA";
header("Location:../Vista/VistaMensaje.php?mensaje=$mensaje");
$conexion->autocommit(true);


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

