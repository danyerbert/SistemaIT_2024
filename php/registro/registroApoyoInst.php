<?php
require "../../config/conexion.php";
require "../../function.php";

$valido['success']=array('success', false, 'mensaje'=>"");


if ($_POST) {
    $tipoDocumento = limpiarDatos($_POST['tipo_documentoApoyo']);
    if ($tipoDocumento != 2) {
        $valido['success']=false;
        $valido['mensaje']="Tipo de documento no valido.";
    }
    $documento = limpiarDatos($_POST['documentoApoyo']);
    if (!preg_match("/\b/",$documento)) {
        $valido['success']=false;
        $valido['mensaje']="Debe ingresar solo numeros.";
        if (!preg_match("/[0-9]{9}/", $documento)) {
            $valido['success']=false;
            $valido['mensaje']="Los datos ingresados no cumplen con los caracteres especificados.";
        }
    }
    $nombreInstitucion = limpiarDatos($_POST['nombre_de_institucionApoyo']);
    if (!preg_match("/^[a-zA-Z\s]{3,80}/", $nombreInstitucion)) {
        $valido['success']=false;
        $valido['mensaje']="El nombre de la institucion no cumple con los caracteres especificados.";
    }
    $correoInsti = limpiarDatos($_POST['correoApoyo']);
    if (!preg_match("/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/", $correoInsti)) {
        $valido['success']=false;
        $valido['mensaje']="El correo no cumple con los caracteres necesarios.";
    }
    $telefonoInsti = limpiarDatos($_POST['phoneApoyo']);
    if (!preg_match("/\b/", $telefonoInsti)) {
        $valido['success']=false;
        $valido['mensaje']="El telefono no cumple con el formato establecido.";
        if (!preg_match("/[0-9]{11}/", $telefonoInsti)) {
            $valido['success']=false;
            $valido['mensaje']="El telefono no cumple con el formato establecido.";
        }
    }
    $estadoInsti = limpiarDatos($_POST['estadoApoyo']);
    if ($estadoInsti == "") {
        $valido['success']=false;
        $valido['mensaje']="Debe seleccionar un estado.";
    }
    $municipio = limpiarDatos($_POST['municipioApoyo']);
    if (!preg_match("/[a-zA-Z\s]{10,60}/", $municipio)) {
        $valido['success']=false;
        $valido['mensaje']="El municipio no cumple con los caracteres establecidos.";
    }
    $direccionInsti = limpiarDatos($_POST['direccionApoyo']);
    if ($direccionInsti == "") {
        $valido['success']=false;
        $valido['mensaje']="La direccion ingresada no cumple con los caracteres establecidos.";
    }
    $origen = limpiarDatos($_POST['origenApoyo']);
    if ($origen == "") {
        $valido['success']=false;
        $valido['mensaje']="No se envia el origen del beneficiario.";
    }

    //Datos complementarios para el registro
    $edad = 0;
    $id_genero = 1;
    $fechaNac = date('00-00-0000');
    $id_area = 1;
    $id_cargo = 1;
    $nombreRepre = limpiarDatos($_POST['nombre_de_institucion']);
    $discapacidad = "no";
    $descripcionDis = "no posee";
    $consejoComunal = "no posee";
    $mesaTelecomunicaciones = "No posee";
    $institucionEntrega = "No posee";
    $institucionEstudia = "no posee";
    $responsableEntrega = "No posee";
    $descontinuado = 2;
    // Validacion de rif por si se repite la institucion a registrar

    $sqlValidation = "SELECT cedula FROM datos_del_entregante WHERE cedula = '$documento'";
    $resultadoValidation = $mysqli->query($sqlValidation);
    $n = $resultadoValidation->num_rows;
    
    if ($n == 0) {
        $sql = "INSERT INTO datos_del_entregante (nombre_del_beneficiario, tipo_documento, cedula, edad, Id_genero, fecha_de_nacimiento, id_area, id_cargo,  nombre_del_representante, correo, telefono, estado, municipio, direccion, posee_discapacidad_o_condicion, descripcion_discapacidad_condicion,consejo_comunal, mesa_telecom, intitucion_entrega, institucion_estudia, responsable, id_origen, descontinuado) VALUES ('$nombreInstitucion', '$tipoDocumento', '$documento', '$edad', '$id_genero', '$fechaNac', '$id_area', '$id_cargo','$nombreRepre', '$correoInsti', '$telefonoInsti', '$estadoInsti', '$municipio', '$direccionInsti', '$discapacidad', '$descripcionDis', '$consejoComunal', '$mesaTelecomunicaciones','$institucionEntrega','$institucionEstudia','$responsableEntrega','$origen', '$descontinuado')";
        if ($mysqli->query($sql)===true) {
            $valido['success']=true;
            $valido['mensaje']="Registro exitoso";  
        }else {
            $valido['success']=false;
            $valido['mensaje']="Fallo al registar la institucion.";  
        }
    }else {
        $valido['success']=false;
        $valido['mensaje']="La institucion ya se encuentra registrada.";
    }
   
}else {
    $valido['success']=false;
    $valido['mensaje']="No se enviaron los datos";
}

echo json_encode($valido);



?>