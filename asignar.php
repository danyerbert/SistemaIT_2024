<?php
require "config/app.php";
require "config/conexion.php";

session_start();
if (!isset($_SESSION['id_usuarios'])) {
    header("Location: index.php");
}

$asignar = $_GET['tipo'];

// if($asignar != 'verificador' && $asignar != 'tecnico' AND $asignar != 'analista'){
//     header("Location: coordinador.php");
//     exit;
// }

$usuario = $_SESSION['usuario'];
$rol = $_SESSION['id_roles'];

switch($asignar){
    case 'analista':
        $estatus = 5;
        $role= 3;
        $observaciones = 'observaciones_analista';
        $mostrarModal = "Analista";
        break;
    case 'tecnico':
        $estatus = 1;
        $role= 4;
        $observaciones = 'observaciones_tecnico';
        $mostrarModal = "Tecnico";
        break;
    case 'verificador':
        $estatus = 3;
        $role= 5;
        $observaciones= 'observaciones_verificador';
        $mostrarModal = "Verificador";
        break;
    default:
        header("404.html");
    break;
}


$consulta = "SELECT datos_del_dispotivo.*, usuarios.nombre FROM datos_del_dispotivo 
INNER JOIN usuarios ON datos_del_dispotivo.Responsable = usuarios.id_usuarios WHERE datos_del_dispotivo.id_estatus = $estatus";
$resultado = $mysqli->query($consulta);

$consulta = "SELECT id_roles, roles FROM roles";
$resultado1 = $mysqli->query($consulta);

$consulta = "SELECT nombre, id_usuarios FROM usuarios WHERE id_roles = $role";
$result = $mysqli->query($consulta);

$usuarios = mysqli_fetch_all($result, $resulttype = MYSQLI_ASSOC);

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
    <link rel="stylesheet" href="css/error.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include "inc/navbarlateral.php"; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include "inc/navbar.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">

                            <h6 class="m-0 font-weight-bold text-primary">Asignar <?php echo $mostrarModal;?></h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>IC</th>
                                            <th>Serial del Equipo</th>
                                            <th>Serial del Cargador</th>
                                            <th>Fecha de Recepción</th>
                                            <th>Fecha de Entrega</th>
                                            <th>Responsable Actual</th>
                                            <th>Resonsable Recibido</th>
                                            <th>Responsable Tecnico</th>
                                            <th>Responsable Verificador</th>
                                            <th>Responsable Entrega</th>
                                            <th>Observaciones <?php echo $asignar; ?></th>
                                            <th>Registro</th>
                                            <th>Origen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Mostramos los resultados de las consultas realizadas de la tabla dispositivos -->
                                        <?php
                                        while ($row = $resultado->fetch_assoc()) :

                                    ?>
                                        <tr>
                                            <td><?php echo $row['ic_dispositivo']; ?></td>
                                            <td><?php echo $row['serial_equipo']; ?></td>
                                            <td><?php echo $row['serial_de_cargador']; ?></td>
                                            <td><?php echo $row['fecha_de_recepcion']; ?></td>
                                            <td><?php echo $row['fecha_de_entrega']; ?></td>
                                            <td><?php echo $row['nombre']; ?></td>
                                            <td><?php echo $row['responsable_analista_recibido'];?></td>
                                            <td><?php echo $row['responsable_tecnico'];?></td>
                                            <td><?php echo $row['responsable_verificador'];?></td>
                                            <td><?php echo $row['responsable_analista_entrega'];?></td>
                                            <td><?php echo $row[$observaciones]; ?></td>
                                            <td><?php echo $row['registro']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        Opciones
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item btn btn-primary"
                                                            id="btnAsign<?php echo  $row['id_dispositivo']?>"
                                                            data-toggle="modal"
                                                            data-target="#asignar<?php echo  $row['id_dispositivo']?>"
                                                            href="#"><img
                                                                src="img/bootstrap-icons-1.10.5/check-circle-fill.svg "
                                                                alt="Industrias Canaima" width="15" height="15">
                                                            Asignar</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                        include "modal/modalAsignar.php";
                                        endwhile;
                                    ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End of Main Content -->
            <?php require "inc/footer.php";?>
            <?php require "inc/script.php";?>
</body>

</html>