<?php
require "config/conexion.php";

$id_usuarios = $_SESSION['id_usuarios'];
$usuario = $_SESSION['usuario'];

?>
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">


        <!-- Dropdown - Messages -->

        <?php

            // Prueba de funcionamiento de notificaciones modificadas por Danyerbert

            switch ($rol) {
                case 3:
                    $estatusDispo = 6;
                    $filenameDetalles = "detalleanalista.php";
                    $notiText = "Entregar, ";  
                    $consultaver = "SELECT id_dispositivo, id_tipo_de_dispositivo, registro, observaciones_verificador,  responsable FROM datos_del_dispotivo WHERE id_estatus = ".$estatusDispo." ORDER BY registro DESC ";
                    $resultadover = $mysqli->query($consultaver);
                    $numr = $resultadover->num_rows;
                    echo '
                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">'.$numr.'+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                NOTIFICACIONES
                            </h6>';
                            setlocale(LC_TIME, 'es_VE');
                            $i = 0;
                            while(($verNot = $resultadover->fetch_assoc()) && ($i < 5)) {
                                echo '<a class="dropdown-item d-flex align-items-center" href="'.$filenameDetalles.'?id='.$verNot['id_dispositivo'].'">
                                <div class="mr-3">
                                    <div class="bg-primary icon-circle">';
                                        $icono;
                                        switch($verNot['id_tipo_de_dispositivo']) {
                                        case 1:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 3:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 4:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 5:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 6:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 7:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 8:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        }
                                        echo '<img class="img-fluid " src="'.$icono.'">
                                    </div>
                                </div>
                                <div>';
                                    $fechafmt = strftime("%d de %B de %Y", strtotime($verNot['registro']));
                                    echo '<div class="small text-gray-500">'.$fechafmt.'</div>
                                    <span class="font-weight-bold">Nuevo equipo por '.$notiText.' observación:
                                        '.$verNot['observaciones_verificador'].'</span>
                                </div>
                                </a>';
                                $i++;
                                }
                                echo '
                        </div>
                    </li>';
                    break;
                case 4:
                    $estatusDispo = 2;
                    $filenameDetalles = "detalletecnico.php";
                    $notiText = "Reparar, ";
                    $consultaver = "SELECT id_dispositivo, id_tipo_de_dispositivo, registro, observaciones_analista, responsable FROM datos_del_dispotivo WHERE id_estatus = ".$estatusDispo." AND responsable = ".$id_usuarios." ORDER BY
                    registro DESC ";
                    $resultadover = $mysqli->query($consultaver);
                    $numr = $resultadover->num_rows;
                    echo '
                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">'.$numr.'+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                NOTIFICACIONES
                            </h6>';
                            setlocale(LC_TIME, 'es_VE');
                            $i = 0;
                            while(($verNot = $resultadover->fetch_assoc()) && ($i < 5)) {
                                echo '<a class="dropdown-item d-flex align-items-center" href="'.$filenameDetalles.'?id='.$verNot['id_dispositivo'].'">
                                <div class="mr-3">
                                    <div class="bg-primary icon-circle">';
                                        $icono;
                                        switch($verNot['id_tipo_de_dispositivo']) {
                                        case 1:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 3:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 4:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 5:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 6:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 7:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 8:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        }
                                        echo '<img class="img-fluid " src="'.$icono.'">
                                    </div>
                                </div>
                                <div>';
                                    $fechafmt = strftime("%d de %B de %Y", strtotime($verNot['registro']));
                                    echo '<div class="small text-gray-500">'.$fechafmt.'</div>
                                    <span class="font-weight-bold">Nuevo equipo por '.$notiText.' observación:
                                        '.$verNot['observaciones_analista'].'</span>
                                </div>
                                </a>';
                                $i++;
                                }
                                echo '
                        </div>
                    </li>';
                    break;
                case 5:
                    $estatusDispo = 4;
                    $filenameDetalles = "detallesverificador.php";
                    $notiText = "Verificar, ";
                    $consultaver = "SELECT registro, observaciones_tecnico, id_dispositivo, id_tipo_de_dispositivo FROM
                    datos_del_dispotivo WHERE id_estatus = ".$estatusDispo." AND responsable = ".$id_usuarios." ORDER BY registro DESC ";
                    $resultadover = $mysqli->query($consultaver);
                    $numr = $resultadover->num_rows;
                    echo '
                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">'.$numr.'+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                NOTIFICACIONES
                            </h6>';
                            setlocale(LC_TIME, 'es_VE');
                            $i = 0;
                            while(($verNot = $resultadover->fetch_assoc()) && ($i < 5)) {
                                echo '<a class="dropdown-item d-flex align-items-center" href="'.$filenameDetalles.'?id='.$verNot['id_dispositivo'].'">
                                <div class="mr-3">
                                    <div class="bg-primary icon-circle">';
                                        $icono;
                                        switch($verNot['id_tipo_de_dispositivo']) {
                                        case 1:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 3:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 4:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 5:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 6:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 7:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 8:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        }
                                        echo '<img class="img-fluid " src="'.$icono.'">
                                    </div>
                                </div>
                                <div>';
                                    $fechafmt = strftime("%d de %B de %Y", strtotime($verNot['registro']));
                                    echo '<div class="small text-gray-500">'.$fechafmt.'</div>
                                    <span class="font-weight-bold">Nuevo equipo por '.$notiText.' observación:
                                        '.$verNot['observaciones_tecnico'].'</span>
                                </div>
                                </a>';
                                $i++;
                                }
                                echo '
                        </div>
                    </li>';
                    break;
                case 6:
                    $filenameDetalles = "asignar.php";
                    $notiText = "Asignar, ";
                    $consultaver = "SELECT observaciones_analista, observaciones_tecnico, observaciones_verificador, registro, id_dispositivo, ic_dispositivo, id_tipo_de_dispositivo, id_estatus FROM datos_del_dispotivo WHERE coordinador = 6 ORDER BY registro DESC ";
                    $resultadover = $mysqli->query($consultaver);
                    $numr = $resultadover->num_rows;
                    echo '
                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">'.$numr.'+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                NOTIFICACIONES
                            </h6>';
                            setlocale(LC_TIME, 'es_VE');
                            $i = 0;
                            while(($verNot = $resultadover->fetch_assoc()) && ($i < 5)) {
                                    switch($verNot['id_estatus']) {
                                        case 1:
                                            $notiTextAsign = "analista";
                                            echo '<a class="dropdown-item d-flex align-items-center" href="'.$filenameDetalles.'?tipo='.$notiTextAsign."&asignarid=".$verNot['id_dispositivo'].'">';
                                            break; 
                                        case 2:
                                            $notiTextAsign = "tecnico";
                                            echo '<a class="dropdown-item d-flex align-items-center" href="dispositivosdeSalida.php?id=2">';
                                            break;
                                        case 3:
                                            $notiTextAsign = "tecnico";
                                            echo '<a class="dropdown-item d-flex align-items-center" href="'.$filenameDetalles.'?tipo='.$notiTextAsign."&asignarid=".$verNot['id_dispositivo'].'">';
                                            break;
                                        case 4:
                                            $notiTextAsign = "tecnico";
                                            echo '<a class="dropdown-item d-flex align-items-center" href="dispositivoporverificar.php?id=4">';
                                            break;
                                        case 5:
                                            $notiTextAsign = "verificador";
                                            echo '<a class="dropdown-item d-flex align-items-center" href="'.$filenameDetalles.'?tipo='.$notiTextAsign."&asignarid=".$verNot['id_dispositivo'].'">';
                                            break;
                                        case 6:
                                            $notiTextAsign = "verificador";
                                            echo '<a class="dropdown-item d-flex align-items-center" href="dispositivosporentregar.php?id=6">';
                                            break;
                                        case 7:
                                            $notiTextAsign = "analista";
                                            echo '<a class="dropdown-item d-flex align-items-center" href="dispositivosEntregados.php?id=7">';
                                            break;
                                    }
                                // echo '<a class="dropdown-item d-flex align-items-center" href="'.$filenameDetalles.'?tipo='.$notiTextAsign."&asignarid=".$verNot['id_datos_del_dispositivo'].'">
                                echo '
                                <div class="mr-3">
                                    <div class="bg-primary icon-circle">';
                                        $icono;
                                        switch($verNot['id_tipo_de_dispositivo']) {
                                        case 1:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 3:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 4:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 5:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 6:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 7:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        case 8:
                                        $icono = "img/canaimalogo2.jpg";
                                        break;
                                        }
                                        echo '<img class="img-fluid " src="'.$icono.'">
                                    </div>
                                </div>
                                <div>';
                                $fechafmt = strftime("%d de %B de %Y", strtotime($verNot['registro']));
                                switch ($verNot['id_estatus']) {
                                    case 1:
                                        echo '<div class="small text-gray-500">'.$fechafmt.'</div>
                                            <span class="font-weight-bold">Nuevo equipo por '.$notiText.' observación:'.$verNot['observaciones_analista'].'</span>';
                                        break;
                                    case 2:
                                        echo '<div class="small text-gray-500">'.$fechafmt.'</div>
                                        <span class="font-weight-bold">Equipo En la linea</span>';
                                        break;
                                    case 3:
                                        echo '<div class="small text-gray-500">'.$fechafmt.'</div>
                                        <span class="font-weight-bold">Nuevo equipo por '.$notiText.' observación:
                                                '.$verNot['observaciones_tecnico'].'</span>';
                                        break;
                                    case 4:
                                        echo '<div class="small text-gray-500">'.$fechafmt.'</div>
                                        <span class="font-weight-bold">Equipo Por Verificar</span>';
                                        break;
                                    case 5:
                                        echo '<div class="small text-gray-500">'.$fechafmt.'</div>
                                        <span class="font-weight-bold">Nuevo equipo por '.$notiText.' observación:
                                        '.$verNot['observaciones_verificador'].'</span>';
                                        break;
                                    case 6:
                                        echo '<div class="small text-gray-500">'.$fechafmt.'</div>
                                        <span class="font-weight-bold">Equipo Por verificar</span>';
                                        break;    
                                    case 7:
                                        echo '<div class="small text-gray-500">'.$fechafmt.'</div>
                                        <span class="font-weight-bold">Equipo Entregado</span>';
                                        break;
                                    default:
                                            echo '<div class="small text-gray-500">'.$fechafmt.'</div>
                                            <span class="font-weight-bold">No hay equipos</span>';
                                        break;
                                }
                                echo '</div>
                                </a>';
                                $i++;
                                }
                                echo '
                        </div>
                    </li>';
                    break;
                case 7:
                        $filenameDetalles = "asignar.php";
                        $notiText = "Asignar, ";
                        $consultaver = "SELECT observaciones_analista, observaciones_tecnico, observaciones_verificador, registro, id_dispositivo, ic_dispositivo, id_tipo_de_dispositivo, id_estatus FROM datos_del_dispotivo ORDER BY registro DESC ";
                        $resultadover = $mysqli->query($consultaver);
                        $numr = $resultadover->num_rows;
                        echo '
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">'.$numr.'+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    NOTIFICACIONES
                                </h6>';
                                setlocale(LC_TIME, 'es_VE');
                                $i = 0;
                                while(($verNot = $resultadover->fetch_assoc()) && ($i < 5)) {
                                        switch($verNot['id_estatus']) {
                                            case 1:
                                                $notiTextAsign = "analista";
                                                echo '<a class="dropdown-item d-flex align-items-center" href="'.$filenameDetalles.'?tipo='.$notiTextAsign."&asignarid=".$verNot['id_dispositivo'].'">';
                                                break; 
                                            case 2:
                                                $notiTextAsign = "tecnico";
                                                echo '<a class="dropdown-item d-flex align-items-center" href="dispositivosdeSalida.php?id=2">';
                                                break;
                                            case 3:
                                                $notiTextAsign = "tecnico";
                                                echo '<a class="dropdown-item d-flex align-items-center" href="'.$filenameDetalles.'?tipo='.$notiTextAsign."&asignarid=".$verNot['id_dispositivo'].'">';
                                                break;
                                            case 4:
                                                $notiTextAsign = "tecnico";
                                                echo '<a class="dropdown-item d-flex align-items-center" href="dispositivoporverificar.php?id=4">';
                                                break;
                                            case 5:
                                                $notiTextAsign = "verificador";
                                                echo '<a class="dropdown-item d-flex align-items-center" href="'.$filenameDetalles.'?tipo='.$notiTextAsign."&asignarid=".$verNot['id_dispositivo'].'">';
                                                break;
                                            case 6:
                                                $notiTextAsign = "verificador";
                                                echo '<a class="dropdown-item d-flex align-items-center" href="dispositivosporentregar.php?id=6">';
                                                break;
                                            case 7:
                                                $notiTextAsign = "analista";
                                                echo '<a class="dropdown-item d-flex align-items-center" href="dispositivosEntregados.php?id=7">';
                                                break;
                                        }
                                    // echo '<a class="dropdown-item d-flex align-items-center" href="'.$filenameDetalles.'?tipo='.$notiTextAsign."&asignarid=".$verNot['id_datos_del_dispositivo'].'">
                                    echo '
                                    <div class="mr-3">
                                        <div class="bg-primary icon-circle">';
                                            $icono;
                                            switch($verNot['id_tipo_de_dispositivo']) {
                                            case 1:
                                            $icono = "img/canaimalogo2.jpg";
                                            break;
                                            case 3:
                                            $icono = "img/canaimalogo2.jpg";
                                            break;
                                            case 4:
                                            $icono = "img/canaimalogo2.jpg";
                                            break;
                                            case 5:
                                            $icono = "img/canaimalogo2.jpg";
                                            break;
                                            case 6:
                                            $icono = "img/canaimalogo2.jpg";
                                            break;
                                            case 7:
                                            $icono = "img/canaimalogo2.jpg";
                                            break;
                                            case 8:
                                            $icono = "img/canaimalogo2.jpg";
                                            break;
                                            }
                                            echo '<img class="img-fluid " src="'.$icono.'">
                                        </div>
                                    </div>
                                    <div>';
                                    $fechafmt = strftime("%d de %B de %Y", strtotime($verNot['registro']));
                                    switch ($verNot['id_estatus']) {
                                        case 1:
                                            echo '<div class="small text-gray-500">'.$fechafmt.'</div>
                                                <span class="font-weight-bold">Nuevo equipo por '.$notiText.' observación:'.$verNot['observaciones_analista'].'</span>';
                                            break;
                                        case 2:
                                            echo '<div class="small text-gray-500">'.$fechafmt.'</div>
                                            <span class="font-weight-bold">Equipo En la linea</span>';
                                            break;
                                        case 3:
                                            echo '<div class="small text-gray-500">'.$fechafmt.'</div>
                                            <span class="font-weight-bold">Nuevo equipo por '.$notiText.' observación:
                                                    '.$verNot['observaciones_tecnico'].'</span>';
                                            break;
                                        case 4:
                                            echo '<div class="small text-gray-500">'.$fechafmt.'</div>
                                            <span class="font-weight-bold">Equipo Por Verificar</span>';
                                            break;
                                        case 5:
                                            echo '<div class="small text-gray-500">'.$fechafmt.'</div>
                                            <span class="font-weight-bold">Nuevo equipo por '.$notiText.' observación:
                                            '.$verNot['observaciones_verificador'].'</span>';
                                            break;
                                        case 6:
                                            echo '<div class="small text-gray-500">'.$fechafmt.'</div>
                                            <span class="font-weight-bold">Equipo Por verificar</span>';
                                            break;    
                                        case 7:
                                            echo '<div class="small text-gray-500">'.$fechafmt.'</div>
                                            <span class="font-weight-bold">Equipo Entregado</span>';
                                            break;
                                        default:
                                                echo '<div class="small text-gray-500">'.$fechafmt.'</div>
                                                <span class="font-weight-bold">No hay equipos</span>';
                                            break;
                                    }
                                    echo '</div>
                                    </a>';
                                    $i++;
                                    }
                                    echo '
                            </div>
                        </li>';
                        break;    
            }
        ?>


        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <?php 
                    switch ($rol) {
                   case 1:
                        echo "Administrador";
                        
                        break;
                    case 2:
                        echo "Presidencia";
                        break;
                    case 3:
                        echo "Analista";
                        break;
                    case 4:
                        echo "Técnico";
                        break;
                    case 5:
                        echo "Verificador";
                        break;
                    case 6:
                        echo "Coordinador de Área";
                        break;
                    case 7:
                        echo "Superadministrador";
                        break;
                }

                    ?>

                </span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Salir
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->