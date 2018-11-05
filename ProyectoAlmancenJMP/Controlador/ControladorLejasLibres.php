<?php
include "../DAO/DaoOperaciones.php";

$idEstanteria = $_REQUEST['estanteriasdisponibles'];

DaoOperaciones::crearArrayLejas($idEstanteria);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

