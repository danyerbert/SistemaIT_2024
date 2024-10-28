<?php
    require '..\vendor\autoload.php';
    require '..\config\conexion.php';

 use PhpOffice\PhpSpreadsheet\Spreadsheet;
 use PhpOffice\PhpSpreadsheet\IOFactory;


$consulta = "SELECT d.serial_equipo, d.serial_de_cargador, d.fecha_de_recepcion, d.estado_recepcion_equipo, d.fecha_de_entrega, j.nombre, j.modelo, k.origen, m.estatus, b.tipo_de_motivo , t.estado FROM datos_del_dispotivo AS d 
 INNER JOIN tipo_de_equipo AS j ON j.id_tipo_de_equipo=d.id_tipo_de_dispositivo
 INNER JOIN origen AS k ON k.id_origen = d.id_origen
 INNER JOIN estatus AS m ON m.id_estatus = d.id_estatus
 INNER JOIN motivo AS b ON b.id_motivo = d.id_motivo
 INNER JOIN tipo_estado AS t ON t.id = d.estado_recepcion_equipo";
$resultado = $mysqli->query($consulta);

$exel = new Spreadsheet();
$hojaActiva = $exel->getActiveSheet();
$hojaActiva->setTitle("Dispositivos");

$hojaActiva->getColumnDimension('A')->setWidth(20);
$hojaActiva->setCellValue('A1', 'Tipo de Equipo');
$hojaActiva->getColumnDimension('B')->setWidth(10);
$hojaActiva->setCellValue('B1', 'Modelo');
$hojaActiva->getColumnDimension('C')->setWidth(30);
$hojaActiva->setCellValue('C1', 'Serial Del Equipo');
$hojaActiva->getColumnDimension('D')->setWidth(30);
$hojaActiva->setCellValue('D1', 'Serial Del Cargador');
$hojaActiva->getColumnDimension('E')->setWidth(30);
$hojaActiva->setCellValue('E1', 'Fecha de Recepcion');
$hojaActiva->getColumnDimension('F')->setWidth(30);
$hojaActiva->setCellValue('F1', 'Estado De Recepcion');
$hojaActiva->getColumnDimension('G')->setWidth(30);
$hojaActiva->setCellValue('G1', 'Fecha de Entrega');
$hojaActiva->getColumnDimension('H')->setWidth(20);
$hojaActiva->setCellValue('H1', 'Falla');
$hojaActiva->getColumnDimension('I')->setWidth(20);
$hojaActiva->setCellValue('I1', 'Origen');
$hojaActiva->getColumnDimension('J')->setWidth(20);
$hojaActiva->setCellValue('J1', 'Estatus');

$fila = 2;

while($rows = $resultado->fetch_assoc()){
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
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Dispositivos.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($exel, 'Xlsx');
$writer->save('php://output');
exit;
?>