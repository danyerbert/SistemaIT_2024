<?php
require "../function.php";
if ($_POST) {
    $rol = limpiarDatos($_POST['rol']);
    switch ($rol) {
        case 1:
            $ruta = "../admin.php";
            break;
        case 2:
            $ruta = "../presidencia.php";
            break;
        case 3:
            $ruta = "../analista.php";
            break;
        case 4:
            $ruta = "../tecnico.php";
            break;
        case 5:
            $ruta = "../verificador.php";
            break;
        case 6:
            $ruta = "../coordinador.php";
            break;
        case 7:
            $ruta = "../superadmin.php";
            break;
        default:
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Rol no valido.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 35000
                }).then(() => {
                    location.assign('404.php');
                });
        });
            </script>";
            break;
    }
    $primeraFecha = limpiarDatos($_POST['fechaDesde']);
    if ($primeraFecha == "") {
        header("location: $ruta");
    }elseif ($primeraFecha == "0000-00-00") {
        header("location: $ruta");
    }
    $segundaFecha = limpiarDatos($_POST['fechaHasta']);
    if ($segundaFecha == "") {
        header("location: $ruta");
    }elseif ($segundaFecha == "0000-00-00") {
        header("location: $ruta");
    }
    $dispositivos = limpiarDatos($_POST['dispositivo']);
    if (!preg_match("/\b/", $dispositivos)) {
        header("location: $ruta");
    }elseif (!preg_match("/[0-9]{1}/", $dispositivos)) {
        header("location: $ruta");
    }
    $formato = limpiarDatos($_POST['formato']);
    if (!preg_match("/\b/", $formato)) {
        header("location: $ruta");
    }elseif (!preg_match("/[0-9]{1}/", $formato)) {
        header("location: $ruta");
    }

    switch ($formato) {
        case 1:
                header("Location: ../report/reporteDispositivosPDF.php?fd=$primeraFecha&fh=$segundaFecha&dis=$dispositivos&r=$rol");
            break;
        case 2:
            header("Location: ../report/reporteDispositivoEXCEL.php?fd=$primeraFecha&fh=$segundaFecha&dis=$dispositivos&r=$rol");
            break;
        default:
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Formato no permitido',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 35000
                    }).then(() => {
                        location.assign('".$ruta."');
                    });
            });
                </script>";
            break;
    }
}

?>