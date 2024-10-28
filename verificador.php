<?php

require "config/app.php";
require "config/conexion.php";

session_start();

if (!isset($_SESSION['id_usuarios'])) {
    header("Location: index.php");
}else{
    if ($_SESSION['id_roles'] != 5) {
        header("Location: index.php");
    }
}

$usuario = $_SESSION['usuario'];
$rol = $_SESSION['id_roles'];
$id_usuario = $_SESSION['id_usuarios'];

$estatus = 4;

//Consulta para traer los datos almacenados de los dispositivos

$sql2 = "SELECT d.serial_equipo, d.serial_de_cargador, d.fecha_de_recepcion, d.estado_recepcion_equipo, j.nombre, j.modelo, k.origen, m.estatus, b.tipo_de_motivo , t.estado FROM datos_del_dispotivo AS d 
INNER JOIN tipo_de_equipo AS j ON j.id_tipo_de_equipo=d.id_tipo_de_dispositivo
INNER JOIN origen AS k ON k.id_origen = d.id_origen
INNER JOIN estatus AS m ON m.id_estatus = d.id_estatus
INNER JOIN motivo AS b ON b.id_motivo = d.id_motivo
INNER JOIN tipo_estado AS t ON t.id = d.estado_recepcion_equipo";

$resultado8 = $mysqli->query($sql2);


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
    <link href="css/index.css" rel="stylesheet">
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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo company; ?></h1>
                    </div>
                    
                    <div class="jumbotron">
                        <h1 class="display-5">Realice sus Diagnosticos!</h1>
                            <p class="lead">Bienvenido al Sistema de Inventario y Trazabilidad de Industria Canaima (SIT).</p>
                        <hr class="my-4">
                            <p>Elija el estatus de la Reparacion o Diagnosticos.</p>
                                <a class="btn btn-primary btn-ms" href="#" role="button"><i class="fas fa-check-circle fa-sm text-white-50"></i>Por verificar</a>
                                <a class="btn btn-primary btn-ms" href="#" role="button"><i class="fas fa-check fa-sm text-white-50"></i>Verificado</a>
                        </div>
                    </div>
                </div>
            </div>
</div>

    <?php require "inc/footer.php";?>
    <?php require "inc/script.php";?>

</body>

</html>