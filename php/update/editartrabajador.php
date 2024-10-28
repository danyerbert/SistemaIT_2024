<?php
//Requerimos las funciones necesarias para evitar caracteres especiales.
require "../../function.php";
//Comprobamos que el envio del formulrio
if ($_POST) {
    //Obtenemos todos los valores necesarios enviados mediante el formulario
    $editTrabajador = limpiarDatos($_POST['id_trabajador']);
    if ($editTrabajador == "") {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'El identificador esta vacio',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
              }).then(() => {

                location.assign('../../listatrabajadores.php');

              });
    });
        </script>
        
        ";
    }
    $tipoDocumento = limpiarDatos($_POST['tipo_documento']);
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
                confirmButtonText: 'OK'
              }).then(() => {

                location.assign('../../listatrabajadores.php');

              });
    });
        </script>
        
        ";
    }
    $documento = limpiarDatos($_POST['documento']);
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
                confirmButtonText: 'OK'
              }).then(() => {

                location.assign('../../listatrabajadores.php');

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
                        confirmButtonText: 'OK'
                    }).then(() => {

                        location.assign('../../listatrabajadores.php');

                    });
            });
                </script>
                
        ";
        }
    }
    $nombre = limpiarDatos($_POST['nombre_del_trabajador']);
    if (!preg_match("/^[a-zA-Z\s]{3,80}/", $nombre)) {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'El nombre de la institucion no cumple con el formato solicitado',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {

                        location.assign('../../listatrabajadores.php');

                    });
            });
                </script>
                
        ";
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
                        confirmButtonText: 'OK'
                    }).then(() => {

                        location.assign('../../listatrabajadores.php');

                    });
            });
                </script>
                
        ";
    }
    $idarea = limpiarDatos($_POST['area']);
    if ($idarea == "") {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Debe seleccionar un area',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {

                        location.assign('../../listatrabajadores.php');

                    });
            });
                </script>
                
        ";
    }
    $idcargo = limpiarDatos($_POST['cargo']);
    if ($idcargo == "") {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Debe seleccionar un cargo',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {

                        location.assign('../../listatrabajadores.php');

                    });
            });
                </script>
                
        ";
    }
    $correo = limpiarDatos($_POST['correoTrabajador']);
    if (!preg_match("/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/", $correo)) {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'El correo no cumple con el formato solicitado',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.assign('../../Listadeapoyo.php');
                    });
            });
                </script>
                
        ";
    }
    $telefono = limpiarDatos($_POST['phone']);
    if (!preg_match("/\b/", $telefono)) {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'El telefono debe ser de solo digitos.',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {

                        location.assign('../../listatrabajadores.php');

                    });
            });
                </script>
                
        ";
    }elseif (!preg_match("/[0-9]{11}/", $telefono)) {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'El telefono no cumple con los caracteres necesarios.',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {

                        location.assign('../../listatrabajadores.php');

                    });
            });
                </script>
                
        ";
    }
    $estado = limpiarDatos($_POST['estado']);
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
                        confirmButtonText: 'OK'
                    }).then(() => {

                        location.assign('../../listatrabajadores.php');

                    });
            });
                </script>
                
        ";
    }
    $municipio = limpiarDatos($_POST['municipio']);
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
                        confirmButtonText: 'OK'
                    }).then(() => {

                        location.assign('../../listatrabajadores.php');

                    });
            });
                </script>
                
        ";
    }
    $discapacidad = limpiarDatos($_POST['discapacidad_o_condicion']);
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
                        confirmButtonText: 'OK'
                    }).then(() => {

                        location.assign('../../listatrabajadores.php');

                    });
            });
                </script>
                
        ";
    }
    $descripDisca = limpiarDatos($_POST['descripcion_discapacidad']);
    if ($descripDisca == "") {
        $descripDisca = "No posee discapacidad";
    }
    $direccion = limpiarDatos($_POST['direccion']); 
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
                        confirmButtonText: 'OK'
                    }).then(() => {

                        location.assign('../../listatrabajadores.php');

                    });
            });
                </script>
                
        ";
    }
    $origen = limpiarDatos($_POST['origen']);
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
                        confirmButtonText: 'OK'
                    }).then(() => {

                        location.assign('../../listatrabajadores.php');

                    });
            });
                </script>
                
        ";
    }

    //Llamamos al archivo que continene la conexion
    require "../../config/conexion.php";
    //Realizamos la consulta requerida
    $sql = "UPDATE datos_del_entregante SET nombre_del_beneficiario = '$nombre', tipo_documento = '$tipoDocumento', cedula = '$documento', Id_genero = '$genero', id_area = '$idarea', id_cargo = '$idcargo', correo = '$correo', telefono = '$telefono', estado = '$estado', municipio = '$municipio', direccion = '$direccion', posee_discapacidad_o_condicion = '$discapacidad', descripcion_discapacidad_condicion = '$descripDisca', id_origen = '$origen' WHERE id_datos_del_entregante = '$editTrabajador' ";

    //Obtenemos la respuesta de la consulta
    $resultado = $mysqli->query($sql);

    //Validamos la respuesta de la consulta, si es positivo o negativa
    if ($resultado) {
        //Mensaje si la consulta es Positiva
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El registro fue actualizado correctamente',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
              }).then(() => {

                location.assign('../../listatrabajadores.php');

              });
    });
        </script>";
    }else {
        //Mensaje si la respuesta es negativa
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Algo salio mal. Intenta de nuevo',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
              }).then(() => {

                location.assign('../../listatrabajadores.php');

             });
    });
        </script>";
    }

    }
    

?>