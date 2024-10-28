<?php


	require "../config/conexion.php";
	require "plantillabeneficiario.php";

$sql = "SELECT e.nombre_del_beneficiario, e.cedula, e.edad, e.fecha_de_nacimiento,e.nombre_del_representante, e.correo, e.telefono, e.municipio, e.direccion, e.posee_discapacidad_o_condicion, e.descripcion_discapacidad_condicion,  g.genero, a.nombre_del_area, c.tipo_de_cargo, o.origen, v.estado_nombre, t.tipo_documento FROM datos_del_entregante AS e 
INNER JOIN genero AS g ON  g.id_genero=e.id_genero
INNER JOIN area AS a ON a.id_area = e.id_area
INNER JOIN cargo AS c ON c.id_cargo = e.id_cargo
INNER JOIN origen AS o ON o.id_origen = e.id_origen
INNER JOIN estados_venezuela AS v ON v.id_estados = e.estado
INNER JOIN tipo_documento AS t ON t.id_documento = e.tipo_documento";

$resultado = $mysqli->query($sql);

	$pdf = new PDF("L", "mm", array(300,640));
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont("Arial", "B", 12);
	$pdf->Cell(20, 5,"Tipo", 1, 0, "C");
	$pdf->Cell(30, 5,"Documento", 1, 0, "C");
	$pdf->Cell(60, 5,"Beneficiario", 1, 0, "C");
	$pdf->Cell(25, 5,"Edad", 1, 0, "C");
	$pdf->Cell(25, 5,"Genero", 1, 0, "C");
	$pdf->Cell(50, 5,"Fecha de nacimiento", 1, 0, "C");
	$pdf->Cell(30, 5,"Area", 1, 0, "C");
	$pdf->Cell(30, 5,"Cargo", 1, 0, "C");
	$pdf->Cell(40, 5,"Representante", 1, 0, "C");
	$pdf->Cell(50, 5,"Correo", 1, 0, "C");
	$pdf->Cell(30, 5,"Telefono", 1, 0, "C");
	$pdf->Cell(30, 5,"Estado", 1, 0, "C");
	$pdf->Cell(30, 5,"Municipio", 1, 0, "C");
	$pdf->Cell(80, 5,"Direccion", 1, 0, "C");
	$pdf->Cell(50, 5,"Origen", 1, 1, "C");
	$pdf->SetFont("Arial", "", 9);
	while ($row = $resultado->fetch_assoc()) {
		$origen = $row['origen'];

		switch ($origen) {
			case 'Apoyo Institucional':
					$pdf->Cell(20, 5,$row['tipo_documento'], 1, 0, "C");
					$pdf->Cell(30, 5,$row['cedula'], 1, 0, "C");
					$pdf->Cell(60, 5,utf8_decode($row['nombre_del_beneficiario']), 1, 0, "C");
					$pdf->Cell(25, 5,"No corresponde", 1, 0, "C");
					$pdf->Cell(25, 5,"No corresponde", 1, 0, "C");
					$pdf->Cell(50, 5,"No corresponde", 1, 0, "C");
					$pdf->Cell(30, 5,"No corresponde", 1, 0, "C");
					$pdf->Cell(30, 5,"No corresponde", 1, 0, "C");
					$pdf->Cell(40, 5,"No corresponde", 1, 0, "C");
					$pdf->Cell(50, 5,$row['correo'], 1, 0, "C");
					$pdf->Cell(30, 5,$row['telefono'], 1, 0, "C");
					$pdf->Cell(30, 5,utf8_decode($row['estado_nombre']), 1, 0, "C");
					$pdf->Cell(30, 5,$row['municipio'], 1, 0, "C");
					$pdf->Cell(80, 5,utf8_decode($row['direccion']), 1, 0, "C");
					$pdf->Cell(50, 5,$row['origen'], 1, 1, "C");
				break;
			case 'Beneficiario':
					$pdf->Cell(40, 5,$row['ic'], 1, 0, "C");
					$pdf->Cell(20, 5,$row['tipo_documento'], 1, 0, "C");
					$pdf->Cell(30, 5,$row['cedula'], 1, 0, "C");
					$pdf->Cell(60, 5,utf8_decode($row['nombre_del_beneficiario']), 1, 0, "C");
					$pdf->Cell(25, 5,$row['edad'], 1, 0, "C");
					$pdf->Cell(25, 5,$row['genero'], 1, 0, "C");
					$pdf->Cell(50, 5,$row['fecha_de_nacimiento'], 1, 0, "C");
					$pdf->Cell(30, 5,utf8_decode($row['nombre_del_area']), 1, 0, "C");
					$pdf->Cell(30, 5,utf8_decode($row['tipo_de_cargo']), 1, 0, "C");
					$pdf->Cell(40, 5,utf8_decode($row['nombre_del_representante']), 1, 0, "C");
					$pdf->Cell(50, 5,$row['correo'], 1, 0, "C");
					$pdf->Cell(30, 5,$row['telefono'], 1, 0, "C");
					$pdf->Cell(30, 5,utf8_decode($row['estado_nombre']), 1, 0, "C");
					$pdf->Cell(30, 5,$row['municipio'], 1, 0, "C");
					$pdf->Cell(80, 5,utf8_decode($row['direccion']), 1, 0, "C");
					$pdf->Cell(50, 5,$row['origen'], 1, 1, "C");
				break;
			case 'Trabajadores':
					$pdf->Cell(40, 5,$row['ic'], 1, 0, "C");
					$pdf->Cell(20, 5,$row['tipo_documento'], 1, 0, "C");
					$pdf->Cell(30, 5,$row['cedula'], 1, 0, "C");
					$pdf->Cell(60, 5,utf8_decode($row['nombre_del_beneficiario']), 1, 0, "C");
					$pdf->Cell(25, 5,"No corresponde", 1, 0, "C");
					$pdf->Cell(25, 5,"No corresponde", 1, 0, "C");
					$pdf->Cell(50, 5,"No corresponde", 1, 0, "C");
					$pdf->Cell(30, 5,utf8_decode($row['nombre_del_area']), 1, 0, "C");
					$pdf->Cell(30, 5,utf8_decode($row['tipo_de_cargo']), 1, 0, "C");
					$pdf->Cell(40, 5,utf8_decode($row['nombre_del_representante']), 1, 0, "C");
					$pdf->Cell(50, 5,$row['correo'], 1, 0, "C");
					$pdf->Cell(30, 5,$row['telefono'], 1, 0, "C");
					$pdf->Cell(30, 5,utf8_decode($row['estado_nombre']), 1, 0, "C");
					$pdf->Cell(30, 5,$row['municipio'], 1, 0, "C");
					$pdf->Cell(80, 5,utf8_decode($row['direccion']), 1, 0, "C");
					$pdf->Cell(50, 5,$row['origen'], 1, 1, "C");
				break;
			case 'Jornadas Especiales':
					$pdf->Cell(40, 5,$row['ic'], 1, 0, "C");
					$pdf->Cell(20, 5,$row['tipo_documento'], 1, 0, "C");
					$pdf->Cell(30, 5,$row['cedula'], 1, 0, "C");
					$pdf->Cell(60, 5,utf8_decode($row['nombre_del_beneficiario']), 1, 0, "C");
					$pdf->Cell(25, 5,"No corresponde", 1, 0, "C");
					$pdf->Cell(25, 5,"No corresponde", 1, 0, "C");
					$pdf->Cell(50, 5,$row['fecha_de_nacimiento'], 1, 0, "C");
					$pdf->Cell(30, 5,"No corresponde", 1, 0, "C");
					$pdf->Cell(30, 5,"No corresponde", 1, 0, "C");
					$pdf->Cell(40, 5,"No corresponde", 1, 0, "C");
					$pdf->Cell(50, 5,$row['correo'], 1, 0, "C");
					$pdf->Cell(30, 5,$row['telefono'], 1, 0, "C");
					$pdf->Cell(30, 5,utf8_decode($row['estado_nombre']), 1, 0, "C");
					$pdf->Cell(30, 5,$row['municipio'], 1, 0, "C");
					$pdf->Cell(80, 5,utf8_decode($row['direccion']), 1, 0, "C");
					$pdf->Cell(50, 5,$row['origen'], 1, 1, "C");
				break;				
		}

	}
	


	$pdf-> Output();






