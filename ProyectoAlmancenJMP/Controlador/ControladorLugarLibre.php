<?php
include "../DAO/DaoOperaciones.php";

$idPasillo = $_REQUEST['pasillosdisponibles'];

DaoOperaciones::crearArrayLugares($idPasillo);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

