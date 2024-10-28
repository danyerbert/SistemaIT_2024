<?php
    require '..\vendor\autoload.php';
    require '..\config\conexion.php';

 use PhpOffice\PhpSpreadsheet\Spreadsheet;
 use PhpOffice\PhpSpreadsheet\IOFactory;



 $id = $_REQUEST['id'];
 $consulta = "SELECT e.id_datos_del_entregante, e.nombre_del_beneficiario, d.tipo_documento, e.cedula, e.nombre_del_representante, e.correo, e.telefono, e.municipio, e.direccion, o.origen, v.estado_nombre FROM datos_del_entregante AS e 
 INNER JOIN origen AS o ON o.id_origen = e.id_origen
 INNER JOIN estados_venezuela AS v ON v.id_estados = e.estado
 INNER JOIN tipo_documento AS d ON d.id_documento = e.tipo_documento WHERE e.id_origen = $id ";
$resultado = $mysqli->query($consulta);

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
?>