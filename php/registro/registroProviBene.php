<?php
require "../../config/conexion.php";
require "../../function.php";

if ($_POST) {
    $nombre_del_beneficiario = limpiarDatos($_POST['nombre_del_beneficiario']);
    if (!preg_match("/^[a-zA-Z\s]{3,80}/", $nombre_del_beneficiario)) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'El nombre del beneficiario no cumple con los caracteres establecidos',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 55000
              }).then(() => {
                location.assign('../../listadebeneficiario.php');
              });
    });
        </script>";
    }

    $tipoDocumento = limpiarDatos($_POST['tipo_documento']);
    if ($tipoDocumento != 1) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Tipo de documento no valido',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 55000
              }).then(() => {
                location.assign('../../listadebeneficiario.php');
              });
    });
        </script>";
    }
    $cedula = limpiarDatos($_POST['documento']);
    if (!preg_match("/\b/", $cedula)) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Debe ingresar solo numeros.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 55000
              }).then(() => {
                location.assign('../../listadebeneficiario.php');
              });
    });
        </script>";
        if (!preg_match("/[0-9]{8}/", $cedula)) {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Los datos ingresados de la cedula no cumplen con los caracteres especificados.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 55000
                }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                });
        });
            </script>";
        }
    }
    $edad = limpiarDatos($_POST['edadBene']);
    if (!preg_match("/\b/", $edad)) {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Debe ingresar solo numeros en la edad.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 55000
                }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                });
        });
            </script>";
        if (!preg_match("/[0-9]{2}/", $edad)) {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Debe ingresar solo numeros en la edad.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 55000
                }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                });
        });
            </script>";
        }
    }
    
    $genero = limpiarDatos($_POST['genero']);
    if ($genero == "") {
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
                    location.assign('../../listadebeneficiario.php');
                });
        });
            </script>";
    }
    
    $fecha_nac = limpiarDatos($_POST['fecha_de_nacimiento']);
    if ($fecha_nac == "") {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Debe ingresar una fecha de nacimiento.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 55000
                }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                });
        });
            </script>";
    }

    $nombre_del_representante = limpiarDatos($_POST['nombre_del_representante']);
    if (!preg_match("/^[a-zA-Z\s]{3,80}/", $nombre_del_representante)) {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'El nombre del representante no cumple con los caracteres especificos.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 55000
                }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                });
        });
            </script>";
    }
    $correo = limpiarDatos($_POST['correoBene']);
    if (!preg_match("/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/", $correo)) {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'El correo no cumple con los caracteres necesarios.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 55000
                }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                });
        });
            </script>";
  }
    $telefono = limpiarDatos($_POST['phone']);
    if (!preg_match("/\b/", $telefono)) {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Debe ingresar solo numeros en el telefono.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 55000
                }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                });
        });
            </script>";
    }elseif (!preg_match("/[0-9]{11}/",$telefono)) {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Debe ingresar solo numeros en el telefono.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 55000
                }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                });
        });
            </script>";
    }
    $estado = limpiarDatos($_POST['estado']);
    if ($estado == "") {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Debe seleccionar un estado.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 55000
                }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                });
        });
            </script>";
    }
    $municipio = limpiarDatos($_POST['municipio']);
    if (!preg_match("/^[a-zA-Z\s]{10,60}/", $municipio)) {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Los datos ingresados en el campo de municipio no cumplen con los caracteres especificados..',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 55000
                }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                });
        });
            </script>";
    }
    $direccion = limpiarDatos($_POST['direccion']);
    if ($direccion == "") {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Los datos ingresados en el campo de direccion no cumplen con los caracteres especificados.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 55000
                }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                });
        });
            </script>";
    }
    $discapacidadCondicion = limpiarDatos($_POST['discapacidad_o_condicion']);
    if ($discapacidadCondicion == "") {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Debe marcar una opción.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 55000
                }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                });
        });
            </script>";
    }
    $descripcionDiscapacidadCondicion = limpiarDatos($_POST['descripcionDiscapacidad']);
    if ($descripcionDiscapacidadCondicion == "") {
       $descripcionDiscapacidadCondicion = "No posee";
    }
    $origen = limpiarDatos($_POST['origen']);
    if ($origen != 2 || $origen == "") {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'El origen no existe o fue modificado.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 55000
                }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                });
        });
            </script>";
    }
    $consejoComunal = limpiarDatos($_POST['consejo_comunal']);
    if ($consejoComunal == "") {
        $consejoComunal = "N/A";
    }elseif (!preg_match("/[a-zA-Z\s]{10,60}/", $consejoComunal)) {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Los datos ingresados en el campo de consejo comunal no cumplen con los caracteres especificados.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 55000
                }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                });
        });
            </script>";
    }
    $mesaTelecomunicaciones = limpiarDatos($_POST['mesa_telecomunicaciones']);
    if ($mesaTelecomunicaciones == "") {
        $mesaTelecomunicaciones = "N/A";
    }elseif (!preg_match("/[a-zA-Z\s]{10,60}/", $mesaTelecomunicaciones)) {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Los datos ingresados en el campo de consejo comunal no cumplen con los caracteres especificados.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 55000
                }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                });
        });
            </script>";
    }
    $institucionEntrega = limpiarDatos($_POST['institucion_entrega']);
    if ($institucionEntrega == "") {
        $institucionEntrega = "N/A";
    }elseif (!preg_match("/[a-zA-Z\s]{10,60}/", $institucionEntrega)) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Los datos ingresados en el campo de institución entrega no cumplen con los caracteres especificados.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 55000
            }).then(() => {
                location.assign('../../listadebeneficiario.php');
            });
    });
        </script>";
    }
    $institucionEstudia = limpiarDatos($_POST['institucion_estudia']);
    if ($institucionEstudia == "") {
        $institucionEstudia = "N/A";
    }elseif (!preg_match("/[a-zA-Z\s]{10,60}/", $institucionEstudia)) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Debe ingresar la institución.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 55000
            }).then(() => {
                location.assign('../../listadebeneficiario.php');
            });
    });
        </script>";
    }

    $responsableEntrega = limpiarDatos($_POST['responsable_entrega']);
    if (!preg_match("/[a-zA-Z\s]{5,60}/", $responsableEntrega)) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Los datos ingresados en el campo de responsable de entrega no cumplen con los caracteres especificados.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 55000
            }).then(() => {
                location.assign('../../listadebeneficiario.php');
            });
    });
        </script>";
    }
    //Datos complementarios
    $idarea = 1;
    $idcargo = 1;
    $conex = $mysqli;
    $descontinuado = 2;
    $fecha_ingreso = limpiarDatos($_POST['fecha_ingreso']);
    $sqlValidation = "SELECT cedula FROM datos_del_entregante WHERE cedula = '$cedula' AND descontinuado = 2";
    $resultadoValidation = $conex->query($sqlValidation);
    $n = $resultadoValidation->num_rows;

    if ($n == 0) {
        $sql = "INSERT INTO datos_del_entregante (nombre_del_beneficiario, tipo_documento, cedula, edad, Id_genero, fecha_de_nacimiento, id_area, id_cargo, nombre_del_representante, correo, telefono, estado, municipio, direccion, posee_discapacidad_o_condicion, descripcion_discapacidad_condicion, consejo_comunal, mesa_telecom, intitucion_entrega, institucion_estudia, responsable, fecha_ingreso, id_origen, descontinuado) VALUES ('$nombre_del_beneficiario', '$tipoDocumento', '$cedula', '$edad', '$genero', '$fecha_nac','$idarea','$idcargo','$nombre_del_representante','$correo','$telefono','$estado','$municipio','$direccion','$discapacidadCondicion','$descripcionDiscapacidadCondicion', '$consejoComunal', '$mesaTelecomunicaciones','$institucionEntrega','$institucionEstudia','$responsableEntrega', '$fecha_ingreso', '$origen', '$descontinuado');";
        
        if ($conex->query($sql)===true) {
            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Registro exitoso',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 35000
                    }).then(() => {
                        location.assign('../../listadebeneficiario.php');
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
                        title: 'Fallo al registar la institucion.',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 35000
                    }).then(() => {
                        location.assign('../../listadebeneficiario.php');
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
                        title: 'El beneficiario ya se encuentra registrado.',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 35000
                    }).then(() => {
                        location.assign('../../listadebeneficiario.php');
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
                        title: 'No se enviaron los datos',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 35000
                    }).then(() => {
                        location.assign('../../listadebeneficiario.php');
                    });
            });
                </script>";
    }


													