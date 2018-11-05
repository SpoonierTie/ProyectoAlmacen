<?php
include "../DAO/DaoOperaciones.php";
session_start();

$arrayEstanterias = DaoOperaciones::sacarEstanteriasLibres();

$_SESSION['estanterias'] = $arrayEstanterias;

header("Location:../Vista/VistaAltaCaja.php");


