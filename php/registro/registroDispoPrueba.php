<?php
require "../../config/conexion.php";
require "../../function.php";

if ($_POST) {
    $tipoDeEquipo = limpiarDatos($_POST['tipo_de_equipo']);
    if ($tipoDeEquipo == "") {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Seleccione un tipo de equipo',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
              }).then(() => {
                location.assign('../../dispositivosentrada.php');
              });
    });
        </script>";
    }   
    $serialEquipo = limpiarDatos($_POST['serial_del_equipo']);
    if (!preg_match("/[A-Z0-9]{18}/", $serialEquipo)) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Serial de equipo ingresado no valido.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
              }).then(() => {
                location.assign('../../dispositivosentrada.php');
              });
    });
        </script>";
    }
    $serialCargador = limpiarDatos($_POST['serial_cargador']);
    if (!preg_match("/[A-Z0-9]{25}/", $serialCargador)) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Serial de cargador ingresado no valido.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
              }).then(() => {
                location.assign('../../dispositivosentrada.php');
              });
    });
        </script>";
    }
    $fechaRecepcion = $_POST['fecha_de_recepcion'];
    if ($fechaRecepcion == "") {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Ingrese una fecha de recepcion.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
              }).then(() => {
                location.assign('../../dispositivosentrada.php');
              });
    });
        </script>";
    }
    $estadoRecepcion = limpiarDatos($_POST['estado_recepcion']);
    if ($estadoRecepcion == "") {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Seleccione un estado de equipo.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
              }).then(() => {
                location.assign('../../dispositivosentrada.php');
              });
    });
        </script>";
    }
    $observaciones_analista = limpiarDatos($_POST['observaciones']);
    if ($observaciones_analista == "") {
    $observaciones_analista = "No posee observaciones";
    }

    $rol = limpiarDatos($_POST['id_roles']);
    if ($rol == "") {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Rol no enviado.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
              }).then(() => {
                location.assign('../../dispositivosentrada.php');
              });
    });
        </script>";
    }
    $origen = limpiarDatos($_POST['origen']);
    if ($origen == "") {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Origen no enviado.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
              }).then(() => {
                location.assign('../../dispositivosentrada.php');
              });
    });
        </script>";
    }
    $estatus = limpiarDatos($_POST['estatus']);
    if ($estatus == "") {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Estatus no enviado.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
              }).then(() => {
                location.assign('../../dispositivosentrada.php');
              });
    });
        </script>";
    }
    $falla = limpiarDatos($_POST['falla']);
    if ($falla == "") {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Seleccione una falla.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
              }).then(() => {
                location.assign('../../dispositivosentrada.php');
              });
    });
        </script>";
    }
    $beneficiario = limpiarDatos($_POST['beneficiario']);
    if ($beneficiario == "") {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Beneficiario no enviado.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
              }).then(() => {
                location.assign('../../dispositivosentrada.php');
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
                title: 'Responsable no enviado.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
              }).then(() => {
                location.assign('../../dispositivosentrada.php');
              });
    });
        </script>";
    }
    $motivoIngreso = limpiarDatos($_POST['motivoIngreso']);
    if ($motivoIngreso == "") {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Seleccione el motivo de ingreso.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
              }).then(() => {
                location.assign('../../dispositivosentrada.php');
              });
    });
        </script>";
    }
    $responsableRecepcion = limpiarDatos($_POST['responsableRecepcion']);
    if ($responsableRecepcion=="") {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Responsable no enviado.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
              }).then(() => {
                location.assign('../../dispositivosentrada.php');
              });
    });
        </script>";
    }
    //Generacion de IC para el registro del dispositivo
    $datos = "SELECT MAX(id_dispositivo) AS id_dispositivo FROM datos_del_dispotivo";
    $resultado=mysqli_query($mysqli,$datos);
    while ($row = mysqli_fetch_assoc($resultado)) {
        $valor1 = $row['id_dispositivo'];
            $contadordb = 0;
            for ($i=0; $i <= $valor1 ; $i++) { 
                if ($valor1 == 0) {
                    $contadordb = 1;
                }else {
                    $contadordb++;
                }
            }
            $ic =  date("Y", strtotime($fechaRecepcion)) . "-". $contadordb ;
    }

        $coordinador = limpiarDatos($_POST['coordinador']);
        $fechaEntrega = "0000-00-00";
        $comprobacion = "Faltan comprobaciones";
        $observaciones_tecnico = "Falta por observaciones";
        $observaciones_verificador = "Falta por observaciones";
        $responsableAnalistaRecibido = $responsableRecepcion;
        $responsableTecnico = "aun no";
        $responsableVerficador = "aun no";
        $responsableAnalistaEntrega = "aun no";
        $observacionesAnalistaEntrega = "aun no";
        $descontinuado = 2;

        $sql = "INSERT INTO datos_del_dispotivo (id_dispositivo, ic_dispositivo, id_tipo_de_dispositivo, serial_equipo, serial_de_cargador, fecha_de_recepcion, estado_recepcion_equipo, fecha_de_entrega, responsable, responsable_analista_recibido, responsable_tecnico, responsable_verificador, responsable_analista_entrega, observaciones_analista, observaciones_tecnico, observaciones_verificador, observaciones_analista_entrega, comprobaciones, motivo_de_ingreso, coordinador, id_roles, id_origen, id_estatus, id_motivo, id_datos_del_beneficiario, descontinuado) VALUES (NULL, '$ic','$tipoDeEquipo','$serialEquipo','$serialCargador','$fechaRecepcion','$estadoRecepcion', '$fechaEntrega', '$responsable','$responsableAnalistaRecibido','$responsableTecnico','$responsableVerficador','$responsableAnalistaEntrega','$observaciones_analista', '$observaciones_tecnico', '$observaciones_verificador', '$observacionesAnalistaEntrega', '$comprobacion', '$motivoIngreso','$coordinador','$rol','$origen','$estatus', '$falla','$beneficiario' , '$descontinuado')";
        $resultado = mysqli_query($mysqli, $sql);

if ($resultado) {
            $comprobacionIc = "SELECT MAX(ic_dispositivo) AS ic_dispositivo FROM datos_del_dispotivo";
            $resultadoCompobacion = $mysqli->query($comprobacionIc);

            if ($resultadoCompobacion) {
                while ($row2 = $resultadoCompobacion->fetch_assoc()) {
                    $icMuestra = $row2['ic_dispositivo'];
                }

                echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'Success',
                            title: 'Equipo Registrado IC: . ".$icMuestra."',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK',
                            timer: 35000
                        }).then(() => {
                            location.assign('../../dispositivosentrada.php');
                        });
                });
                    </script>";
    }   
        }else {
            echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Fallo al ingresar el equipo.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
              }).then(() => {
                location.assign('../../dispositivosentrada.php');
              });
    });
        </script>";
        }
    
}else {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script language='JavaScript'>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Data solicitada no enviada.',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 35000
          }).then(() => {
            location.assign('../../dispositivosentrada.php');
          });
});
    </script>";
}
?>