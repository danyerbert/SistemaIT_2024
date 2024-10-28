<?php
require "config/app.php";
require "config/conexion.php";
session_start();
if (!isset($_SESSION['id_usuarios'])) {
    header("Location: index.php");
}else{
    if ($_SESSION['id_roles'] != 4) {
        header("Location: index.php");
    }
}
$usuario = $_SESSION['usuario'];
$rol = $_SESSION['id_roles'];
$id_usuario = $_SESSION['id_usuarios'];
$idDispositivo = $_GET['id'];

$_SESSION['lastId'] = $idDispositivo;

//Consulta para traer los datos almacenados de los dispositivos

$sql = "SELECT d.ic_dispositivo, d.id_dispositivo, d.id_tipo_de_dispositivo, d.serial_equipo, d.serial_de_cargador, d.fecha_de_recepcion, d.estado_recepcion_equipo, d.observaciones_analista, j.nombre, j.modelo, k.origen, m.estatus, b.tipo_de_motivo , t.estado FROM datos_del_dispotivo AS d 
INNER JOIN tipo_de_equipo AS j ON j.id_tipo_de_equipo=d.id_tipo_de_dispositivo
INNER JOIN origen AS k ON k.id_origen = d.id_origen
INNER JOIN estatus AS m ON m.id_estatus = d.id_estatus
INNER JOIN motivo AS b ON b.id_motivo = d.id_motivo
INNER JOIN tipo_estado AS t ON t.id = d.estado_recepcion_equipo
WHERE d.id_dispositivo = $idDispositivo";

$resultado = $mysqli->query($sql);

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
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include "inc/navbarlateral2.php"; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include "inc/navbar.php"; ?>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dispositivo</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="form-inline" action="verificartecnico.php" method="get">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <tbody>

                            <?php
                        $rowde = $resultado->fetch_assoc();
                         
                            ?>
                            <tr>
                                <th> IC
                                    <td>
                                        <?php echo $rowde['ic_dispositivo'];?>
                                    </td>
                                </th>
                            </tr>
                            <tr>
                                <th>Tipo de Dispositivo</th>
                                <td><?php echo $rowde['nombre'];?></td>
                            </tr>
                            <tr>
                                <th>Modelo</th>
                                <td><?php echo $rowde['modelo'];?></td>
                            </tr>
                            <tr>
                                <th>Serial Del Equipo</th>
                                <td><?php echo $rowde['serial_equipo'];?></td>
                            </tr>
                            <tr>
                                <th>Serial del Cargador</th>
                                <td><?php echo $rowde['serial_de_cargador'];?></td>
                            </tr>
                            <tr>
                                <th>Fecha de recepcion</th>
                                <td><?php echo $rowde['fecha_de_recepcion'];?></td>
                            </tr>
                            <tr>
                                <th>Estado de Recepcion del Equipo</th>
                                <td><?php echo $rowde['estado'];?></td>
                            </tr>
                            <tr>
                                <th>Falla</th>
                                <td><?php echo $rowde['tipo_de_motivo'];?></td>
                            </tr>
                            <tr>
                                <th>Observaciones</th>
                                <td>
                                    <?php echo $rowde['observaciones_analista'];?>
                                </td>
                            </tr>
                            <tr>
                                <th>Origen</th>
                                <td>
                                    <?php echo $rowde['origen'];?>
                                </td>
                            </tr>
                            <tr>
                                <th>Estatus</th>
                                <td>
                                    <?php echo $rowde['estatus'];?>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    
                </div>
                <?php
                     $verestatus = $rowde['estatus'];
                     $tipoDeEquipo = $rowde['id_tipo_de_dispositivo'];
                     if ($verestatus == "En la linea") {
                         

                         switch ($tipoDeEquipo) {
                            case 1:
                                echo '
                         <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                        data-target="#verificarModalTablet">
                        Reparado
                    </button>
                         ';
                                break;
                            case 2:
                                echo '
                         <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                        data-target="#verificarModalTablet">
                        Reparado
                    </button>
                         ';
                                break;
                            case 9:
                                echo '
                         <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                        data-target="#verificarModalTablet">
                        Reparado
                    </button>
                         ';
                                break;
                            default:
                            echo '
                            <!-- Button trigger modal -->
                       <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                           data-target="#verificarModal">
                           Reparado
                       </button>
                            ';
                                break;
                         }
                         }
                            include "modal/modaltecnicoEquipo.php";
                            include "modal/modalreparaciontablet.php";
                            
                        ?>
            </div>
        </div>
    </div>

</div>
</div>
<!-- End of Main Content -->
    <?php require "inc/footer.php";?>
    <script src="js/function.js"></script>
    <script src="js/registros/registroReparacion.js"></script>
    <script src="js/registros/registroTablet.js"></script>
    <?php require "inc/script.php";?>
</body>

</html>