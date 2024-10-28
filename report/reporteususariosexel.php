<?php
    require '..\vendor\autoload.php';
    require '..\config\conexion.php';

 use PhpOffice\PhpSpreadsheet\Spreadsheet;
 use PhpOffice\PhpSpreadsheet\IOFactory;
 
   $id = $_REQUEST['id'];
$consulta = "SELECT u.id_usuarios, u.usuario, u.nombre, u.cedula, u.password, u.correo, u.registro, r.roles FROM usuarios AS u INNER JOIN roles AS r ON r.id_roles=u.id_roles WHERE u.id_roles = $id";
$resultado = $mysqli->query($consulta);

$exel = new Spreadsheet();
$hojaActiva = $exel->getActiveSheet();
$hojaActiva->setTitle("Usuario");

$hojaActiva->getColumnDimension('A')->setWidth(20);
$hojaActiva->setCellValue('A1', 'Usuario');
$hojaActiva->getColumnDimension('B')->setWidth(30);
$hojaActiva->setCellValue('B1', 'Nombre');
$hojaActiva->getColumnDimension('C')->setWidth(10);
$hojaActiva->setCellValue('C1', 'Cedula');
$hojaActiva->getColumnDimension('D')->setWidth(40);
$hojaActiva->setCellValue('D1', 'Correo');
$hojaActiva->getColumnDimension('E')->setWidth(20);
$hojaActiva->setCellValue('E1', 'Rol');

$fila = 2;

while($rows = $resultado->fetch_assoc()){
        $hojaActiva->setCellValue('A'.$fila, $rows['usuario']);
        $hojaActiva->setCellValue('B'.$fila, $rows['nombre']);
        $hojaActiva->setCellValue('C'.$fila, $rows['cedula']);
        $hojaActiva->setCellValue('D'.$fila, $rows['correo']);
        $hojaActiva->setCellValue('E'.$fila, $rows['roles']);
        $fila++;
    }
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="usuarios.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($exel, 'Xlsx');
$writer->save('php://output');
exit;
?>