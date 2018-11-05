<?php

include "../DAO/DaoOPeraciones.php";

session_start();

$ArrayCajas = DaoOperaciones::listarCajas();

$_SESSION['cajas'] = $ArrayCajas;

header("Location:../Vista/VistaListadoCajas.php");

