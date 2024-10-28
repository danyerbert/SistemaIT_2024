<?php
    require '..\config\conexion.php';
    require '..\vendor\autoload.php';

 use PhpOffice\PhpSpreadsheet\Spreadsheet;
 use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 use PhpOffice\PhpSpreadsheet\IOFactory;



 $id = $_GET['id'];
 $consulta = "SELECT e.nombre_del_beneficiario, e.cedula, e.edad, e.fecha_de_nacimiento,e.nombre_del_representante, e.correo, e.telefono, e.municipio, e.direccion, e.posee_discapacidad_o_condicion, e.descripcion_discapacidad_condicion, g.genero, a.nombre_del_area, c.tipo_de_cargo, o.origen, v.estado_nombre FROM datos_del_entregante AS e 
 INNER JOIN genero AS g ON  g.id_genero=e.id_genero
 INNER JOIN area AS a ON a.id_area = e.id_area
 INNER JOIN cargo AS c ON c.id_cargo = e.id_cargo
 INNER JOIN origen AS o ON o.id_origen = e.id_origen
 INNER JOIN estados_venezuela AS v ON v.id_estados = e.estado WHERE e.id_origen = $id";
$resultado = $mysqli->query($consulta);

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
?>