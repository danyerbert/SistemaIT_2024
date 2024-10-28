<?php
// Conexion a la base de datos
require "config/conexion.php";
//  Funciones requeridas para la validacion de los datos.
require "function.php";

    $tipoDocumento = limpiarDatos($_POST['tipo_documentoTrabajador']);
    if ($tipoDocumento != 1 || $tipoDocumento == "") {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'El tipo de documento fue modificado',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 55000
              }).then(() => {
                location.assign('listatrabajadores.php');
              });
    });
        </script>
        
        ";
    }
    $documento = limpiarDatos($_POST['documentoTrabajador']);
    if (!preg_match("/\b/",$documento)) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'El documento no cumple con el formato solicitado',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 55000
              }).then(() => {

                location.assign('listatrabajadores.php');

              });
    });
        </script>
        
        ";
        if (!preg_match("/[0-9]{8}/", $documento)) {
            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'El documento no cumple con el formato solicitado',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 55000
                    }).then(() => {
                        location.assign('listatrabajadores.php');
                    });
            });
                </script>
        ";
        }
    }
    $nombreInstitucion = limpiarDatos($_POST['nombre_del_beneficiarioTrabajador']);
    if (!preg_match("/^[A-ZÑa-zñáéíóúÁÉÍÓÚ'° ]{3,80}/", $nombreInstitucion)) {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'El nombre de la institucion no cumple con el formato solicitado',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 55000
                    }).then(() => {
                        location.assign('listatrabajadores.php');
                    });
            });
                </script>
                
        ";
    }
    $generoTrabajador = limpiarDatos($_POST['generoTrabajador']);
    if ($generoTrabajador == "") {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Debe seleccionar un genero.',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 55000
                    }).then(() => {
                        location.assign('listatrabajadores.php');
                    });
            });
                </script>
                
        ";
    }
    $areaTrabajador = limpiarDatos($_POST['areaTrabajador']);
    if ($areaTrabajador == "") {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Debe seleccionar un area',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 55000
                    }).then(() => {
                        location.assign('listatrabajadores.php');
                    });
            });
                </script>
                
        ";
    }
    $cargoTrabajador = limpiarDatos($_POST['cargoTrabajador']);
    if ($cargoTrabajador == "") {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Debe seleccionar un cargo',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 55000
                    }).then(() => {
                        location.assign('listatrabajadores.php');
                    });
            });
                </script>
                
        ";
    }
    $correoTrabajador = limpiarDatos($_POST['correoTrabajador']);
    if (!preg_match("/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/", $correoTrabajador)) {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'El correo no cumple con el formato solicitado',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 55000
                    }).then(() => {
                        location.assign('Listadeapoyo.php');
                    });
            });
                </script>
                
        ";
    }
    $telefonoTrabajador = limpiarDatos($_POST['phoneTrabajador']);
    if (!preg_match("/\b/", $telefonoTrabajador)) {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'El telefono debe ser de solo digitos.',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 55000
                    }).then(() => {
                        location.assign('listatrabajadores.php');
                    });
            });
                </script>
                
        ";
    }elseif (!preg_match("/[0-9]{11}/", $telefonoTrabajador)) {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'El telefono no cumple con los caracteres necesarios.',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 55000
                    }).then(() => {
                        location.assign('listatrabajadores.php');
                    });
            });
                </script>
                
        ";
    }
    $estado = limpiarDatos($_POST['estadoTrabajador']);
    if ($estado == "") {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Debe ingresar un estado',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 55000
                    }).then(() => {
                        location.assign('listatrabajadores.php');
                    });
            });
                </script>
        ";
    }
    $municipio = limpiarDatos($_POST['municipioTrabajador']);
    if (!preg_match("/^[a-zA-Z\s]{10,60}/", $municipio)) {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'El municipio no cumple con el formato solicitado',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 55000
                    }).then(() => {
                        location.assign('listatrabajadores.php');
                    });
            });
                </script>
        ";
    }
    $direccion = limpiarDatos($_POST['direccionTrabajador']); 
    if ($direccion == "") {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Debe ingresar una direccion',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 55000
                    }).then(() => {
                        location.assign('listatrabajadores.php');
                    });
            });
                </script>
                
        ";
    }
    $discapacidad = limpiarDatos($_POST['discapacidad_o_condicionTrabajador']);
    if ($discapacidad == "") {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Debe seleccionar un valor (Si o No)',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 55000
                    }).then(() => {
                        location.assign('listatrabajadores.php');
                    });
            });
                </script>
        ";
    }
    $descripcionDisca = limpiarDatos($_POST['descripcionDiscapacidadTrabajador']);
    if ($descripcionDisca == "") {
        $descripcionDisca = "No posee";
    }
    $origen = limpiarDatos($_POST['origenTrabajador']);
    if ($origen != 3 || $origen == "") {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'El origen fue modificado',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 55000
                    }).then(() => {
                        location.assign('listatrabajadores.php');
                    });
            });
                </script>
                
        ";
    }

    // Datos complementarios para el registro
    $edad = 0;
    $fechaNac = limpiarDatos($_POST['fecha_ingreso']);
    $nombreRepre = "Industria Canaima";
    $mesaTelecomunicaciones = "No posee";
    $institucionEntrega = "No posee";
    $institucionEstudia = "no posee";
    $responsableEntrega = "No posee";
    $consejoComunal = "no posee";
    $descontinuado = 2;
    $fecha_ingreso = limpiarDatos($_POST['fecha_ingreso']);
    if ($fecha_ingreso === "") {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Fecha de ingreso no enviada.',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 55000
                    }).then(() => {
                        location.assign('listatrabajadores.php');
                    });
            });
                </script>
                
        ";
    }elseif ($fecha_ingreso == "0000-00-00") {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Fecha de ingreso incorrecta.',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 55000
                    }).then(() => {
                        location.assign('listatrabajadores.php');
                    });
            });
                </script>
                
        ";
    }
    $sql = "INSERT INTO datos_del_entregante (nombre_del_beneficiario, tipo_documento, cedula, edad, Id_genero, fecha_de_nacimiento, id_area, id_cargo, nombre_del_representante, correo, telefono, estado, municipio, direccion, posee_discapacidad_o_condicion, descripcion_discapacidad_condicion,consejo_comunal, mesa_telecom, intitucion_entrega, institucion_estudia, responsable, fecha_ingreso, id_origen, descontinuado) VALUES ('$nombreInstitucion', '$tipoDocumento','$documento','$edad','$generoTrabajador','$fechaNac','$areaTrabajador','$cargoTrabajador','$nombreRepre', '$correoTrabajador','$telefonoTrabajador', '$estado', '$municipio', '$direccion', '$discapacidad', '$descripcionDisca', '$consejoComunal', '$mesaTelecomunicaciones','$institucionEntrega','$institucionEstudia','$responsableEntrega', '$fecha_ingreso','$origen', '$descontinuado')";

    $resultado = $mysqli->query($sql);

    if ($resultado) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El trabajador se registro correctamente',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 55000
              }).then(() => {
                location.assign('listatrabajadores.php');
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
                title: 'Algo salio mal. Intenta de nuevo',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 55000
              }).then(() => {
                location.assign('listatrabajadores.php');
             });
    });
        </script>";
    }





?>