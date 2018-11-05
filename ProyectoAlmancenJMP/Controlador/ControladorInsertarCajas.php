<?php

include "../DAO/DaoOperaciones.php";
//include_once "../Modelo/Caja.php";
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

/*Usamos transacciones ya que son varias operaciones las que tenemos que hacer
 * y tenemos que asegurarnos de que todas se hagan correctamente para poder
 * guardar los cambios que se hagan en la base de datos, si una de las 
 * operaciones falla, debemos deshacer todos los posibles cambios que se hayan
 * realizado antes de llegar a la operación que nos dió fallo.
 */
$conexion->autocommit(false);

try {
    
    DaoOperaciones::insertarCaja($caja, $ocupacion);
} catch (ExcepcionInsertarCaja $ex) {
    $conexion->rollback();
    //si algo falla dentro de la transacción deshacemos todos lo cambios.
    header("Location:../Vista/VistaMensajesError.php?mensaje=$ex");
}

$conexion->commit();
$mensaje = "TRANSACCIÓN CORRECTA";
header("Location:../Vista/VistaMensaje.php?mensaje=$mensaje");
$conexion->autocommit(true);


