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
                        location.assign('../404.php');
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
    $beneficiario = limpiarDatos($_GET['orb']);
    if (!preg_match("/\b/", $beneficiario)) {
        header("location: $ruta");
    }elseif (!preg_match("/[0-9]{1}/", $beneficiario)) {
        header("location: $ruta");
    }
    switch ($beneficiario) {
        case 1:
            require "plantillaapoyo.php";
                    $sql = "SELECT e.id_datos_del_entregante, e.nombre_del_beneficiario, d.tipo_documento, e.cedula, e.nombre_del_representante, e.correo, e.telefono, e.municipio, e.direccion, e.fecha_ingreso, o.origen, v.estado_nombre FROM datos_del_entregante AS e 
                    INNER JOIN origen AS o ON o.id_origen = e.id_origen
                    INNER JOIN estados_venezuela AS v ON v.id_estados = e.estado
                    INNER JOIN tipo_documento AS d ON d.id_documento = e.tipo_documento WHERE e.fecha_ingreso BETWEEN '$primeraFecha' AND '$segundaFecha' AND e.id_origen = '$beneficiario' ";
                    $resultado = $mysqli->query($sql);
                    $exel = new Spreadsheet();
                    $hojaActiva = $exel->getActiveSheet();
                    $hojaActiva->setTitle("Apoyo Institucional");
                    $hojaActiva->getColumnDimension('A')->setWidth(30);
                    $hojaActiva->setCellValue('A1', 'Instituciones');
                    $hojaActiva->getColumnDimension('B')->setWidth(10);
                    $hojaActiva->setCellValue('B1', 'T.D');
                    $hojaActiva->getColumnDimension('C')->setWidth(30);
                    $hojaActiva->setCellValue('C1', 'Documento');
                    $hojaActiva->getColumnDimension('D')->setWidth(20);
                    $hojaActiva->setCellValue('D1', 'Correo');
                    $hojaActiva->getColumnDimension('E')->setWidth(30);
                    $hojaActiva->setCellValue('E1', 'Telefono');
                    $hojaActiva->getColumnDimension('F')->setWidth(30);
                    $hojaActiva->setCellValue('F1', 'Estado');
                    $hojaActiva->getColumnDimension('G')->setWidth(30);
                    $hojaActiva->setCellValue('G1', 'Municipio');
                    $hojaActiva->getColumnDimension('H')->setWidth(20);
                    $hojaActiva->setCellValue('H1', 'Direccion');
                    $hojaActiva->getColumnDimension('I')->setWidth(20);
                    $hojaActiva->setCellValue('I1', 'Origen');


                    $fila = 2;

                    while($rows = $resultado->fetch_assoc()){
                            $hojaActiva->setCellValue('A'.$fila, $rows['nombre_del_beneficiario']);
                            $hojaActiva->setCellValue('B'.$fila, $rows['tipo_documento']);
                            $hojaActiva->setCellValue('C'.$fila, $rows['cedula']);
                            $hojaActiva->setCellValue('D'.$fila, $rows['correo']);
                            $hojaActiva->setCellValue('E'.$fila, $rows['telefono']);
                            $hojaActiva->setCellValue('F'.$fila, $rows['estado_nombre']);
                            $hojaActiva->setCellValue('G'.$fila, $rows['municipio']);
                            $hojaActiva->setCellValue('H'.$fila, $rows['direccion']);
                            $hojaActiva->setCellValue('I'.$fila, $rows['origen']);
                            
                            $fila++;
                        }
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename="Apoyo Institucional.xlsx"');
                    header('Cache-Control: max-age=0');


                    $writer = IOFactory::createWriter($exel, 'Xlsx');
                    $writer->save('php://output');
                    exit;
            break;
            case 2:
                require "plantillabeneficiario.php";
                $sql = "SELECT e.nombre_del_beneficiario, e.cedula, e.edad, e.fecha_de_nacimiento,e.nombre_del_representante, e.correo, e.telefono, e.municipio, e.direccion, e.posee_discapacidad_o_condicion, e.descripcion_discapacidad_condicion, g.genero, a.nombre_del_area, c.tipo_de_cargo, o.origen, v.estado_nombre FROM datos_del_entregante AS e 
                INNER JOIN genero AS g ON  g.id_genero=e.id_genero
                INNER JOIN area AS a ON a.id_area = e.id_area
                INNER JOIN cargo AS c ON c.id_cargo = e.id_cargo
                INNER JOIN origen AS o ON o.id_origen = e.id_origen
                INNER JOIN estados_venezuela AS v ON v.id_estados = e.estado WHERE e.fecha_ingreso BETWEEN '$primeraFecha' AND '$segundaFecha' AND e.id_origen = '$beneficiario'";
                $resultado = $mysqli->query($sql);
                $exel = new Spreadsheet();

                $hojaActiva = $exel->getActiveSheet();
                $hojaActiva->setTitle("Beneficiario");



                $hojaActiva->getColumnDimension('A')->setWidth(20);
                $hojaActiva->setCellValue('A1', 'Beneficiario');
                $hojaActiva->getColumnDimension('B')->setWidth(10);
                $hojaActiva->setCellValue('B1', 'Cedula');
                $hojaActiva->getColumnDimension('C')->setWidth(10);
                $hojaActiva->setCellValue('C1', 'Edad');
                $hojaActiva->getColumnDimension('D')->setWidth(20);
                $hojaActiva->setCellValue('D1', 'Genero');
                $hojaActiva->getColumnDimension('E')->setWidth(30);
                $hojaActiva->setCellValue('E1', 'Fecha de nacimiento');
                $hojaActiva->getColumnDimension('F')->setWidth(30);
                $hojaActiva->setCellValue('F1', 'Area');
                $hojaActiva->getColumnDimension('G')->setWidth(30);
                $hojaActiva->setCellValue('G1', 'Cargo');
                $hojaActiva->getColumnDimension('H')->setWidth(20);
                $hojaActiva->setCellValue('H1', 'Representante');
                $hojaActiva->getColumnDimension('I')->setWidth(20);
                $hojaActiva->setCellValue('I1', 'Correo');
                $hojaActiva->getColumnDimension('J')->setWidth(20);
                $hojaActiva->setCellValue('J1', 'Telefono');
                $hojaActiva->getColumnDimension('K')->setWidth(20);
                $hojaActiva->setCellValue('K1', 'Estado');
                $hojaActiva->getColumnDimension('L')->setWidth(20);
                $hojaActiva->setCellValue('L1', 'Municipio');
                $hojaActiva->getColumnDimension('M')->setWidth(20);
                $hojaActiva->setCellValue('M1', 'Direccion');
                $hojaActiva->getColumnDimension('N')->setWidth(20);
                $hojaActiva->setCellValue('N1', 'Origen');

                $fila = 2;

                while($rows = $resultado->fetch_assoc()){
                        $hojaActiva->setCellValue('A'.$fila, $rows['nombre_del_beneficiario']);
                        $hojaActiva->setCellValue('B'.$fila, $rows['cedula']);
                        $hojaActiva->setCellValue('C'.$fila, $rows['edad']);
                        $hojaActiva->setCellValue('D'.$fila, $rows['genero']);
                        $hojaActiva->setCellValue('E'.$fila, $rows['fecha_de_nacimiento']);
                        $hojaActiva->setCellValue('F'.$fila, $rows['nombre_del_area']);
                        $hojaActiva->setCellValue('G'.$fila, $rows['tipo_de_cargo']);
                        $hojaActiva->setCellValue('H'.$fila, $rows['nombre_del_representante']);
                        $hojaActiva->setCellValue('I'.$fila, $rows['correo']);
                        $hojaActiva->setCellValue('K'.$fila, $rows['estado_nombre']);
                        $hojaActiva->setCellValue('L'.$fila, $rows['municipio']);
                        $hojaActiva->setCellValue('M'.$fila, $rows['direccion']);
                        $hojaActiva->setCellValue('N'.$fila, $rows['origen']);
                        $fila++;
                    }
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Beneficiario.xlsx"');
                header('Cache-Control: max-age=0');


                $writer = IOFactory::createWriter($exel, 'Xlsx');
                $writer->save('php://output');
                exit;
                break;
                case 3:
                    require "plantillatrabajador.php";
                    $sql = "SELECT e.id_datos_del_entregante, e.nombre_del_beneficiario,d.tipo_documento, e.cedula, e.nombre_del_representante, e.id_cargo, e.correo, e.telefono, e.municipio, e.direccion, a.nombre_del_area, o.origen, v.estado_nombre FROM datos_del_entregante AS e 
                    INNER JOIN area AS a ON a.id_area = e.id_area
                    INNER JOIN origen AS o ON o.id_origen = e.id_origen
                    INNER JOIN estados_venezuela AS v ON v.id_estados = e.estado
                    INNER JOIN tipo_documento AS d ON d.id_documento = e.tipo_documento WHERE e.fecha_ingreso BETWEEN '$primeraFecha' AND '$segundaFecha' AND e.id_origen = $beneficiario";
                    $resultado = $mysqli->query($sql);
                    
                    $exel = new Spreadsheet();
                    $hojaActiva = $exel->getActiveSheet();
                    $hojaActiva->setTitle("Trabajadores");

                    $hojaActiva->getColumnDimension('A')->setWidth(20);
                    $hojaActiva->setCellValue('A1', 'T.D');
                    $hojaActiva->getColumnDimension('B')->setWidth(20);
                    $hojaActiva->setCellValue('B1', 'Documento');
                    $hojaActiva->getColumnDimension('C')->setWidth(20);
                    $hojaActiva->setCellValue('C1', 'Beneficiario');
                    $hojaActiva->getColumnDimension('D')->setWidth(20);
                    $hojaActiva->setCellValue('D1', 'Area');
                    $hojaActiva->getColumnDimension('E')->setWidth(30);
                    $hojaActiva->setCellValue('E1', 'Cargo');
                    $hojaActiva->getColumnDimension('F')->setWidth(30);
                    $hojaActiva->setCellValue('F1', 'Correo');
                    $hojaActiva->getColumnDimension('G')->setWidth(30);
                    $hojaActiva->setCellValue('G1', 'Telefono');
                    $hojaActiva->getColumnDimension('H')->setWidth(20);
                    $hojaActiva->setCellValue('H1', 'Estado');
                    $hojaActiva->getColumnDimension('I')->setWidth(20);
                    $hojaActiva->setCellValue('I1', 'Municipio');
                    $hojaActiva->getColumnDimension('J')->setWidth(20);
                    $hojaActiva->setCellValue('J1', 'Direccion');
                    $hojaActiva->getColumnDimension('K')->setWidth(20);
                    $hojaActiva->setCellValue('K1', 'Origen');


                    $fila = 2;

                    while($rows = $resultado->fetch_assoc()){
                            $hojaActiva->setCellValue('A'.$fila, $rows['tipo_documento']);
                            $hojaActiva->setCellValue('B'.$fila, $rows['cedula']);
                            $hojaActiva->setCellValue('C'.$fila, $rows['nombre_del_beneficiario']);
                            $hojaActiva->setCellValue('D'.$fila, $rows['nombre_del_area']);
                            $hojaActiva->setCellValue('E'.$fila, $rows['id_cargo']);
                            $hojaActiva->setCellValue('F'.$fila, $rows['correo']);
                            $hojaActiva->setCellValue('G'.$fila, $rows['telefono']);
                            $hojaActiva->setCellValue('H'.$fila, $rows['estado_nombre']);
                            $hojaActiva->setCellValue('I'.$fila, $rows['municipio']);
                            $hojaActiva->setCellValue('K'.$fila, $rows['direccion']);
                            $fila++;
                        }
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename="Trabajadores.xlsx"');
                    header('Cache-Control: max-age=0');

                    $writer = IOFactory::createWriter($exel, 'Xlsx');
                    $writer->save('php://output');
                    exit;
                    break;
    }

}