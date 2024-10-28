<?php
require "../../config/conexion.php";
require "../../function.php";

$valido['success']=array('success', false, 'mensaje'=>"");

if ($_POST) {
    $idEditDispo = limpiarDatos($_POST['idEditDispo']);
    if ($idEditDispo) {
        $valido['success']=false;
        $valido['mensaje']="Identificador de dispositivo no enviado.";
    }
    $tipoDeEquipo = limpiarDatos($_POST['tipo_de_equipo']);
    if ($tipoDeEquipo == "") {
        $valido['success']=false;
        $valido['mensaje']="Seleccione un tipo de equipo.";
    }   
    $serialEquipo = limpiarDatos($_POST['serial_del_equipo']);
    if (!preg_match("/[A-Z0-9]{18}/", $serialEquipo)) {
        $valido['success']=false;
        $valido['mensaje']="El serial del equipo no cumple con las caracteristicas establecidas.";
    }
    $serialCargador = limpiarDatos($_POST['serial_cargador']);
    if (!preg_match("/[A-Z0-9]{21}/", $serialCargador)) {
        $valido['success']=false;
        $valido['mensaje']="El serial del cargador no cumple con las caracteristicas establecidas.";
    }
    $fechaRecepcion = $_POST['fecha_de_recepcion'];
    if ($fechaRecepcion == "") {
        $valido['success']=false;
        $valido['mensaje']="Ingrese una fecha de recepcion.";
    }
    $estadoRecepcion = limpiarDatos($_POST['estado_recepcion']);
    if ($estadoRecepcion == "") {
        $valido['success']=false;
        $valido['mensaje']="Seleccione un estado de recepcion";
    }
    $observaciones_analista = limpiarDatos($_POST['observaciones']);
    if ($observaciones_analista == "") {
    $observaciones_analista = "No posee observaciones";
    }

    $rol = limpiarDatos($_POST['id_roles']);
    if ($rol == "") {
        $valido['success']=false;
        $valido['mensaje']="Rol no enviado";
    }
    $origen = limpiarDatos($_POST['origen']);
    if ($origen == "") {
        $valido['success']=false;
        $valido['mensaje']="Origen no enviado.";
    }
    $estatus = limpiarDatos($_POST['estatus']);
    if ($estatus == "") {
        $valido['success']=false;
        $valido['mensaje']="Estatus modificado.";
    }
    $falla = limpiarDatos($_POST['falla']);
    if ($falla == "") {
        $valido['success']=false;
        $valido['mensaje']="Seleccione una falla.";
    }
    $beneficiarioEdit = limpiarDatos($_POST['beneficiario']);
    if ($beneficiarioEdit == "") {
        $valido['success']=false;
        $valido['mensaje']="No se envia el benficiario.";
    }
        $fechaEntrega = "0000-00-00";
        $comprobacion = "Faltan comprobaciones";
        $observaciones_tecnico = "Falta por observaciones";
        $observaciones_verificador = "Falta por observaciones";
        $responsableTecnico = "aun no";
        $responsableVerficador = "aun no";
        $responsableAnalistaEntrega = "aun no";

        $sql = "UPDATE datos_del_dispotivo SET id_tipo_de_dispositivo='$tipoDeEquipo',serial_equipo='$serialEquipo',serial_de_cargador='$serialCargador',fecha_de_recepcion ='$fechaRecepcion',estado_recepcion_equipo ='$estadoRecepcion',observaciones_analista ='$observaciones_analista', id_roles ='$rol',id_origen ='$origen',id_estatus='$estatus',id_motivo='$falla',id_datos_del_beneficiario='$beneficiarioEdit' WHERE id_dispositivo = $idEditDispo AND id_datos_del_beneficiario = '$beneficiarioEdit'";

        if ($mysqli->query($sql)===true) {
            $valido['success']=true;
            $valido['mensaje']="Se actualizo el equipo.";
        }else {
            $valido['success']=false;
            $valido['mensaje']="Fallo al actualizar el equipo.";
        }
}else {
    $valido['success']=false;
    $valido['mensaje']="Fallo al enviar data.";
}

echo json_encode($valido);

?>