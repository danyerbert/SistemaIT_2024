<?php
require "config/conexion.php";

//Datos para Graficos de torta (Recibidos.)

$sqlRecibidos = "SELECT COUNT(*) ic_dispositivo FROM datos_del_dispotivo WHERE id_estatus = 1";
$resultadoRecibidos = $mysqli->query($sqlRecibidos);
$rowRecibidos = mysqli_fetch_assoc($resultadoRecibidos);
$cantidadRecibidos = $rowRecibidos['ic_dispositivo'];

//Datos para Graficos de torta (En linea.)

$sqlEnLinea = "SELECT COUNT(*) ic_dispositivo FROM datos_del_dispotivo WHERE id_estatus = 2";
$resultadoEnLinea = $mysqli->query($sqlEnLinea);
$rowEnLinea = mysqli_fetch_assoc($resultadoEnLinea);
$cantidadEnLinea = $rowEnLinea['ic_dispositivo'];

//Datos para Graficos de torta (Reparados.)

$sqlReparados = "SELECT COUNT(*) ic_dispositivo FROM datos_del_dispotivo WHERE id_estatus = 3";
$resultadoReparados = $mysqli->query($sqlReparados);
$rowReparados = mysqli_fetch_assoc($resultadoReparados);
$cantidadReparados = $rowReparados['ic_dispositivo'];

//Datos para Graficos de torta (Por verificar.)

$sqlPorVerificar = "SELECT COUNT(*) ic_dispositivo FROM datos_del_dispotivo WHERE id_estatus = 4";
$resultadoPorVerificar = $mysqli->query($sqlPorVerificar);
$rowPorVerificar = mysqli_fetch_assoc($resultadoPorVerificar);
$cantidadPorVerificar = $rowPorVerificar['ic_dispositivo'];

//Datos para Graficos de torta (Verificado.)

$sqlVerificado = "SELECT COUNT(*) ic_dispositivo FROM datos_del_dispotivo WHERE id_estatus = 5";
$resultadoVerificado = $mysqli->query($sqlVerificado);
$rowVerificado = mysqli_fetch_assoc($resultadoVerificado);
$cantidadVerificado = $rowVerificado['ic_dispositivo'];

//Datos para Graficos de torta (Por Entregar.)

$sqlPorEntregar = "SELECT COUNT(*) ic_dispositivo FROM datos_del_dispotivo WHERE id_estatus = 6";
$resultadoPorEntregar = $mysqli->query($sqlPorEntregar);
$rowPorEntregar = mysqli_fetch_assoc($resultadoPorEntregar);
$cantidadPorEntregar = $rowPorEntregar['ic_dispositivo'];

//Datos para Graficos de torta (Entregado.)

$sqlEntregados = "SELECT COUNT(*) ic_dispositivo FROM datos_del_dispotivo WHERE id_estatus = 7";
$resultadoEntregados = $mysqli->query($sqlEntregados);
$rowEntregados = mysqli_fetch_assoc($resultadoEntregados);
$cantidadEntregados = $rowEntregados['ic_dispositivo'];


?>