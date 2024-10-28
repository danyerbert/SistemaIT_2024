<?php
   require "../../config/conexion.php";
   require "../../function.php";
   
if ($_POST) {
    $idUpdate = $_POST['idEdit'];
    if (!preg_match("/\b/", $idUpdate)) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El identificador no se esta enviando.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
              }).then(() => {
                location.assign('../../listadeusuario.php');
              });
    });
        </script>";
    }
    $usuarioupdate = limpiarDatos(htmlspecialchars($_POST['usuario']));
    
    if (!preg_match("/^[a-zA-Z]{4,30}/", $usuarioupdate || $usuarioupdate == "")) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El usuario no cumple con los caracteres establecidos.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
              }).then(() => {
                location.assign('../../listadeusuario.php');
              });
    });
        </script>";
    }
    
    $nombreupdate = limpiarDatos(htmlspecialchars($_POST['nombre']));
    if (!preg_match("/^([A-ZÑa-zñáéíóúÁÉÍÓÚ'° ])+$/", $nombreupdate || $nombreupdate == "")) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El usuario no cumple con los caracteres establecidos.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
              }).then(() => {
                location.assign('../../listadeusuario.php');
              });
    });
        </script>";
    }
    $cedulaupdate = limpiarDatos(htmlspecialchars($_POST['cedula']));
    if (!preg_match("/\b/", $cedulaupdate || $cedulaupdate == "")) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'La cedula debe ser un dato numerico.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
              }).then(() => {
                location.assign('../../listadeusuario.php');
              });
    });
        </script>";
        if (!preg_match("/^[0-9]{8}/", $cedulaupdate || $cedulaupdate == "")) {
            echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Ingrese la cedula en solo numeros.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
              }).then(() => {
                location.assign('../../listadeusuario.php');
              });
    });
        </script>";
        }
    }
    $correoupdate = limpiarDatos(htmlspecialchars($_POST['correo']));
    if (!preg_match("/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/", $correoupdate || $correoupdate == "")) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Ingrese un correo valido.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
              }).then(() => {
                location.assign('../../listadeusuario.php');
              });
    });
        </script>";
    }
    $rolesupdate = limpiarDatos(htmlspecialchars($_POST['perfil']));
    if ($rolesupdate == "") {
        # code...
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El rol no se esta enviando.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
              }).then(() => {
                location.assign('../../listadeusuario.php');
              });
    });
        </script>";
    }

    $password = limpiarDatos($_POST['password']);
    if ($password == "") {
        $sqlPassword = "SELECT password FROM usuarios WHERE id_usuarios = '$idUpdate'";
        $resultadoPassword = $mysqli->query($sqlPassword);
        
        foreach ($resultadoPassword as $rowPassword) {
            $passwordDB = $rowPassword['password'];
        }
        $sql = "UPDATE usuarios SET usuario = '$usuarioupdate', nombre = '$nombreupdate',  cedula = '$cedulaupdate', password = '$passwordDB', correo = '$correoupdate', id_roles = '$rolesupdate' WHERE id_usuarios = " . $idUpdate;
    }else {
      $password_cd = sha1($password);
      $sql = "UPDATE usuarios SET usuario = '$usuarioupdate', nombre = '$nombreupdate',  cedula = '$cedulaupdate', password = '$password_cd', correo = '$correoupdate', id_roles = '$rolesupdate' WHERE id_usuarios = " . $idUpdate;
    }

   

   $result = mysqli_query($mysqli, $sql);

    if ($result) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El registro fue actualizado correctamente',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
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
                title: 'Algo salio mal. Intenta de nuevo',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
              }).then(() => {
                location.assign('../../listadeusuario.php');
              });
    });
        </script>";
    }
}



?>