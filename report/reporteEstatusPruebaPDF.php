<?php
require "../function.php";
require "../config/conexion.php";
require "plantillaall.php";
if ($_GET) {
    $rol = limpiarDatos($_GET['r']);
    if (!preg_match("/\b/", $rol)) {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Rol no valido.',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 35000
                    }).then(() => {
                        location.assign('404.php');
                    });
            });
                </script>";
    } else {
        switch ($rol) {
            case 1:
                $ruta = "../admin.php";
                break;
            case 2:
                $ruta = "../presidencia.php";
                break;
            case 3:
                $ruta = "../analista.php";
                break;
            case 4:
                $ruta = "../tecnico.php";
                break;
            case 5:
                $ruta = "../verificador.php";
                break;
            case 6:
                $ruta = "../coordinador.php";
                break;
            case 7:
                $ruta = "../superadmin.php";
                break;
            default:
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Rol no valido.',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 35000
                    }).then(() => {
                        location.assign('../404.php');
                    });
            });
                </script>";
                break;
        }
    }
    $primeraFecha = limpiarDatos($_GET['fd']);
    if ($primeraFecha == "") {
        header("location: $ruta");
    }elseif ($primeraFecha == "0000-00-00") {
        header("location: $ruta");
    }
    $segundaFecha = limpiarDatos($_GET['fh']);
    if ($segundaFecha == "") {
        header("location: $ruta");
    }elseif ($segundaFecha == "0000-00-00") {
        header("location: $ruta");
    }
    $estatus = limpiarDatos($_GET['est']);
    if (!preg_match("/\b/", $estatus)) {
        header("location: $ruta");
    }elseif (!preg_match("/[0-9]{1}/", $estatus)) {
        header("location: $ruta");
    }
    switch ($estatus) {
        case 8:
            $sqlRfechas = "SELECT d.serial_equipo, d.serial_de_cargador, d.fecha_de_recepcion, d.estado_recepcion_equipo, d.fecha_de_entrega,d.comprobaciones,j.nombre, j.modelo,  k.origen, m.estatus, b.tipo_de_motivo , t.estado FROM datos_del_dispotivo AS d 
            INNER JOIN tipo_de_equipo AS j ON j.id_tipo_de_equipo=d.id_tipo_de_dispositivo
            INNER JOIN origen AS k ON k.id_origen = d.id_origen
            INNER JOIN estatus AS m ON m.id_estatus = d.id_estatus
            INNER JOIN motivo AS b ON b.id_motivo = d.id_motivo
            INNER JOIN tipo_estado AS t ON t.id = d.estado_recepcion_equipo WHERE fecha_de_recepcion BETWEEN '$primeraFecha' AND '$segundaFecha'";

            $slqCount = "SELECT COUNT(*) ic_dispositivo FROM datos_del_dispotivo WHERE fecha_de_recepcion BETWEEN '$primeraFecha' AND '$segundaFecha'";
            $resultadoCount = $mysqli->query($slqCount);
            $rowCantidad = mysqli_fetch_assoc($resultadoCount);
            $Cantidad = $rowCantidad['ic_dispositivo'];
            break;
        default:
                $sqlRfechas = "SELECT d.serial_equipo, d.serial_de_cargador, d.fecha_de_recepcion, d.estado_recepcion_equipo, d.fecha_de_entrega,d.comprobaciones,j.nombre, j.modelo,  k.origen, m.estatus, b.tipo_de_motivo , t.estado FROM datos_del_dispotivo AS d 
                INNER JOIN tipo_de_equipo AS j ON j.id_tipo_de_equipo=d.id_tipo_de_dispositivo
                INNER JOIN origen AS k ON k.id_origen = d.id_origen
                INNER JOIN estatus AS m ON m.id_estatus = d.id_estatus
                INNER JOIN motivo AS b ON b.id_motivo = d.id_motivo
                INNER JOIN tipo_estado AS t ON t.id = d.estado_recepcion_equipo WHERE fecha_de_recepcion BETWEEN '$primeraFecha' AND '$segundaFecha' AND d.id_estatus = '$estatus'";

                $slqCount = "SELECT COUNT(*) ic_dispositivo FROM datos_del_dispotivo WHERE fecha_de_recepcion BETWEEN '$primeraFecha' AND '$segundaFecha' AND id_estatus = '$estatus'";
                $resultadoCount = $mysqli->query($slqCount);
                $rowCantidad = mysqli_fetch_assoc($resultadoCount);
                $Cantidad = $rowCantidad['ic_dispositivo'];
            break;
    }
    $resultadoRd = $mysqli->query($sqlRfechas);
    
	$pdf = new PDF("L", "mm", array(300,500));
	$pdf->AliasNbPages();
	$pdf->AddPage();

	//$pdf->setXY(30,60);
	$pdf->SetFont("Arial", "B", 12);
	$pdf->Cell(40, 5,"Tipo de Equipo", 1, 0, "C");
	$pdf->Cell(40, 5,"Modelo", 1, 0, "C");
	$pdf->Cell(50, 5,"Serial Del Equipo", 1, 0, "C");
	$pdf->Cell(50, 5,"Serial Del Cargador", 1, 0, "C");
	$pdf->Cell(50, 5,"Fecha de Recepcion", 1, 0, "C");
	$pdf->Cell(50, 5,"Estado De Recepcion", 1, 0, "C");
	$pdf->Cell(50, 5,"Fecha de Entrega", 1, 0, "C");
	$pdf->Cell(45, 5,"Falla", 1, 0, "C");
	$pdf->Cell(30, 5,"Origen", 1, 0, "C");
	$pdf->Cell(30, 5,"Estatus", 1, 1, "C");
	$pdf->SetFont("Arial", "", 9);
	while ($row = $resultadoRd->fetch_assoc()) {
	$pdf->Cell(40, 5,$row['nombre'], 1, 0, "C"); 
	$pdf->Cell(40, 5,$row['modelo'], 1, 0, "C");
	$pdf->Cell(50, 5,$row['serial_equipo'], 1, 0, "C");
	$pdf->Cell(50, 5,$row['serial_de_cargador'], 1, 0, "C");
	$pdf->Cell(50, 5,$row['fecha_de_recepcion'], 1, 0, "C");
	$pdf->Cell(50, 5,$row['estado'], 1, 0, "C");
	$pdf->Cell(50, 5,$row['fecha_de_entrega'], 1, 0, "C");
	$pdf->Cell(45, 5,$row['tipo_de_motivo'], 1, 0, "C");
	$pdf->Cell(30, 5,$row['origen'], 1, 0, "C");
	$pdf->Cell(30, 5,$row['estatus'], 1, 1, "C");
	}
    //$pdf->setXY(30,80);
    $pdf->SetFont("Arial", "B", 12);
    $pdf->Cell(60, 5, "Cantidad de dispositivos: $Cantidad", 1, 1, "C");
	$pdf-> Output();

    
}