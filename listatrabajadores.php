<?php
require "config/app.php";
require "config/conexion.php";
session_start();
if (!isset($_SESSION['id_usuarios'])) {
    header("Location: index.php");
}
date_default_timezone_set('America/Caracas');
$fecha = date("Y-m-d");
$usuario = $_SESSION['usuario'];
$rol = $_SESSION['id_roles'];
$idusuario = $_SESSION['id_usuarios'];
// Consulta para traer los datos almacenados

$sql1 = "SELECT e.id_datos_del_entregante, e.nombre_del_beneficiario, d.tipo_documento, e.cedula, e.nombre_del_representante, e.id_cargo, e.correo, e.telefono, e.municipio, e.direccion, e.id_origen, e.descontinuado, a.nombre_del_area, v.estado_nombre FROM datos_del_entregante AS e 
INNER JOIN area AS a ON a.id_area = e.id_area
INNER JOIN estados_venezuela AS v ON v.id_estados = e.estado
INNER JOIN tipo_documento AS d ON d.id_documento = e.tipo_documento WHERE id_origen = 3";

$resultadoConsulta = $mysqli->query($sql1);


// Consulta para mostrar los datos e enviar
$consulta2 = "SELECT * FROM genero";
$resultado2 = $mysqli->query($consulta2);

// Consulta para mostrar los datos e enviar
$consulta3 = "SELECT * FROM area";
$resultado3 = $mysqli->query($consulta3);

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
$consulta11 = "SELECT * FROM tipo_estado";
$resultado11 = $mysqli->query($consulta11);

// Consulta para mostrar los datos e enviar
$consulta12 = "SELECT * FROM estatus";
$resultado12 = $mysqli->query($consulta12);

//Consulta para traer los datos del entregante
$sql3 = "SELECT id_datos_del_entregante, nombre_del_beneficiario FROM datos_del_entregante";
$result = $mysqli->query($sql3);

//Consulta para traer el tipo de documento
$sql14 = "SELECT id_documento, tipo_documento FROM tipo_documento";
$resultado14 = $mysqli->query($sql14);

//Consulta para traer los datos de los motivos del porque entra el equipo.
$sql15 = "SELECT id, motivo FROM tipo_de_motivo";
$resultado15 = $mysqli->query($sql15);

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
    <!-- FAVICON -->
    <link rel="icon" href="img/Canaima.png">


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div>
                            <button type="button" class="btn btn-primary btn-sm mt-3" data-toggle="modal" data-target="#generarReporteTrabajador"><i class="fas fa-print fa-sm text-white-50"></i> Generar Reporte
                            </button>
                        </div>
                        <?php
                                    switch ($rol) {
                                        case 1:
                                            echo '
                                            
                                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                                data-toggle="modal" data-target="#modalTrabajador"><i class="fas fa-user fa-sm text-white-50"></i> Registrar Trabajador</a>
                                            
                                            ';
                                            break;
                                        case 3:
                                            echo '
                                            
                                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                                data-toggle="modal" data-target="#modalTrabajador"><i class="fas fa-user fa-sm text-white-50"></i> Registrar Trabajador</a>
                                            
                                            ';
                                            break;
                                    }

                                ?>

                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Trabajadores</h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>tipo de documento</th>
                                            <th>Cedula</th>
                                            <th>Nombre</th>
                                            <th>Area</th>
                                            <th>Cargo</th>
                                            <th>Correo</th>
                                            <th>Telefono</th>
                                            <th>Estado</th>
                                            <th>Municipio</th>
                                            <th>Dirección</th>

                                            <?php
                                                switch($rol){
                                                    case 1:
                                                        echo ' <th>Opciones</th> ';
                                                    break;
                                                    case 3:
                                                        echo ' <th>Opciones</th> ';
                                                    break;
                                                    }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $resultadoConsulta->fetch_assoc()) :
                                            $validacion = $row['descontinuado'];
                                            
                                            if ($validacion == 2) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['tipo_documento']; ?></td>
                                            <td><?php echo $row['cedula']; ?></td>
                                            <td><?php echo $row['nombre_del_beneficiario']; ?></td>
                                            <td><?php echo $row['nombre_del_area']; ?></td>
                                            <td><?php echo $row['id_cargo']; ?></td>
                                            <td><?php echo $row['correo']; ?></td>
                                            <td><?php echo $row['telefono']; ?></td>
                                            <td><?php echo $row['estado_nombre']; ?></td>
                                            <td><?php echo $row['municipio']; ?></td>
                                            <td><?php echo $row['direccion']; ?></td>
                                            <?php
                                                switch($rol){
                                                    case 1:
                                                        echo '  <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            Opciones
                                                        </button>
                                                        <div class="dropdown-menu">

                                                            <a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#editrabajador'.$row['id_datos_del_entregante'].'" href="#"><img src="img/svg/editar.svg " alt="Industrias Canaima" width="15" height="15"> Editar</a>
                                                            <a class="dropdown-item btn btn-danger" href="php/eliminar/eliminartrabajador.php?id='.$row['id_datos_del_entregante'].'&origen=3"><img src="img/svg/eliminar.svg " alt="Industrias Canaima" width="15" height="15"> Eliminar</a>
                                                            <a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#modalDispo'.$row['id_datos_del_entregante'].'" href="#"><img src="img/svg/circulorelleno.svg " alt="Industrias Canaima" width="15" height="15"> Agregar</a>
                                                            </div>
                                                            </div>
                                                            </td>';
                                                            
                                  break;
                                  case 3:
                                    echo '  <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            Opciones
                                        </button>
                                        <div class="dropdown-menu">

                                            <a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#modalDispo'.$row['id_datos_del_entregante'].'" href="#"><img src="img/svg/circulorelleno.svg " alt="Industrias Canaima" width="15" height="15"> Agregar</a>
                                            <a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#editrabajador'.$row['id_datos_del_entregante'].'" href="#"><img src="img/svg/editar.svg " alt="Industrias Canaima" width="15" height="15"> Editar</a>
                                            </div>
                                            </div>
                                            </td>';
                                    break;
                                }
                        ?>


                                            <?php
                            include "modal/edit/modaledittrabajador.php";
                            include "modal/modalDeRegistroDis.php";
                        }   
                            endwhile;
                        ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Modal de registro -->

                    <?php 
                    
                     include "modal/modalTrabajador.php";
                     require "modal/report/generarReporteDeTrabajador.php";
                    
                    ?>

                </div>
            </div>
            <!-- End of Main Content -->


            <?php require "inc/footer.php";?>
            <script src="js/function.js"></script>
            <script src="js/registros/registrarDispositivo.js"></script>
            <?php require "inc/script.php";?>

</body>

</html>