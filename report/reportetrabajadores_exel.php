<?php
    require '..\vendor\autoload.php';
    require '..\config\conexion.php';

 use PhpOffice\PhpSpreadsheet\Spreadsheet;
 use PhpOffice\PhpSpreadsheet\IOFactory;


 $id = $_GET['id'];
 $consulta = "SELECT e.id_datos_del_entregante, e.nombre_del_beneficiario,d.tipo_documento, e.cedula, e.nombre_del_representante, e.id_cargo, e.correo, e.telefono, e.municipio, e.direccion, a.nombre_del_area, o.origen, v.estado_nombre FROM datos_del_entregante AS e 
 INNER JOIN area AS a ON a.id_area = e.id_area
 INNER JOIN origen AS o ON o.id_origen = e.id_origen
 INNER JOIN estados_venezuela AS v ON v.id_estados = e.estado
 INNER JOIN tipo_documento AS d ON d.id_documento = e.tipo_documento WHERE e.id_origen = $id";
$resultado = $mysqli->query($consulta);

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
?>