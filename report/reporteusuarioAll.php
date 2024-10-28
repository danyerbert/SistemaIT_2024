<?php
	require "../config/conexion.php";
	require "plantilla.php";

$consulta = "SELECT u.id_usuarios, u.usuario, u.nombre, u.cedula, u.password, u.correo, u.registro, r.roles FROM usuarios AS u INNER JOIN roles AS r ON r.id_roles=u.id_roles";
$resultado = $mysqli->query($consulta);


	$pdf = new PDF("P", "mm", "Letter");
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFont("Arial", "B", 12);
	$pdf->Cell(30, 4,"Usuario", 1, 0, "C");
	$pdf->Cell(30, 4,"Nombre", 1, 0, "C");
	$pdf->Cell(30, 4,"Cedula", 1, 0, "C");
	$pdf->Cell(50, 4,"Correo", 1, 0, "C");
	$pdf->Cell(30, 4,"Perfil", 1, 1, "C");
	$pdf->SetFont("Arial", "", 9);
	while ($row = $resultado->fetch_assoc()) {
	$pdf->Cell(30, 4,$row['usuario'], 1, 0, "C");
	$pdf->Cell(30, 4,$row['nombre'], 1, 0, "C");
	$pdf->Cell(30, 4,$row['cedula'], 1, 0, "C");
	$pdf->Cell(50, 4,$row['correo'], 1, 0, "C");
	$pdf->Cell(30, 4,$row['roles'], 1, 1, "C");
	}
	


	$pdf-> Output();






