<?php
require "config/app.php";
require "config/conexion.php";
session_start();
if (!isset($_SESSION['id_usuarios'])) {
    header("Location: index.php");
}else{
    if ($_SESSION['id_roles'] != 7) {
        header("Location: 404.php");
    }
}

$usuario = $_SESSION['usuario'];
$rol = $_SESSION['id_roles'];
$id_usuario = $_SESSION['id_usuarios'];

//Consulta para modal de reportes estatus
$sqlMestatus = "SELECT id_estatus, estatus FROM estatus";
$resultadoMestatus = $mysqli->query($sqlMestatus);

// Consulta para modal de reportes de dispositivos.
$sqlDispositivos = "SELECT id_tipo_de_equipo, nombre FROM tipo_de_equipo";
$resultadoDispositivos = $mysqli->query($sqlDispositivos);
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de Inventario y Trazabilidad (SIT)</title>
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
    <div id="wrapper">
        <?php include "inc/navbarlateral.php"; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <?php include "inc/navbar2.php"; ?>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo company; ?> | SIT </h1>
                    </div>
                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Dispositivos en Atención al Ciudadano
                                    </h6>
                                    <div></div>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#generarReporteDispositivos">
                                        Generar Reporte
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Estatus Equipos</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <hr>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Recibidos
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-secondary"></i> En linea
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Reparado
                                        </span><br>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-danger"></i> Por verificar
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-warning"></i> Verificado
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Por entregar
                                        </span><br>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-dark"></i> Entregado
                                        </span>
                                    </div>
                                    <hr>
                                    <div class="mt-4 text-center small">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#generarReporteEstatus">
                                            Generar Reporte
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.container-fluid -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
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
                    <!-- End of Main Content -->
                    <?php
                        include "modal/modalRegistroUsuario.php";
                        include "modal/report/generarReporteEstatus.php";
                        include "modal/report/generarReporteDispositivos.php";
                    ?>
                    <?php require "inc/footer.php";?>
                    <?php require "inc/script.php";?>
                    <script>
                    <?php
                        $sqlTipodeEquipo = "SELECT nombre FROM tipo_de_equipo";
                        $resultadoEquipos = $mysqli->query($sqlTipodeEquipo);
                        ?>

                    const xValues = [
                        <?php  while ($row = $resultadoEquipos->fetch_assoc()) { ?> '<?php echo $row['nombre'];?>',
                        <?php }?>
                    ];
                    <?php 
            include "datosGraficaLine.php";
        ?>
                    const yValues = [<?php echo $CantidadTablet;?>, <?php echo $CantidadTabletDos;?>,
                        <?php echo $CantidadCanaimaOne;?>, <?php echo $CantidadCanaimaDos;?>,
                        <?php echo $CantidadCanaimatres;?>, <?php echo $CantidadCanaimaCuatro;?>,
                        <?php echo $CantidadCanaimaCinco;?>, <?php echo $CantidadCanaimaDocente;?>,
                        <?php echo $CantidadTabletTres;?>, <?php echo $CantidadCanaimaSeis;?>,
                    ];
                    // Area Chart Example
                    var ctx = document.getElementById("myAreaChart");
                    var myLineChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: xValues,
                            datasets: [{
                                label: "Earnings",
                                lineTension: 0.3,
                                backgroundColor: "rgba(78, 115, 223, 0.05)",
                                borderColor: "rgba(78, 115, 223, 1)",
                                pointRadius: 3,
                                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                                pointBorderColor: "rgba(78, 115, 223, 1)",
                                pointHoverRadius: 3,
                                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                                pointHitRadius: 10,
                                pointBorderWidth: 2,
                                data: yValues,
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            layout: {
                                padding: {
                                    left: 10,
                                    right: 25,
                                    top: 25,
                                    bottom: 0
                                }
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        min: 1,
                                        max: 500
                                    }
                                }],
                            },
                            legend: {
                                display: false
                            },
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                titleMarginBottom: 10,
                                titleFontColor: '#6e707e',
                                titleFontSize: 14,
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: false,
                                intersect: false,
                                mode: 'index',
                                caretPadding: 10
                            }
                        }
                    });

                    // Graficas para estatus de equipos

                    <?php
            $sqlStatus = "SELECT estatus FROM estatus";
            $resultadoStatus = $mysqli->query($sqlStatus);
        ?>
                    var xValuesTorta = [
                        <?php while ($row = $resultadoStatus->fetch_assoc()) { ?> '<?php  echo $row['estatus'];?>',
                        <?php
    }?>
                    ];

                    <?php 
            require "datosGraficaTorta.php";
        ?>
                    var yValuesTorta = [<?php echo $cantidadRecibidos;?>, <?php echo $cantidadEnLinea;?>,
                        <?php echo $cantidadReparados;?>, <?php echo $cantidadPorVerificar;?>,
                        <?php echo $cantidadVerificado;?>, <?php echo $cantidadPorEntregar;?>,
                        <?php echo $cantidadEntregados;?>
                    ];
                    // Pie Chart Example
                    var ctx = document.getElementById("myPieChart");
                    var myPieChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: xValuesTorta,
                            datasets: [{
                                data: yValuesTorta,
                                backgroundColor: ['#4e73df', '#858796', '#1cc88a', '#e74a3b',
                                    '#f6c23e', '#36b9cc', '#5a5c69'
                                ],
                                hoverBackgroundColor: ['#4e73df', '#858796', '#1cc88a', '#e74a3b',
                                    '#f6c23e', '#36b9cc', '#5a5c69'
                                ],
                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: false,
                                caretPadding: 10,
                            },
                            legend: {
                                display: false
                            },
                            cutoutPercentage: 70,
                        },
                    });
                    </script>
</body>

</html>