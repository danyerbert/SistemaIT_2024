<?php
	require "../config/conexion.php";
	require "plantilla.php";

	$id = $_REQUEST['id'];
$consulta = "SELECT u.id_usuarios, u.usuario, u.nombre, u.cedula, u.password, u.correo, u.registro, r.roles FROM usuarios AS u INNER JOIN roles AS r ON r.id_roles=u.id_roles WHERE u.id_roles = $id";
$resultado = $mysqli->query($consulta);


	$pdf = new PDF("P", "mm", "Letter");
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFont("Arial", "B", 12);
	$pdf->Cell(20, 5,"Usuario", 1, 0, "C");
	$pdf->Cell(30, 5,"Nombre", 1, 0, "C");
	$pdf->Cell(30, 5,"Cedula", 1, 0, "C");
	$pdf->Cell(50, 5,"Correo", 1, 0, "C");
	$pdf->Cell(30, 5,"Perfil", 1, 0, "C");
	$pdf->Cell(40, 5,"Fecha De Registro", 1, 1, "C");
	$pdf->SetFont("Arial", "", 9);
	while ($row = $resultado->fetch_assoc()) {
	$pdf->Cell(20, 5,$row['usuario'], 1, 0, "C");
	$pdf->Cell(30, 5,$row['nombre'], 1, 0, "C");
	$pdf->Cell(30, 5,$row['cedula'], 1, 0, "C");
	$pdf->Cell(50, 5,$row['correo'], 1, 0, "C");
	$pdf->Cell(30, 5,$row['roles'], 1, 0, "C");
	$pdf->Cell(40, 5,$row['registro'], 1, 1, "C");
	}
	


	$pdf-> Output();






