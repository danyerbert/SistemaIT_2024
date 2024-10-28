<?php
require "function.php";

if ($_POST) {
$idDispo = limpiarDatos($_POST['id_dispositivo']);
if ($idDispo == "") {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script language='JavaScript'>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'No se envio el identificador.',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 55000
          }).then(() => {
            location.assign('detallesverificador.php');
          });
});
    </script>";
}
$observacion = $_POST['observaciones'];
if ($observacion == "") {
  echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Debe ingresar observaciones.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 55000
              }).then(() => {
                location.assign('detallesverificador.php');
              });
    });
        </script>";
}
$comprobacion = implode(',', $_POST['comprobaciones']);
if ($comprobacion == "") {
    echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Marca las casillas.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 55000
              }).then(() => {
                location.assign('detallesverificador.php');
              });
    });
        </script>";
}
$estatus =limpiarDatos($_POST['id_status']);
if ($estatus != 5) {
  echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'El estatus no es lo indicado.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 55000
              }).then(() => {
                location.assign('detallesverificador.php');
              });
    });
        </script>";
}
$responsable = limpiarDatos($_POST['responsable']);
if ($responsable == "") {
  echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'No existe ningun responsable',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 55000
              }).then(() => {
                location.assign('detallesverificador.php');
              });
    });
        </script>";
}
$id_roles = limpiarDatos($_POST['id_roles']);
if ($id_roles == "") {
  echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'No se envio el identificador.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 55000
              }).then(() => {
                location.assign('detallesverificador.php');
              });
    });
        </script>";
}
$responsableRecepcion = limpiarDatos($_POST['responsableRecepcion']);
if ($responsableRecepcion == "") {
    echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'No se envia el responsable.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 55000
              }).then(() => {
                location.assign('detallesverificador.php');
              });
    });
        </script>";
}

require "config/conexion.php";

$responsableVerificador = $responsableRecepcion;

$sql = "UPDATE datos_del_dispotivo SET id_estatus = '$estatus',  observaciones_verificador = '$observacion', responsable = '$responsable', responsable_verificador = '$responsableVerificador', comprobaciones = '$comprobacion',coordinador = 6, id_roles = '$id_roles' WHERE id_dispositivo = $idDispo"; 

$resultado = $mysqli->query($sql);

if ($resultado) {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script language='JavaScript'>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Se realizaron los cambios',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 55000
          }).then(() => {
            location.assign('detallesverificador.php?id=".$idDispo."');
          });
});
    </script>";
}else {
    echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'No se realizaron los cambios',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 55000
              }).then(() => {
                location.assign('detallesverificador.php?id=".$idDispo."');
              });
    });
        </script>";
}
}

?>