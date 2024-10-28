<?php
require "config/app.php";
require "config/conexion.php";
session_start();
if (!isset($_SESSION['id_usuarios'])) {
    header("Location: index.php");
}

$idusuario = $_SESSION['id_usuarios'];
$usuario = $_SESSION['usuario'];
$rol = $_SESSION['id_roles'];

$estatusenlace = $_GET['idenlace'];

// Consulta para mostrar los datos e enviar
$consulta5 = "SELECT * FROM tipo_de_equipo";
$resultado5 = $mysqli->query($consulta5);

// Consulta para mostrar los datos e enviar
$consulta6 = "SELECT * FROM origen";
$resultado6 = $mysqli->query($consulta6);

// Consulta para mostrar los datos e enviar
$consulta9 = "SELECT * FROM motivo";
$resultado9 = $mysqli->query($consulta9);

// Consulta para mostrar los datos e enviar
$consulta11 = "SELECT * FROM tipo_estado";
$resultado11 = $mysqli->query($consulta11);

// Consulta para mostrar los datos e enviar
$consulta12 = "SELECT * FROM estatus";
$resultado12 = $mysqli->query($consulta12);
//
$consulta14 = "SELECT id_usuarios, nombre  FROM usuarios WHERE id_roles = 4";
$resultado14 = $mysqli->query($consulta14);

$sql3 = "SELECT id_datos_del_entregante, nombre_del_beneficiario FROM datos_del_entregante";
$result = $mysqli->query($sql3);

//Consulta para traer los datos almacenados de los dispositivos

$sql2 = "SELECT d.ic_dispositivo, d.id_dispositivo, d.serial_equipo, d.serial_de_cargador,d.fecha_de_recepcion, d.estado_recepcion_equipo,d.fecha_de_entrega, d.observaciones_analista, d.observaciones_tecnico, d.observaciones_verificador,d.responsable, d.id_estatus, j.nombre, j.modelo,  k.origen, m.estatus, b.tipo_de_motivo , t.estado FROM datos_del_dispotivo AS d 
INNER JOIN tipo_de_equipo AS j ON j.id_tipo_de_equipo=d.id_tipo_de_dispositivo
INNER JOIN origen AS k ON k.id_origen = d.id_origen
INNER JOIN estatus AS m ON m.id_estatus = d.id_estatus
INNER JOIN motivo AS b ON b.id_motivo = d.id_motivo
INNER JOIN tipo_estado AS t ON t.id = d.estado_recepcion_equipo WHERE d.responsable = $idusuario AND d.id_estatus = $estatusenlace";

$resultado8 = $mysqli->query($sql2);


$sqlResponsable = "SELECT usuario FROM usuarios WHERE id_usuarios = $idusuario AND id_roles = '$rol'";
$resultadoResponsable = $mysqli->query($sqlResponsable);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistema de Inventario OAC</title>
    <link rel="icon" href="img/Canaima.png">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="css/validation.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/error.css">

<body id="page-top">
    <div id="wrapper">

        <?php 
            switch ($rol) {
                case 1:
                        include "inc/navbarlateral.php";
                    ;
                    break;
                case 2:
                        include "inc/navbarlateral.php";
                    break;
                
                case 3:
                         include "inc/navbarlateral2.php";
                break; 
                case 4:
                        include "inc/navbarlateral2.php";
                    break;
                case 5:
                    include "inc/navbarlateral2.php";
                break;   
            }
         ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include "inc/navbar.php"; ?>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <?php 
                             switch ($rol) {
                                case 3:
                                    switch ($estatusenlace) {
                                        case 6:
                                            echo '
                                                <button type="button" class="btn btn-primary btn-sm mt-3" data-toggle="modal" data-target="#generarReporteEstatusPorEntregar"><i class="fas fa-print fa-sm text-white-50"></i> Generar Reporte
                                                </button>
                                            ';
                                            break;
                                        case 7:
                                            echo '
                                                <button type="button" class="btn btn-primary btn-sm mt-3" data-toggle="modal" data-target="#generarReporteEstatusPorVerificar"><i class="fas fa-print fa-sm text-white-50"></i> Generar Reporte
                                                </button>
                                            ';
                                            break;
                                    }
                                    break;
                                
                                case 4:
                                    switch ($estatusenlace) {
                                        case 2:
                                            echo '
                                                <button type="button" class="btn btn-primary btn-sm mt-3" data-toggle="modal" data-target="#generarReporteEstatusEnLinea"><i class="fas fa-print fa-sm text-white-50"></i> Generar Reporte
                                                </button>
                                            ';
                                            break;
                                        case 3:
                                            echo '
                                                <button type="button" class="btn btn-primary btn-sm mt-3" data-toggle="modal" data-target="#generarReporteEstatusReparados"><i class="fas fa-print fa-sm text-white-50"></i> Generar Reporte
                                                </button>
                                            ';
                                            break;
                                    break;
                                    }
                                case 5:
                                    switch ($estatusenlace) {
                                        case 4:
                                            echo '
                                                <button type="button" class="btn btn-primary btn-sm mt-3" data-toggle="modal" data-target="#generarReporteEstatusEntregados"><i class="fas fa-print fa-sm text-white-50"></i> Generar Reporte
                                                </button>
                                            ';
                                            break;
                                        case 5:
                                            echo '
                                                <button type="button" class="btn btn-primary btn-sm mt-3" data-toggle="modal" data-target="#generarReporteEstatusVerificados"><i class="fas fa-print fa-sm text-white-50"></i> Generar Reporte
                                                </button>
                                            ';
                                            break;
                                    break;
                                    }
                                    break;
                            }
                        
                        
                        ?>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Dispositivos</h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>IC</th>
                                            <th>Tipo de Dispositivo</th>
                                            <th>Modelo</th>
                                            <th>Serial del Equipo</th>
                                            <th>Serial del Cargador</th>
                                            <th>Fecha de Recepción</th>
                                            <th>Estado de Recepción Del Equipo</th>
                                            <th>Fecha de Entrega</th>
                                            <?php 
                                                switch ($rol) {
                                                    case 3:
                                                        echo "<th> Observaciones Analista</th>";
                                                        break;
                                                    case 4:
                                                        echo "<th> Observaciones tecnico</th>";
                                                        break;
                                                    case 5:
                                                        echo "<th> Observaciones Verificador</th>";
                                                        break; 
                                                }
                                            ?>
                                            <th>Falla</th>
                                            <th>Origen</th>
                                            <th>Estatus</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $resultado8->fetch_assoc()) :
                                        ?>
                                        <tr>
                                            <td><?php echo $row['ic_dispositivo'];?></td>
                                            <td><?php echo $row['nombre']; ?></td>
                                            <td><?php echo $row['modelo']; ?></td>
                                            <td><?php echo $row['serial_equipo']; ?></td>
                                            <td><?php echo $row['serial_de_cargador']; ?></td>
                                            <td><?php echo $row['fecha_de_recepcion']; ?></td>
                                            <td><?php echo $row['estado']; ?></td>
                                            <td><?php echo $row['fecha_de_entrega']; ?></td>
                                            <?php 
                                                switch ($rol) {
                                                    case 3:
                                                        echo "<td>".$row['observaciones_analista']."</td>";
                                                        break;
                                                    case 4:
                                                        echo "<td>".$row['observaciones_tecnico']."</td>";
                                                        break;
                                                    case 5:
                                                        echo "<td>".$row['observaciones_verificador']."</td>";
                                                        break;    
                                                }
                                            
                                            ?>
                                            <td><?php echo $row['tipo_de_motivo']; ?></td>
                                            <td><?php echo $row['origen']; ?></td>
                                            <td><?php echo $row['estatus']; ?></td>

                                            <?php
                                                    switch ($rol) {
                                                        case 3:
                                                            echo '<td><a class="btn btn-primary" href="detalleanalista.php?id='.$row['id_dispositivo'].'" role="button">Detalles</a></td>';
                                                            break;
                                                            case 4:
                                                                echo '<td><a class="btn btn-primary" href="detalletecnico.php?id='.$row['id_dispositivo'].'" role="button">Detalles</a></td>';
                                                            break;
                                                            case 5:
                                                                echo '<td><a class="btn btn-primary" href="detalles.php?id='.$row['id_dispositivo'].'" role="button">Detalles</a></td>';
                                                            break;
                                                    }

                                            ?>
                            </div>
                        </div>
                        </td>
                        </tr>
                        <?php endwhile;?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php 
        require "modal/report/estatus/generarReporteRecibidos.php";
        require "modal/report/estatus/generarReporteEnlinea.php";
        require "modal/report/estatus/generarReporteReparados.php";
        require "modal/report/estatus/generarReportePorVerificiar.php";
        require "modal/report/estatus/generarReporteVerificados.php";
        require "modal/report/estatus/generarReportePorEntregar.php";
        require "modal/report/estatus/generarReporteEntregados.php";

    ?>
        <?php require "inc/footer.php";?>
        <?php require "inc/script.php";?>

</body>

</html>