<?php


	require "../config/conexion.php";
	require "planillajornadas.php";
	$id = $_REQUEST['id'];
$sql = "SELECT e.id_datos_del_entregante,  e.ic, e.nombre_del_beneficiario,t.tipo_documento, e.cedula, e.fecha_de_nacimiento, e.correo, e.telefono, e.municipio, e.direccion, o.origen, v.estado_nombre FROM datos_del_entregante AS e 
INNER JOIN origen AS o ON o.id_origen = e.id_origen
INNER JOIN estados_venezuela AS v ON v.id_estados = e.estado
INNER JOIN tipo_documento AS t ON t.id_documento = e.tipo_documento WHERE e.id_origen =  $id ";

$resultado = $mysqli->query($sql);

	$pdf = new PDF("L", "mm", array(300,520));
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont("Arial", "B", 12);
	$pdf->Cell(40, 5,"IC", 1, 0, "C");
	$pdf->Cell(20, 5,"N", 1, 0, "C");
	$pdf->Cell(30, 5,"Documento", 1, 0, "C");
	$pdf->Cell(60, 5,"Nombre de la institucion", 1, 0, "C");
	$pdf->Cell(50, 5,"Correo", 1, 0, "C");
	$pdf->Cell(30, 5,"Telefono", 1, 0, "C");
	$pdf->Cell(30, 5,"Estado", 1, 0, "C");
	$pdf->Cell(30, 5,"Municipio", 1, 0, "C");
	$pdf->Cell(90, 5,"Direccion", 1, 0, "C");
	$pdf->Cell(50, 5,"Origen", 1, 0, "C");
    $pdf->Cell(70, 5,"Fecha de Jornada", 1, 1, "C");
	$pdf->SetFont("Arial", "", 9);
	while ($row = $resultado->fetch_assoc()) {
	$pdf->Cell(40, 5,$row['ic'], 1, 0, "C");
	$pdf->Cell(20, 5,$row['tipo_documento'], 1, 0, "C");
	$pdf->Cell(30, 5,$row['cedula'], 1, 0, "C");
	$pdf->Cell(60, 5,$row['nombre_del_beneficiario'], 1, 0, "C");
	$pdf->Cell(50, 5,$row['correo'], 1, 0, "C");
	$pdf->Cell(30, 5,$row['telefono'], 1, 0, "C");
	$pdf->Cell(30, 5,$row['estado_nombre'], 1, 0, "C");
	$pdf->Cell(30, 5,$row['municipio'], 1, 0, "C");
	$pdf->Cell(90, 5,$row['direccion'], 1, 0, "C");
	$pdf->Cell(50, 5,$row['origen'], 1, 0, "C");
    $pdf->Cell(70, 5,$row['fecha_de_nacimiento'], 1, 1, "C");
	
	}
	


	$pdf-> Output();