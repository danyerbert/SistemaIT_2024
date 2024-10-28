<?php
require "../../config/conexion.php";
require "../../function.php";
if ($_POST) {
    $tipoDocumento = limpiarDatos($_POST['tipo_documentoApoyo']);
    if ($tipoDocumento != 2) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Tipo de documento no valido.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
              }).then(() => {
                location.assign('../../Listadeapoyo.php');
              });
    });
        </script>";
    }
    $documento = limpiarDatos($_POST['documentoApoyo']);
    if (!preg_match("/\b/",$documento)) {
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
                timer: 35000
              }).then(() => {
                location.assign('../../Listadeapoyo.php');
              });
    });
        </script>";
        if (!preg_match("/[0-9]{9}/", $documento)) {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Los datos ingresados no cumplen con los caracteres especificados.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 35000
                  }).then(() => {
                    location.assign('../../Listadeapoyo.php');
                  });
        });
            </script>";
        }
    }
    $nombreInstitucion = limpiarDatos($_POST['nombre_de_institucionApoyo']);
    if (!preg_match("/^[a-zA-Z\s]{3,80}/", $nombreInstitucion)) {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'El nombre de la institucion no cumple con los caracteres especificados.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 35000
                  }).then(() => {
                    location.assign('../../Listadeapoyo.php');
                  });
        });
            </script>";
    }
    $correoInsti = limpiarDatos($_POST['correoApoyo']);
    if (!preg_match("/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/", $correoInsti)) {
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
                    location.assign('../../Listadeapoyo.php');
                  });
        });
            </script>";
    }
    $telefonoInsti = limpiarDatos($_POST['phoneApoyo']);
    if (!preg_match("/\b/", $telefonoInsti)) {
        $valido['success']=false;
        $valido['mensaje']="El telefono no cumple con el formato establecido.";
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'El telefono no cumple con el formato establecido.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 35000
                  }).then(() => {
                    location.assign('../../Listadeapoyo.php');
                  });
        });
            </script>";
        if (!preg_match("/[0-9]{11}/", $telefonoInsti)) {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'El telefono no cumple con el formato establecido.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 35000
                  }).then(() => {
                    location.assign('../../Listadeapoyo.php');
                  });
        });
            </script>";
        }
    }
    $estadoInsti = limpiarDatos($_POST['estadoApoyo']);
    if ($estadoInsti == "") {
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
                    timer: 35000
                  }).then(() => {
                    location.assign('../../Listadeapoyo.php');
                  });
        });
            </script>";
    }
    $municipio = limpiarDatos($_POST['municipioApoyo']);
    if (!preg_match("/[a-zA-Z\s]{10,60}/", $municipio)) {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'El municipio no cumple con los caracteres establecidos.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 35000
                  }).then(() => {
                    location.assign('../../Listadeapoyo.php');
                  });
        });
            </script>";
    }
    $direccionInsti = limpiarDatos($_POST['direccionApoyo']);
    if ($direccionInsti == "") {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'La direccion ingresada no cumple con los caracteres establecidos.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 35000
                  }).then(() => {
                    location.assign('../../Listadeapoyo.php');
                  });
        });
            </script>";
    }
    $origen = limpiarDatos($_POST['origenApoyo']);
    if ($origen == "") {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'No se envia el origen del beneficiario..',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 35000
                  }).then(() => {
                    location.assign('../../Listadeapoyo.php');
                  });
        });
            </script>";
    }

    //Datos complementarios para el registro
    $edad = 0;
    $id_genero = 1;
    $fechaNac = limpiarDatos($_POST['fecha_ingreso']);
    $id_area = 1;
    $id_cargo = 1;
    $nombreRepre = limpiarDatos($_POST['nombre_de_institucionApoyo']);
    $discapacidad = "no";
    $descripcionDis = "no posee";
    $consejoComunal = "no posee";
    $mesaTelecomunicaciones = "No posee";
    $institucionEntrega = "No posee";
    $institucionEstudia = "no posee";
    $responsableEntrega = "No posee";
    $descontinuado = 2;
    $fecha_ingreso = limpiarDatos($_POST['fecha_ingreso']);
    // Validacion de rif por si se repite la institucion a registrar

    $sqlValidation = "SELECT cedula FROM datos_del_entregante WHERE cedula = '$documento'";
    $resultadoValidation = $mysqli->query($sqlValidation);
    $n = $resultadoValidation->num_rows;
    
    if ($n == 0) {
        $sql = "INSERT INTO datos_del_entregante (nombre_del_beneficiario, tipo_documento, cedula, edad, Id_genero, fecha_de_nacimiento, id_area, id_cargo,  nombre_del_representante, correo, telefono, estado, municipio, direccion, posee_discapacidad_o_condicion, descripcion_discapacidad_condicion,consejo_comunal, mesa_telecom, intitucion_entrega, institucion_estudia, responsable, fecha_ingreso, id_origen, descontinuado) VALUES ('$nombreInstitucion', '$tipoDocumento', '$documento', '$edad', '$id_genero', '$fechaNac', '$id_area', '$id_cargo','$nombreRepre', '$correoInsti', '$telefonoInsti', '$estadoInsti', '$municipio', '$direccionInsti', '$discapacidad', '$descripcionDis', '$consejoComunal', '$mesaTelecomunicaciones','$institucionEntrega','$institucionEstudia','$responsableEntrega', '$fecha_ingreso','$origen', '$descontinuado')";
        if ($mysqli->query($sql)===true) {  
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Registro exitoso.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 35000
                  }).then(() => {
                    location.assign('../../Listadeapoyo.php');
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
                    location.assign('../../Listadeapoyo.php');
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
                    title: 'La institucion ya se encuentra registrada.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 35000
                  }).then(() => {
                    location.assign('../../Listadeapoyo.php');
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
                    title: 'No se enviaron los datos.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 35000
                  }).then(() => {
                    location.assign('../../Listadeapoyo.php');
                  });
        });
            </script>"; 
}
?>