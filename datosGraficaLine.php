<?php
require "config/conexion.php";

//Consulta para traernos los datos de los equipos (Tablet One).

$sqlTabletOne = "SELECT COUNT(*) ic_dispositivo FROM datos_del_dispotivo WHERE id_tipo_de_dispositivo = 1";
$resultadoTableOne = $mysqli->query($sqlTabletOne);
$rowCantidadTabletOne = mysqli_fetch_assoc($resultadoTableOne);
$CantidadTablet = $rowCantidadTabletOne['ic_dispositivo'];

//Consulta para traernos los datos de los equipos (Tablet Dos).

$sqlTabletDos = "SELECT COUNT(*) ic_dispositivo FROM datos_del_dispotivo WHERE id_tipo_de_dispositivo = 2";
$resultadoTableDos = $mysqli->query($sqlTabletDos);
$rowCantidadTabletDos = mysqli_fetch_assoc($resultadoTableDos);
$CantidadTabletDos = $rowCantidadTabletDos['ic_dispositivo'];

//Consulta para traernos los datos de los equipos (Canaima 1).

$sqlCanaimaOne = "SELECT COUNT(*) ic_dispositivo FROM datos_del_dispotivo WHERE id_tipo_de_dispositivo = 3";
$resultadoCanaimaOne = $mysqli->query($sqlCanaimaOne);
$rowCantidadCanaimaOne = mysqli_fetch_assoc($resultadoCanaimaOne);
$CantidadCanaimaOne = $rowCantidadCanaimaOne['ic_dispositivo'];

//Consulta para traernos los datos de los equipos (Canaima 2).

$sqlCanaimaDos = "SELECT COUNT(*) ic_dispositivo FROM datos_del_dispotivo WHERE id_tipo_de_dispositivo = 4";
$resultadoCanaimaDos = $mysqli->query($sqlCanaimaDos);
$rowCantidadCanaimaDos = mysqli_fetch_assoc($resultadoCanaimaDos);
$CantidadCanaimaDos = $rowCantidadCanaimaDos['ic_dispositivo'];

//Consulta para traernos los datos de los equipos (Canaima 3).

$sqlCanaimaTres = "SELECT COUNT(*) ic_dispositivo FROM datos_del_dispotivo WHERE id_tipo_de_dispositivo = 5";
$resultadoCanaimaTres = $mysqli->query($sqlCanaimaTres);
$rowCantidadCanaimaTres = mysqli_fetch_assoc($resultadoCanaimaTres);
$CantidadCanaimatres = $rowCantidadCanaimaTres['ic_dispositivo'];

//Consulta para traernos los datos de los equipos (Canaima 4).

$sqlCanaimaCuatro = "SELECT COUNT(*) ic_dispositivo FROM datos_del_dispotivo WHERE id_tipo_de_dispositivo = 6";
$resultadoCanaimaCuatro = $mysqli->query($sqlCanaimaCuatro);
$rowCantidadCanaimaCuatro = mysqli_fetch_assoc($resultadoCanaimaCuatro);
$CantidadCanaimaCuatro = $rowCantidadCanaimaCuatro['ic_dispositivo'];

//Consulta para traernos los datos de los equipos (Canaima 5).

$sqlCanaimaCinco = "SELECT COUNT(*) ic_dispositivo FROM datos_del_dispotivo WHERE id_tipo_de_dispositivo = 7";
$resultadoCanaimaCinco = $mysqli->query($sqlCanaimaCinco);
$rowCantidadCanaimaCinco = mysqli_fetch_assoc($resultadoCanaimaCinco);
$CantidadCanaimaCinco = $rowCantidadCanaimaCinco['ic_dispositivo'];

//Consulta para traernos los datos de los equipos (Canaima Docente).

$sqlCanaimaDocente = "SELECT COUNT(*) ic_dispositivo FROM datos_del_dispotivo WHERE id_tipo_de_dispositivo = 8";
$resultadoCanaimaDocente = $mysqli->query($sqlCanaimaDocente);
$rowCantidadCanaimaDocente = mysqli_fetch_assoc($resultadoCanaimaDocente);
$CantidadCanaimaDocente = $rowCantidadCanaimaDocente['ic_dispositivo'];

//Consulta para traernos los datos de los equipos (Tablet 3).

$sqlTabletTres = "SELECT COUNT(*) ic_dispositivo FROM datos_del_dispotivo WHERE id_tipo_de_dispositivo = 9";
$resultadoTabletTres = $mysqli->query($sqlTabletTres);
$rowCantidadTabletTres = mysqli_fetch_assoc($resultadoTabletTres);
$CantidadTabletTres = $rowCantidadTabletTres['ic_dispositivo'];

//Consulta para traernos los datos de los equipos (Tablet 3).

$sqlCanaimaSeis = "SELECT COUNT(*) ic_dispositivo FROM datos_del_dispotivo WHERE id_tipo_de_dispositivo = 10";
$resultadoCanaimaSeis = $mysqli->query($sqlCanaimaSeis);
$rowCantidadCanaimaSeis = mysqli_fetch_assoc($resultadoCanaimaSeis);
$CantidadCanaimaSeis = $rowCantidadCanaimaSeis['ic_dispositivo'];


?>