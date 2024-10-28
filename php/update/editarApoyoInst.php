<?php 
//Requerimos las funciones necesarias para evitar caracteres especiales.
require "../../function.php";
//Comprobamos que el envio del formulrio
if ($_POST) {
    //Obtenemos todos los valores necesarios enviados mediante el formulario
  $editapoyo = limpiarDatos($_POST['id_apoyo']); 
  if ($editapoyo == "") {
    echo "
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
      <script language='JavaScript'>
      document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
              icon: 'error',
              title: 'No envio el identificador',
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

  }
  $tipoDocumento = limpiarDatos($_POST['tipo_documento']);
    if ($tipoDocumento != 2 || $tipoDocumento == "") {
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
                location.assign('../../Listadeapoyo.php');
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
                location.assign('../../Listadeapoyo.php');
              });
    });
        </script>
        
        ";
        if (!preg_match("/[0-9]{9}/", $documento)) {
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
                        location.assign('../../Listadeapoyo.php');
                    });
            });
                </script>
                
        ";
        }
    }
    $nombreInstitucion = limpiarDatos($_POST['nombre_de_institucion']);
    if (!preg_match("/^[a-zA-Z\s]{3,80}/", $nombreInstitucion)) {
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
                        location.assign('../../Listadeapoyo.php');
                    });
            });
                </script>
                
        ";
    }
  $correo = limpiarDatos($_POST['correoApoyo']);
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
                    title: 'El telefono no cumple con el formato solicitado',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.assign('../../Listadeapoyo.php');
                });
        });
            </script>
            
    ";
    if (!preg_match("/[0-9]{11}/", $telefono)) {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'El telefono no cumple con la cantidad de digitos requerida',
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
}
  $estado = limpiarDatos($_POST['estado']);
  if ($estado == "") {
    echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Debe seleccionar un estado',
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
  $municipio = limpiarDatos($_POST['municipio']);
    if (!preg_match("/[a-zA-Z\s]{10,60}/", $municipio)) {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'El municipio no corresponde a los caracteres requeridos',
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
  $direccion = limpiarDatos($_POST['direccion']);
  if ($direccion == "") {
    echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Debe ingresar una direccion valida.',
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
  $origen = limpiarDatos($_POST['origen']);
  if ($origen != 1 || $origen == "") {
    echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'El origen fue modificado.',
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
    //Llamamos al archivo que continene la conexion
  require "../../config/conexion.php";
    //Realizamos nuestra consulta de actualizacion de datos
  $sql = "UPDATE datos_del_entregante SET nombre_del_beneficiario = '$nombreInstitucion', tipo_documento = '$tipoDocumento', cedula = '$documento',  correo = '$correo', telefono = '$telefono', estado = '$estado', municipio = '$municipio', direccion =  '$direccion', id_origen = '$origen' WHERE id_datos_del_entregante = $editapoyo ";
    //Guardamos su valor en una variable
  $resultado = $mysqli->query($sql);
    //Comprobamos que la consulta haya sido realizada y su respectiva respuesta positiva o negativa
  if ($resultado) {
    //Mensaje si la consulta resulta exitosa
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

            location.assign('../../Listadeapoyo.php');

          });
});
    </script>";
  }else {
    //Mensaje si la consulta resulta negativa
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script language='JavaScript'>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'El registro no fue actualizado ',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
          }).then(() => {

            location.assign('../../Listadeapoyo.php');

          });
});
    </script>";
  }




?>