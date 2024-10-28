<?php

require "../../config/conexion.php";
require "../../function.php";


if ($_POST) {
    $nombre = $_POST['nombre'];
    if (!preg_match("/^([A-ZÑa-zñáéíóúÁÉÍÓÚ'° ])+$/", $nombre)) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'El nombre no cumple con los caracteres establecidos.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
              }).then(() => {
                location.assign('../../listadeusuario.php');
              });
    });
        </script>";
    }
    $apellido = limpiarDatos($_POST['apellido']);
    if (!preg_match("/^([A-ZÑa-zñáéíóúÁÉÍÓÚ'° ])+$/", $apellido)) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'El apellido del beneficiario no cumple con los caracteres establecidos',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
              }).then(() => {
                location.assign('../../listadeusuario.php');
              });
    });
        </script>";
    }
    $cedula = $_POST['cedula'];
    if (!preg_match("/\b/", $cedula)) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Introduzca solo numeros en la cedula',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
              }).then(() => {
                location.assign('../../listadeusuario.php');
              });
    });
        </script>";

        if (!preg_match("/^[0-9]{8}/", $cedula || $cedula == "")) {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Introduzca solo numeros en la cedula',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 35000
                  }).then(() => {
                    location.assign('../../listadeusuario.php');
                  });
        });
            </script>";
        }
    }
    $correo = limpiarDatos($_POST['correo']);
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
                timer: 35000
              }).then(() => {
                location.assign('../../listadeusuario.php');
              });
    });
        </script>";
    }
    $perfil = $_POST['perfil'];
    if ($perfil == "") {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Seleccione un perfil.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
              }).then(() => {
                location.assign('../../listadeusuario.php');
              });
    });
        </script>";
    }
    //Generación automatica de usuarios
    //Convertimos en minuscula la cadena de caracteres
    $mNombre = strtolower($nombre);
    $mApellido = strtolower($apellido);
    //Extraemos el primer caracter del nombre
    $pNombre = substr($mNombre, 0, 1);
    //Generamos el usuario con la primera letra del nombre + el apellido
    $usuario = $pNombre . $mApellido;
    //Generar Password 
    $pMnombre = substr($nombre, 0, 1);
    $password = $pMnombre . $mApellido . "#" . $cedula;
    //Codigo PHP de registro de Usuario
    $pass_c = sha1($password);
    $descontinuado = 2;

    $sql = "SELECT cedula FROM usuarios WHERE cedula = '$cedula'";
    $resultado = $mysqli->query($sql);
    $n = $resultado->num_rows;

    if ($n == 0) {
        $sql1 = "INSERT INTO usuarios (id_usuarios, usuario, nombre, cedula, password, correo, id_roles, descontinuado) VALUES (null, '$usuario', '$nombre', '$cedula', '$pass_c', '$correo', '$perfil', '$descontinuado')";
        if ($mysqli->query($sql1)===true) {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Registro completado',
                    html: 'Usuario: ".$usuario." Contraseña: ".$password." ', 
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 55000
                  }).then(() => {
                    location.assign('../../listadeusuario.php');
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
                    title: 'Error al general Usuario.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 55000
                  }).then(() => {
                    location.assign('../../listadeusuario.php');
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
                title: 'Usuario ya registrado.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 55000
              }).then(() => {
                location.assign('../../listadeusuario.php');
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
            title: 'Datos no enviados.',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 55000
          }).then(() => {
            location.assign('../../listadeusuario.php');
          });
});
    </script>";
}

?>