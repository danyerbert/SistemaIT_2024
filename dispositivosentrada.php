<?php
require "config/app.php";
require "config/conexion.php";
session_start();
if (!isset($_SESSION['id_usuarios'])) {
    header("Location: index.php");
}

$usuario = $_SESSION['usuario'];
$rol = $_SESSION['id_roles'];
$id_usuario = $_SESSION['id_usuarios'];

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

$consulta14 = "SELECT id_usuarios, nombre  FROM usuarios WHERE id_roles = 4";
$resultado14 = $mysqli->query($consulta14);

$sql3 = "SELECT id_datos_del_entregante, nombre_del_beneficiario FROM datos_del_entregante";
$result = $mysqli->query($sql3);
// Consulta para modal de reportes de dispositivos.
$sqlDispositivos = "SELECT id_tipo_de_equipo, nombre FROM tipo_de_equipo";
$resultadoDispositivos = $mysqli->query($sqlDispositivos);

//Consulta para traer los datos almacenados de los dispositivos

$sql2 = "SELECT d.id_dispositivo,d.ic_dispositivo, d.serial_equipo, d.serial_de_cargador, d.fecha_de_recepcion, d.estado_recepcion_equipo,d.fecha_de_entrega, d.observaciones_analista, d.id_datos_del_beneficiario, d.id_origen, d.descontinuado, j.nombre, j.modelo, k.origen, m.estatus, b.tipo_de_motivo , t.estado FROM datos_del_dispotivo AS d 
INNER JOIN tipo_de_equipo AS j ON j.id_tipo_de_equipo=d.id_tipo_de_dispositivo
INNER JOIN origen AS k ON k.id_origen = d.id_origen
INNER JOIN estatus AS m ON m.id_estatus = d.id_estatus
INNER JOIN motivo AS b ON b.id_motivo = d.id_motivo
INNER JOIN tipo_estado AS t ON t.id = d.estado_recepcion_equipo
INNER JOIN datos_del_entregante AS e ON e.id_datos_del_entregante = d.id_datos_del_beneficiario";

$resultado8 = $mysqli->query($sql2);


$sqlResponsable = "SELECT usuario FROM usuarios WHERE id_usuarios = $id_usuario AND id_roles = '$rol'";
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
    <!-- FAVICON -->
    <link rel="icon" href="img/Canaima.png">


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="css/validation.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/error.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php 
            switch ($rol) {
                case 1:
                        include "inc/navbarlateral.php";
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
                case 7:
                    include "inc/navbarlateral.php";
                break;  
            }
         ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include "inc/navbar.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Modal de registro -->

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <button type="button" class="btn btn-primary btn-sm mt-3" data-toggle="modal" data-target="#generarReporteDispositivos"> <i class="fas fa-print fa-sm text-white-50"></i> Generar Reporte
                        </button>
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
                                            <th>Tipo de Dispositivo</th>
                                            <th>Modelo</th>
                                            <th>Serial del Equipo</th>
                                            <th>Serial del Cargador</th>
                                            <th>Fecha de Recepción</th>
                                            <th>Estado de Recepción Del Equipo</th>
                                            <th>Fecha de Entrega</th>
                                            <th>Falla</th>
                                            <th>Observaciones</th>
                                            <th>Origen</th>
                                            <th>Estatus</th>
                                            <?php
                                                switch ($rol) {
                                                    case 1:
                                                        echo "<th>Opciones</th>";
                                                        break;
                                                    case 3:
                                                        # code...
                                                        echo "<th>Opciones</th>";
                                                        break;
                                                    case 7:
                                                        # code...
                                                        echo "<th>Opciones</th>";
                                                        break;
                                                }
                                            
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $resultado8->fetch_assoc()) :

                                            $validacion = $row['descontinuado'];
                                            if ($validacion == 2) {
                                                
                                           
                                        ?>
                                        <tr>
                                            <td><?php echo $row['nombre']; ?></td>
                                            <td><?php echo $row['modelo']; ?></td>
                                            <td><?php echo $row['serial_equipo']; ?></td>
                                            <td><?php echo $row['serial_de_cargador']; ?></td>
                                            <td><?php echo $row['fecha_de_recepcion']; ?></td>
                                            <td><?php echo $row['estado']; ?></td>
                                            <td><?php echo $row['fecha_de_entrega']; ?></td>
                                            <td><?php echo $row['tipo_de_motivo']; ?></td>
                                            <td><?php echo $row['observaciones_analista']; ?></td>
                                            <td><?php echo $row['origen']; ?></td>
                                            <td><?php echo $row['estatus']; ?></td>


                                            <?php
                                                    switch ($rol) {
                                                        case 1:
                                                            echo '
                                                            <td>
                                                            <div class="btn-group">
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                Opciones
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item btn btn-warning" data-toggle="modal"
                                                                    data-target="#editDis'.$row['ic_dispositivo'].'"
                                                            href="#"><img src="img/svg/editar.svg " alt="Industrias Canaima"
                                                                width="15" height="15">
                                                            Editar</a>
                                                            <a class="dropdown-item btn btn-danger"
                                                                href="php/eliminar/eliminarDispositivo.php?id='.$row['id_dispositivo'].'"><img
                                                                src="img/svg/eliminar.svg " alt="Industrias Canaima" width="15"
                                                                height="15"> Eliminar</a>
                                                                </td>';
                                                            break;
                                                        case 3:
                                                            # Editar para el analista.
                                                            echo '
                                                                <td>
                                                                    <div class="btn-group">
                                                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle"
                                                                        data-toggle="dropdown" aria-expanded="false">
                                                                        Opciones
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item btn btn-warning" data-toggle="modal"
                                                                            data-target="#editDis'.$row['ic_dispositivo'].'"href="#"><img src="img/svg/editar.svg " alt="Industrias Canaima" width="15" height="15">
                                                                                Editar</a>';
                                                            break;
                                                            case 7:
                                                                echo '
                                                                <td>
                                                                <div class="btn-group">
                                                                <button type="button" class="btn btn-info btn-sm dropdown-toggle"
                                                                    data-toggle="dropdown" aria-expanded="false">
                                                                    Opciones
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item btn btn-warning" data-toggle="modal"
                                                                        data-target="#editDis'.$row['ic_dispositivo'].'"
                                                                href="#"><img src="img/svg/editar.svg " alt="Industrias Canaima"
                                                                    width="15" height="15">
                                                                Editar</a>
                                                                <a class="dropdown-item btn btn-danger"
                                                                    href="php/eliminar/eliminarDispositivo.php?id='.$row['id_dispositivo'].'"><img
                                                                    src="img/svg/eliminar.svg " alt="Industrias Canaima" width="15"
                                                                    height="15"> Eliminar</a>
                                                                    </td>';
                                                                break;
                                                    }

                                                    ?>
                            </div>
                        </div>
                        </td>

                        <?php
                                            include "modal/edit/modalEditDis.php";
                                        ?>

                        </tr>
                        <?php
                     } 
                        endwhile;
                    ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php
                        include "modal/modalDeRegistroDis.php";
                        require "modal/report/generarReporteDispositivos.php";
                    ?>
        </div>

        <!-- End of Main Content -->

        <?php require "inc/footer.php";?>
        <script src="js/function.js"></script>
        <script src="js/update/editarDispositivo.js"></script>
        <?php require "inc/script.php";?>

</body>

</html>