<?php

include "../DAO/DaoOperaciones.php";

session_start();

$arrayPasillos = DaoOperaciones::sacarPasillosLibres();

$_SESSION['pasillos'] = $arrayPasillos;

header("Location:../Vista/VistaInsertarEstanteria.php");
