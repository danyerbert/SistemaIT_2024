<?php
require "../../function.php";

if ($_POST) {
    $idEditBene = $_POST['ideditbene'];
    if ($idEditBene == "") {
      echo "
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
      <script language='JavaScript'>
      document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
              icon: 'error',
              title: 'El identificador no se esta enviando',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'OK'
            }).then(() => {

              location.assign('../../listadebeneficiario.php');

            });
  });
      </script>";
    }
    $nombreBeneEdit = limpiarDatos($_POST['nombre_del_beneficiario_edit']);
    if (!preg_match("/^[a-zA-Z\s]{3,80}/", $nombreBeneEdit)) {
      echo "
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
      <script language='JavaScript'>
      document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
              icon: 'error',
              title: 'El nombre del beneficiario no coincide con el formato solicitado',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'OK'
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
                title: 'Debe ingresar la cedula en solo digitos.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
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
                    title: 'La cedula no cumple con el formato deseado.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                  }).then(() => {

                    location.assign('../../listadebeneficiario.php');

                  });
        });
            </script>";
        }
    }
    $edadBeneEdit = limpiarDatos($_POST['edadBeneEdit']);
    if (!preg_match("/\b/", $edadBeneEdit)) {
      echo "
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
      <script language='JavaScript'>
      document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
              icon: 'error',
              title: 'La edad debe de ser un digito.',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'OK'
            }).then(() => {

              location.assign('../../listadebeneficiario.php');

            });
  });
      </script>";
      if (!preg_match("/[0-9]{2}/", $edadBeneEdit)) {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'La edad no cumple el formato solicitado',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
              }).then(() => {

                location.assign('../../listadebeneficiario.php');

              });
    });
        </script>";
      }
  }
    $generoEdit = limpiarDatos($_POST['genero']);
    if ($generoEdit == "") {
      echo "
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
          <script language='JavaScript'>
          document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                  icon: 'error',
                  title: 'Seleccione el genero',
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'OK'
                }).then(() => {
                  location.assign('../../listadebeneficiario.php');
                });
      });
          </script>";
    }
    $fechadenacimientoEdit = limpiarDatos($_POST['fecha_de_nacimiento']);
    if ($fechadenacimientoEdit == "") {
      echo "
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
          <script language='JavaScript'>
          document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                  icon: 'error',
                  title: ' Ingrese fecha de Nacimiento',
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'OK'
                }).then(() => {
                  location.assign('../../listadebeneficiario.php');
                });
      });
          </script>";
    }
    $nombreRepreBeneEdit = limpiarDatos($_POST['nombre_del_representanteEdit']);
    if (!preg_match("/^[a-zA-Z\s]{3,80}/", $nombreRepreBeneEdit)) {
      echo "
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
      <script language='JavaScript'>
      document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
              icon: 'error',
              title: 'El nombre del representante no cumple con el formato solicitado',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'OK'
            }).then(() => {

              location.assign('../../listadebeneficiario.php');

            });
  });
      </script>";
  }
    $correoEdit = limpiarDatos($_POST['correoBeneEdit']);
    if (!preg_match("/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/", $correoEdit)) {
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
    $telefonoEdit = limpiarDatos($_POST['phoneEdit']);
    if (!preg_match("/\b/", $telefonoEdit)) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'El telefono debe ser solo digitos.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
              }).then(() => {

                location.assign('../../listadebeneficiario.php');

              });
    });
        </script>";
    }elseif (!preg_match("/[0-9]{11}/",$telefonoEdit)) {
      echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'El telefono cumple con los caracteres requeridos',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
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
                title: 'Ingrese el Estado',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
              }).then(() => {

                location.assign('../../listadebeneficiario.php');

              });
    });
        </script>";
    }
    $municipioEdit = limpiarDatos($_POST['municipio']);
    if (!preg_match("/^[a-zA-Z\s]{10,60}/", $municipioEdit)) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Ingrese el municipio',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
              }).then(() => {

                location.assign('../../listadebeneficiario.php');

              });
    });
        </script>";
    }
    $direccionEdit = limpiarDatos($_POST['direccion']);
    if ($direccionEdit == "") {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Ingrese la direccion',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
              }).then(() => {

                location.assign('../../listadebeneficiario.php');

              });
    });
        </script>";
    }
    $poseeDiscaEdit = limpiarDatos($_POST['discapacidad_o_condicion']);
    if ($poseeDiscaEdit == "") {
      echo "
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
      <script language='JavaScript'>
      document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
              icon: 'error',
              title: 'Seleccione SI o NO',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'OK'
            }).then(() => {

              location.assign('../../listadebeneficiario.php');

            });
  });
      </script>";
  }
    $descripcionDisEdit = limpiarDatos($_POST['descripcion_discapacidad']);
    if ($descripcionDisEdit == "") {
      $descripcionDisEdit = "No posee";
   }
    $origenEdit = limpiarDatos($_POST['origen']);
    if ($origenEdit != 2 || $origenEdit == "") {
      echo "
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
      <script language='JavaScript'>
      document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
              icon: 'error',
              title: 'Ingrese el origen',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'OK'
            }).then(() => {

              location.assign('../../listadebeneficiario.php');

            });
  });
      </script>";
  }
     //Datos complementarios 
    $idarea = 1;
    $idcargo = 1;

    require "../../config/conexion.php";
    $sql = "UPDATE datos_del_entregante SET  nombre_del_beneficiario = '$nombreBeneEdit', cedula = '$cedula', edad = '$edadBeneEdit', Id_genero = '$generoEdit', fecha_de_nacimiento = '$fechadenacimientoEdit', id_area = '$idarea', id_cargo = '$idcargo', nombre_del_representante = '$nombreRepreBeneEdit', correo = '$correoEdit', telefono = '$telefonoEdit', estado = '$estado', municipio = '$municipioEdit', direccion = '$direccionEdit', posee_discapacidad_o_condicion = '$poseeDiscaEdit',descripcion_discapacidad_condicion = '$descripcionDisEdit', id_origen = '$origenEdit' WHERE id_datos_del_entregante = $idEditBene";

    //echo $sql;
    $resultado = mysqli_query($mysqli, $sql);

    if ($resultado) {
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
                title: 'Algo salio mal. Intenta de nuevo',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
              }).then(() => {
                location.assign('../../listadebeneficiario.php');
              });
    });
        </script>";
    }
}





?>