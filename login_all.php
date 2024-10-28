<?php
require "config/conexion.php";
require "function.php";
session_start();

//  Verificacion para el inicio de sesion.
if ($_POST) {
    $usuario = limpiarDatos($_POST['usuario']);
    if (!preg_match("/[a-zA-Z0-9]{4,30}/", $usuario)) {
        echo  "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'El nombre de usuario no cumple con las caracteristicas establecidas.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 55000
              }).then(() => {
                location.assign('index.php');
              });
            });
        </script>";
    }
    $password = limpiarDatos($_POST['password']);
    if (!preg_match("/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,25}$/", $password)) {
        # code...
        echo  "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Las caracteristicas no cumplen con el formato preestablecido.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 55000
              }).then(() => {
                location.assign('index.php');
              });
            });
        </script>";
    }

    $sql = "SELECT id_usuarios, password, usuario, id_roles, cedula, nombre FROM usuarios WHERE usuario='$usuario' AND descontinuado = 2 ";
    $resultado = $mysqli->query($sql);

    $num = $resultado->num_rows;

    if ($num > 0) {
        $row = $resultado->fetch_assoc();
        $password_bd = $row['password'];
        $pass_c = sha1($password);
        if ($password_bd == $pass_c) {
            $_SESSION['id_usuarios'] = $row['id_usuarios'];
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['id_roles'] = $row['id_roles'];
            //Creación de la sessión para manipular la información a mostrar en el registro historico.
            $_SESSION['full_identificacion'] = 'C.I: '.$row['cedula'].', USUARIO: '.$row['usuario'].', NOMBRE: '.$row['nombre'];
        //    Comprobación de inicion de sesión y roles
            if (isset($_SESSION['id_roles'])) {
                switch ($_SESSION['id_roles']) {
                   case 1:
                        header("Location: admin.php");
                        break;
                    case 2:
                        header("Location: presidencia.php");
                        break;
                    case 3:
                        header("Location: analista.php");
                        break;
                    case 4:
                        header("Location: tecnico.php");
                        break;
                    case 5:
                        header("Location: verificador.php");
                        break;
                    case 6:
                            header("Location: coordinador.php");
                            break;
                    case 7:
                            header("Location: superadmin.php");
                        break;
                    default:
                           echo  "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Rol no existente',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 55000
              }).then(() => {
                location.assign('index.php');
              });
    });
        </script>";
                        break;
                }
            }
        } else {
            // Envia un mensaje de alerta por si el password no coincide
             echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'La contraseña no coincide',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 55000
                      }).then(() => {
                        location.assign('index.php');
                      });
            });
                </script>";
        }
    } else {
        // Envia un mensaje de alerta por si el usuario no coincide no coincide
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'El usuario no coincide',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 55000
                      }).then(() => {
                        location.assign('index.php');
                      });
            });
                </script>";
    }
}
?>