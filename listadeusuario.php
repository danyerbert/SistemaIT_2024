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

$consulta = "SELECT u.id_usuarios, u.usuario, u.nombre, u.cedula, u.password, u.correo, u.registro, u.descontinuado, r.roles FROM usuarios AS u INNER JOIN roles AS r ON r.id_roles=u.id_roles";
$resultado = $mysqli->query($consulta);

$consulta1 = "SELECT id_roles, roles FROM roles";
$resultado1 = $mysqli->query($consulta1);
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
    <link rel="stylesheet" type="text/css" href="css/validation.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include "inc/navbarlateral.php";?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include "inc/navbar.php";?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                         <div class="btn-group dropright">
                            <button  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" > 
                             <i class="fas fa-print fa-sm text-white-50"></i>
                                Generar Reporte
                            </button>
                                </button>
                            <button type="button" class="btn btn-primary d-none d-sm-inline-block dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropright</span>
                            </button>
                            <div class="dropdown-menu">
                                <li><a class="dropdown-item" href="report/reporteusuario.php?id=1" target="_blank">Administrador (PDF)</a></li>
                                <li><a class="dropdown-item" href="report/reporteusuario.php?id=2" target="_blank">Presidencia (PDF)</a></li>
                                <li><a class="dropdown-item" href="report/reporteusuario.php?id=3" target="_blank">Analista (PDF)</a></li>
                                <li><a class="dropdown-item" href="report/reporteusuario.php?id=4" target="_blank">Tecnico (PDF)</a></li>
                                <li><a class="dropdown-item" href="report/reporteusuario.php?id=5" target="_blank">Verificador (PDF)</a></li>
                                <li><a class="dropdown-item" href="report/reporteusuarioAll.php" target="_blank">Todos (PDF)</a></li>
                                        <div class="dropdown-divider"></div>
                                <li><a class="dropdown-item" href="report/reporteususariosexel.php?id=1" target="_blank">Administrador (EXCEL)</a></li>
                                <li><a class="dropdown-item" href="report/reporteususariosexel.php?id=2" target="_blank">Presidencia (EXCEL)</a></li>
                                <li><a class="dropdown-item" href="report/reporteususariosexel.php?id=3" target="_blank">Analista (EXCEL)</a></li>
                                <li><a class="dropdown-item" href="report/reporteususariosexel.php?id=4" target="_blank">Tecnico (EXCEL)</a></li>
                                <li><a class="dropdown-item" href="report/reporteususariosexel.php?id=5" target="_blank">Verificador (EXCEL)</a></li>
                                <li><a class="dropdown-item" href="report/reporteususariosexel_all.php" target="_blank">Todos (EXCEL)</a></li>

                            </div>
                        </div>
                        <?php 
                                                switch($rol){
                                                    case 1:
                                                        echo '   <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#RegistroUsuario"> <i class="fas fa-user fa-sm text-white-50"></i> Registrar Usuario</a>';
                                                        break;
                                                    }
                                            ?>

                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">

                            <h6 class="m-0 font-weight-bold text-primary">Usuario</h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Nombre</th>
                                            <th>Cedula</th>
                                            <th>Correo</th>
                                            <th>Perfil</th>
                                            <th>Fecha De Registro</th>
                                            <?php 
						                        switch($rol){
							                        case 1:
								                        echo ' <th>Opciones</th>';
							                            break;
								                    }
					                        ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Mostramos los resultados de la consultas realizadas de la tabla usuarios -->
                                        <?php
                                            while ($row = $resultado->fetch_assoc()) :
                                                $validacion = $row['descontinuado'];
                                            if ($validacion == 2) {
                                            ?>
                                        <tr>
                                            <td><?php echo $row['usuario']; ?></td>
                                            <td><?php echo $row['nombre']; ?></td>
                                            <td><?php echo $row['cedula']; ?></td>
                                            <td><?php echo $row['correo']; ?></td>
                                            <td><?php echo $row['roles']; ?></td>
                                            <td><?php echo $row['registro']; ?></td>
                                            <?php 
                                                   switch($rol){
                                                        case 1:
                                                             echo ' <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                            Opciones
                                                        </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#editarUser'.$row['id_usuarios'].'" href="#">
                                                        <img src="img/svg/editar.svg " alt="Industrias Canaima" width="15" height="15"> Editar</a>
                                                            <a class="dropdown-item btn btn-danger" href="php/eliminar/eliminarusuario.php?id='.$row['id_usuarios'].'">
                                                            <img src="img/svg/eliminar.svg " alt="Industrias Canaima" width="15" height="15"> Eliminar</a>
                                                        </div>
                                                    </div>
                                                ';
                                                            break;
                                                   }
                                               ?>
                                            </td>
                                           
                                            <?php
                                                include "modal/edit/modaleditusuario.php";
                                            ?>
                                            <?php 
                                            }
                                                endwhile;
                                            ?>
                                        </tr>

                                    </tbody>
                                </table>
                    <!-- Modales -->

                    <?php
                            // include "modal/modalRegistroUsuario.php";
                            include "modal/modalRegistroUsuarioProvi.php"
                        ?>
                </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

<?php require "inc/footer.php";?>
    <script src="js/function.js"></script>
    <script src="js/registrousuario.js"></script>
    <?php require "inc/script.php";?>

</body>

</html>