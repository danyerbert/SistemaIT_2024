<?php
require "../function.php";
require "../config/conexion.php";
require '../vendor/autoload.php';
date_default_timezone_set('America/Caracas');
$fecha = date("Y-m-d");
 // Añadimos la liberia Spreadsheet para la generación de reportes en Excel
 use PhpOffice\PhpSpreadsheet\Spreadsheet;
 use PhpOffice\PhpSpreadsheet\IOFactory;
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
                        location.assign('404.php');
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
    $dispositivos = limpiarDatos($_GET['dis']);
    if (!preg_match("/\b/", $dispositivos)) {
        header("location: $ruta");
    }elseif (!preg_match("/[0-9]{1}/", $dispositivos)) {
        header("location: $ruta");
    }

    switch ($dispositivos) {
        case 11:
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
                INNER JOIN tipo_estado AS t ON t.id = d.estado_recepcion_equipo WHERE fecha_de_recepcion BETWEEN '$primeraFecha' AND '$segundaFecha' AND d.id_tipo_de_equipo = '$dispositivos'";

                $slqCount = "SELECT COUNT(*) ic_dispositivo FROM datos_del_dispotivo WHERE fecha_de_recepcion BETWEEN '$primeraFecha' AND '$segundaFecha' AND id_tipo_de_equipo = '$dispositivos'";
                $resultadoCount = $mysqli->query($slqCount);
                $rowCantidad = mysqli_fetch_assoc($resultadoCount);
                $Cantidad = $rowCantidad['ic_dispositivo'];
            break;
    }
    $resultadoRd = $mysqli->query($sqlRfechas);
    
    $exel = new Spreadsheet();
    $hojaActiva = $exel->getActiveSheet();
    $hojaActiva->setTitle("Dispositivos");

    $hojaActiva->getColumnDimension('A')->setWidth(20);
    $hojaActiva->setCellValue('A2', 'Tipo de Equipo');
    $hojaActiva->getColumnDimension('B')->setWidth(10);
    $hojaActiva->setCellValue('B2', 'Modelo');
    $hojaActiva->getColumnDimension('C')->setWidth(30);
    $hojaActiva->setCellValue('C2', 'Serial Del Equipo');
    $hojaActiva->getColumnDimension('D')->setWidth(30);
    $hojaActiva->setCellValue('D2', 'Serial Del Cargador');
    $hojaActiva->getColumnDimension('E')->setWidth(30);
    $hojaActiva->setCellValue('E2', 'Fecha de Recepcion');
    $hojaActiva->getColumnDimension('F')->setWidth(30);
    $hojaActiva->setCellValue('F2', 'Estado De Recepcion');
    $hojaActiva->getColumnDimension('G')->setWidth(30);
    $hojaActiva->setCellValue('G2', 'Fecha de Entrega');
    $hojaActiva->getColumnDimension('H')->setWidth(20);
    $hojaActiva->setCellValue('H2', 'Falla');
    $hojaActiva->getColumnDimension('I')->setWidth(20);
    $hojaActiva->setCellValue('I2', 'Origen');
    $hojaActiva->getColumnDimension('J')->setWidth(20);
    $hojaActiva->setCellValue('J2', 'Estatus');

    $fila = 3;

    while($rows = $resultadoRd->fetch_assoc()){
            $hojaActiva->setCellValue('A'.$fila, $rows['nombre']);
            $hojaActiva->setCellValue('B'.$fila, $rows['modelo']);
            $hojaActiva->setCellValue('C'.$fila, $rows['serial_equipo']);
            $hojaActiva->setCellValue('D'.$fila, $rows['serial_de_cargador']);
            $hojaActiva->setCellValue('E'.$fila, $rows['fecha_de_recepcion']);
            $hojaActiva->setCellValue('F'.$fila, $rows['estado']);
            $hojaActiva->setCellValue('G'.$fila, $rows['fecha_de_entrega']);
            $hojaActiva->setCellValue('H'.$fila, $rows['tipo_de_motivo']);
            $hojaActiva->setCellValue('I'.$fila, $rows['origen']);
            $hojaActiva->setCellValue('J'.$fila, $rows['estatus']);
            $fila++;
        }
    $hojaActiva->getColumnDimension('L')->setWidth(40);
    $hojaActiva->setCellValue('L2', 'Cantidad de dispositivos');
    $hojaActiva->setCellValue('L3', $Cantidad);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="DispositivosEquipos_'.$fecha.'.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = IOFactory::createWriter($exel, 'Xlsx');
    $writer->save('php://output');
    exit;
    
}