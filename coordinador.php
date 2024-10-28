<?php
require "config/app.php";
require "config/conexion.php";
session_start();
if (!isset($_SESSION['id_usuarios'])) {
    header("Location: index.php");
}else{
    if ($_SESSION['id_roles'] != 6) {
        header("Location: 404.php");
    }
}

$usuario = $_SESSION['usuario'];
$rol = $_SESSION['id_roles'];


$consulta = "SELECT u.id_usuarios, u.usuario, u.nombre, u.cedula, u.password, u.correo, u.registro, r.roles FROM usuarios AS u INNER JOIN roles AS r ON r.id_roles=u.id_roles";
$resultado = $mysqli->query($consulta);

$consulta1 = "SELECT id_roles, roles FROM roles";
$resultado1 = $mysqli->query($consulta1);

/* Consulta para los opciones de fechas de las graficas */

$consulta2 = "SELECT * FROM  datos_del_dispotivo";

$resultado2 = $mysqli->query($consulta2);



// if($asignar != 'verificador' && $asignar != 'tecnico' AND $asignar != 'analista'){
//     header("Location: coordinador.php");
//     exit;
// }

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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo company; ?></h1>
                    </div>

                    

                    <div class="jumbotron">
                        <h1 class="display-5">Realice sus Asignaciones!</h1>
                            <p class="lead">Bienvenido al Sistema de Inventario y Trazabilidad de Industria Canaima (SIT).</p>
                        <hr class="my-4">
                            <p>Elija el tipo de Asignacion.</p>
                                <a class="btn btn-primary btn-ms" href="asignar.php?tipo=analista" role="button"><i class="fas fa-user fa-sm text-white-50"></i> Analista</a>
                                <a class="btn btn-primary btn-ms" href="asignar.php?tipo=tecnico" role="button"><i class="fas fa-screwdriver fa-sm text-white-50"></i> Tecnico</a>
                                <a class="btn btn-primary btn-ms" href="asignar.php?tipo=verificador" role="button"><i class="fas fa-user-check fa-sm text-white-50"></i> Verificador</a>
                        </div>
                    </div>
                </div>

                <!-- /.container-fluid -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-print fa-sm text-white-50"></i> Generar Reporte</a> -->
                    </div>


                    <!-- Content Row -->
                    <div class="row">


                        <!-- Content Row -->
                        <div class="row">

                            <!-- Content Column -->
                            <div class="col-lg-6 mb-4">

                            </div>


                        </div>
                        <!-- /.container-fluid -->



                    </div>
                    <!-- /.container-fluid -->
</div>

    <?php require "inc/footer.php";?>
    <?php require "inc/script.php";?>
</body>

</html>