<?php
require "config/app.php";
require "config/conexion.php";
session_start();
if (!isset($_SESSION['id_usuarios'])) {
    header("Location: index.php");
}else{
    if ($_SESSION['id_roles'] != 3) {
        header("Location: index.php");
    }
}

$usuario = $_SESSION['usuario'];
$rol = $_SESSION['id_roles'];
$idusuario = $_SESSION['id_usuarios'];

//consulta para obtener el id del cordinador

$sql = "SELECT id_usuarios FROM usuarios WHERE id_roles = 6";

$resultado = $mysqli->query($sql);

$row = $resultado->fetch_assoc(); 

$cordinadorID = $row['id_usuarios']; 


// Consultas de para mostrar datos en formulario
// Consulta para mostrar los datos e enviar
$consulta2 = "SELECT * FROM genero";
$resultado2 = $mysqli->query($consulta2);

// Consulta para mostrar los datos e enviar
$consulta3 = "SELECT * FROM area";
$resultado3 = $mysqli->query($consulta3);


// Consulta para mostrar los datos e enviar
$consulta4 = "SELECT * FROM cargo";
$resultado4 = $mysqli->query($consulta4);

// Consulta para mostrar los datos e enviar
$consulta5 = "SELECT * FROM tipo_de_equipo";
$resultado5 = $mysqli->query($consulta5);

// Consulta para mostrar los datos e enviar
$consulta6 = "SELECT * FROM origen";
$resultado6 = $mysqli->query($consulta6);

// Consulta para mostrar los datos e enviar
$consulta7 = "SELECT * FROM estados_venezuela";
$resultado7 = $mysqli->query($consulta7);

// Consulta para mostrar los datos e enviar
$consulta9 = "SELECT * FROM motivo";
$resultado9 = $mysqli->query($consulta9);

// Consulta para mostrar los datos e enviar
$consulta10 = "SELECT * FROM grado";
$resultado10 = $mysqli->query($consulta10);

// Consulta para mostrar los datos e enviar
$consulta11 = "SELECT * FROM tipo_estado";
$resultado11 = $mysqli->query($consulta11);

// Consulta para mostrar los datos e enviar
$consulta12 = "SELECT * FROM estatus";
$resultado12 = $mysqli->query($consulta12);

//Consulta para traer nombre del usuario
$consulta14 = "SELECT id_usuarios, nombre  FROM usuarios WHERE id_roles = 4";
$resultado14 = $mysqli->query($consulta14);

$sql3 = "SELECT id_datos_del_entregante, nombre_del_beneficiario FROM datos_del_entregante";
$result = $mysqli->query($sql3);

//Consulta para traer el tipo de documento
$sql14 = "SELECT id_documento, tipo_documento FROM tipo_documento";
$resultado14 = $mysqli->query($sql14);

//Consulta para traer los datos de los motivos del porque entra el equipo.
$sql15 = "SELECT id, motivo FROM tipo_de_motivo";
$resultado15 = $mysqli->query($sql15);
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
    <link href="css/error.css" rel="stylesheet" >
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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo company; ?></h1>
                    </div>
                     <div class="jumbotron">
                        <h1 class="display-5">Registre un Beneficiario y Equipo!</h1>
                            <p class="lead">Bienvenido al Sistema de Inventario y Trazabilidad de Industria Canaima (SIT).</p>
                        <hr class="my-4">
                            <p>Elija el tipo de Beneficiario.</p> 
                                <a class="btn btn-primary btn-ms" data-toggle="modal" data-target="#modalApoyo"><i class="fas fa-building fa-sm text-white-50"></i> Apoyo Institucional</a>
                                <a class="btn btn-primary btn-ms" data-toggle="modal" data-target="#modalBene"><i class="fas fa-user fa-sm text-white-50"></i> Beneficiario</a>
                                <a class="btn btn-primary btn-ms" data-toggle="modal" data-target="#modalTrabajador"><i class="fas fa-briefcase fa-sm text-white-50"></i> Trabajador</a>
                                <!-- <a class="btn btn-primary btn-ms" data-toggle="modal" data-target="#modalJornada"><i class="fas fa-star fa-sm text-white-50"></i> Jornadas Especiales</a> -->
                                <!-- <a class="btn btn-secondary btn-ms" data-toggle="modal" data-target="#modalDispo"><i class="fas fa-laptop fa-sm text-white-50"></i> Registrar Dispositivo</a></a> -->
                            
                            <?php
                                include "modal/modalBene.php";
                                include "modal/modalApoyoInst.php";
                                include "modal/modalTrabajador.php";
                                // include "modalregistroDispositivo.php";
                             ?>
                             </div>
                        </div>

                    <!-- /.container-fluid -->
                    </div>

    <?php require "inc/footer.php";?>
    <script src="js/function.js"></script>
    <script src="js/registros/registroapoyo.js"></script>
    <script src="js/registros/registroBeneficiario.js"></script>
    <?php require "inc/script.php";?>

</body>

</html>