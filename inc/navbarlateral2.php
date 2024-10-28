<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <?php    
    switch($rol){
        case 3:
            echo '<a class="sidebar-brand d-flex align-items-center justify-content-center" href="analista.php">';
            break;
        case 4:
            echo '<a class="sidebar-brand d-flex align-items-center justify-content-center" href="tecnico.php">';
            break;
        case 5:
            echo '<a class="sidebar-brand d-flex align-items-center justify-content-center" href="verificador.php">';
            break;    
        default:
            header("Location: 404.html");
            break;} 

?>
    <div class="sidebar-brand-icon rotate-n-15">
        <img src="img/Canaima.png " alt="Industrias Canaima" width="42" height="42">
    </div>
    <div class="sidebar-brand-text mx-3"><?php echo company; ?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-2">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <?php
             //    Comprobación de rol de usuario y muestra de enlace de home.
            switch ($rol) {
                case 1:
                    echo '<a class="nav-link" href="admin.php">';
                    break;
                case 2:
                    echo '<a class="nav-link" href="presidencia.php">';
                    break;
                case 3:
                    echo '<a class="nav-link" href="analista.php">';
                    break;
                case 4:
                    echo '<a class="nav-link" href="tecnico.php">';
                    break;
                case 5:
                    echo '<a class="nav-link" href="verificador.php">';
                    break;    
            }    
        ?>
        <i class="fas fa-home fa-home-alt"></i>
                    <span>Home</span></a>
    </li>

    <!-- divider -->
    <hr class="sidebar-divider">

    <!-- heading -->
    <div class="sidebar-heading">
        administrar
    </div>

    <!-- Nav Item - Pages Collapse Menu-->
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
    <i class="fas fa-fw fa-cog"></i>
                    <span>Administrar</span>
                    </a>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <?php
             //    Comprobación de rol de usuario y muestra de enlace de la lista necesario para el rol.
            switch ($rol) {
                case 2:
                    echo ' <a class="collapse-item" href="listadebeneficiario.php">Beneficiario</a>">
                    <div class="btn-group dropright">
                                <a type="button" class="collapse-item dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Beneficiario
                                </a>
                                <div class="dropdown-menu">
                                <a class ="dropdown-item" href="Listadeapoyo.php">Apoyo Institucional</a>
                                <a class ="dropdown-item" href="listadebeneficiario.php">Beneficiario</a>
                                <a class ="dropdown-item" href="listatrabajadores.php">Trabajador</a>
                                <a class ="dropdown-item" href="listajornadas.php">Jornadas Especiales</a>
                                </div>
                            </div>
                    ';
                    break;  
                case 3:
                    echo '
                    <a class="collapse-item" href="dispositivosentrada.php">Dispositivos</a>
                    <a class="collapse-item" href="dispositivos.php?idenlace=6">Por entregar</a>
                    <a class="collapse-item" href="dispositivos.php?idenlace=7">Entregados</a>
                    <div class="btn-group dropright">
                    <a type="button" class="collapse-item dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Beneficiario
                    </a>
                    <div class="dropdown-menu">
                    <a class ="dropdown-item" href="Listadeapoyo.php">Apoyo Institucional</a>
                    <a class ="dropdown-item" href="listadebeneficiario.php">Beneficiario</a>
                    <a class ="dropdown-item" href="listatrabajadores.php">Trabajador</a>
                    </div>
                </div>
                    ';

                    break;  
                case 4:
                        echo '
                        <a class="collapse-item" href="dispositivos.php?idenlace=2">En la linea</a>
                        <a class="collapse-item" href="dispositivos.php?idenlace=3">Reparados</a>
                        ';
                    break; 
                case 5:
                            echo '
                            <a class="collapse-item" href="dispositivos.php?idenlace=4">Por verificar</a>
                            <a class="collapse-item" href="dispositivos.php?idenlace=5">Verificados</a>
                            ';
                    break;   
            }    
             ?>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->