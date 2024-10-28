<?php


	require "../config/conexion.php";
	require "plantillaporentregar.php";


	$id = $_REQUEST['id'];
	$sql = "SELECT d.serial_equipo, d.serial_de_cargador, d.fecha_de_recepcion, d.estado_recepcion_equipo, d.fecha_de_entrega, j.nombre, j.modelo,  k.origen, m.estatus, b.tipo_de_motivo , t.estado FROM datos_del_dispotivo AS d 
	INNER JOIN tipo_de_equipo AS j ON j.id_tipo_de_equipo=d.id_tipo_de_dispositivo
	INNER JOIN origen AS k ON k.id_origen = d.id_origen
	INNER JOIN estatus AS m ON m.id_estatus = d.id_estatus
	INNER JOIN motivo AS b ON b.id_motivo = d.id_motivo
	INNER JOIN tipo_estado AS t ON t.id = d.estado_recepcion_equipo WHERE d.id_estatus = $id";

$resultado = $mysqli->query($sql);

	$pdf = new PDF("L", "mm", array(300,500));
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFont("Arial", "B", 12);
	$pdf->Cell(40, 5,"Tipo de Equipo", 1, 0, "C");
	$pdf->Cell(30, 5,"Modelo", 1, 0, "C");
	$pdf->Cell(50, 5,"Serial Del Equipo", 1, 0, "C");
	$pdf->Cell(50, 5,"Serial Del Cargador", 1, 0, "C");
	$pdf->Cell(50, 5,"Fecha de Recepcion", 1, 0, "C");
	$pdf->Cell(50, 5,"Estado De Recepcion", 1, 0, "C");
	$pdf->Cell(50, 5,"Estado De Entrega", 1, 0, "C");
	$pdf->Cell(35, 5,"Falla", 1, 0, "C");
	$pdf->Cell(30, 5,"Origen", 1, 0, "C");
	$pdf->Cell(30, 5,"Estatus", 1, 1, "C");
	$pdf->SetFont("Arial", "", 9);
	while ($row = $resultado->fetch_assoc()) {
	$pdf->Cell(40, 5,$row['nombre'], 1, 0, "C"); 
	$pdf->Cell(30, 5,$row['modelo'], 1, 0, "C");
	$pdf->Cell(50, 5,$row['serial_equipo'], 1, 0, "C");
	$pdf->Cell(50, 5,$row['serial_de_cargador'], 1, 0, "C");
	$pdf->Cell(50, 5,$row['fecha_de_recepcion'], 1, 0, "C");
	$pdf->Cell(50, 5,$row['estado'], 1, 0, "C");
	$pdf->Cell(50, 5,$row['fecha_de_entrega'], 1, 0, "C");
	$pdf->Cell(35, 5,$row['tipo_de_motivo'], 1, 0, "C");
	$pdf->Cell(30, 5,$row['origen'], 1, 0, "C");
	$pdf->Cell(30, 5,$row['estatus'], 1, 1, "C");
	}

	$pdf-> Output();







?>