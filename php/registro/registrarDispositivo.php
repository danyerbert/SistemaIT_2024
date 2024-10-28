<?php
require "../../config/conexion.php";
require "../../function.php";

$valido['success']=array('success', false, 'mensaje'=>"");

if ($_POST) {
    $tipoDeEquipo = limpiarDatos($_POST['tipo_de_equipo']);
    if ($tipoDeEquipo == "") {
        $valido['success']=false;
        $valido['mensaje']="Seleccione un tipo de equipo.";
    }   
    $serialEquipo = limpiarDatos($_POST['serial_del_equipo']);
    if (!preg_match("/[A-Z0-9]{18}/", $serialEquipo)) {
        $valido['success']=false;
        $valido['mensaje']="El serial del equipo no cumple con las caracteristicas establecidas.";
    }elseif (!preg_match("[/#@+-&/]", $serialEquipo)) {
        $valido['success']=false;
        $valido['mensaje']="No se admiten caracteres especiales en el campo de serial del equipo.";
    }
    $serialCargador = limpiarDatos($_POST['serial_cargador']);
    if (!preg_match("/[A-Z0-9]{21}/", $serialCargador)) {
        $valido['success']=false;
        $valido['mensaje']="El serial del cargador no cumple con las caracteristicas establecidas.";
    }elseif (!preg_match("[/#@+-&/]", $serialCargador)) {
        $valido['success']=false;
        $valido['mensaje']="No se admiten caracteres especial en el campo de serial del cargador.";
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
    $beneficiario = limpiarDatos($_POST['beneficiario']);
    if ($beneficiario == "") {
        $valido['success']=false;
        $valido['mensaje']="Beneficario no enviado.";
    }
    $responsable = limpiarDatos($_POST['responsable']);
    if ($responsable == "") {
        $valido['success']=false;
        $valido['mensaje']="Responsable no enviado.";
    }
    $motivoIngreso = limpiarDatos($_POST['motivo_ingreso']);
    if ($motivoIngreso == "") {
        $valido['success']=false;
        $valido['mensaje']="Seleccione un motivo de ingreso";
    }
    $responsableRecepcion = limpiarDatos($_POST['responsableRecepcion']);
    if ($responsableRecepcion=="") {
        $valido['success']=false;
        $valido['mensaje']="Responsable no enviado.";
    }
    //Generacion de IC para el registro del dispositivo
    $datos = "SELECT MAX(id_dispositivo) AS id_dispositivo FROM datos_del_dispotivo";
    $resultado=mysqli_query($mysqli,$datos);
    while ($row = mysqli_fetch_assoc($resultado)) {
        $valor1 = $row['id_dispositivo'];
            $contadordb = 0;
            for ($i=0; $i <= $valor1 ; $i++) { 
                if ($valor1 == 0) {
                    $contadordb = 1;
                }else {
                    $contadordb++;
                }
            }
            $ic =  date("Y", strtotime($fechaRecepcion)) . "-". $contadordb ;
    }

        $coordinador = limpiarDatos($_POST['coordinador']);
        $fechaEntrega = "0000-00-00";
        $comprobacion = "Faltan comprobaciones";
        $observaciones_tecnico = "Falta por observaciones";
        $observaciones_verificador = "Falta por observaciones";
        $responsableAnalistaRecibido = $responsableRecepcion;
        $responsableTecnico = "aun no";
        $responsableVerficador = "aun no";
        $responsableAnalistaEntrega = "aun no";
        $observacionesAnalistaEntrega = "aun no";
        $descontinuado = 2;

        $sql = "INSERT INTO datos_del_dispotivo (id_dispositivo, ic_dispositivo, id_tipo_de_dispositivo, serial_equipo, serial_de_cargador, fecha_de_recepcion, estado_recepcion_equipo, fecha_de_entrega, responsable, responsable_analista_recibido, responsable_tecnico, responsable_verificador, responsable_analista_entrega, observaciones_analista, observaciones_tecnico, observaciones_verificador, observaciones_analista_entrega, comprobaciones, motivo_de_ingreso, coordinador, id_roles, id_origen, id_estatus, id_motivo, id_datos_del_beneficiario, descontinuado) VALUES (NULL, '$ic','$tipoDeEquipo','$serialEquipo','$serialCargador','$fechaRecepcion','$estadoRecepcion', '$fechaEntrega', '$responsable','$responsableAnalistaRecibido','$responsableTecnico','$responsableVerficador','$responsableAnalistaEntrega','$observaciones_analista', '$observaciones_tecnico', '$observaciones_verificador', '$observacionesAnalistaEntrega', '$comprobacion', '$motivoIngreso','$coordinador','$rol','$origen','$estatus', '$falla','$beneficiario' , '$descontinuado')";
        $resultado = mysqli_query($mysqli, $sql);

if ($resultado) {
            $comprobacionIc = "SELECT MAX(ic_dispositivo) AS ic_dispositivo FROM datos_del_dispotivo";
            $resultadoCompobacion = $mysqli->query($comprobacionIc);

            if ($resultadoCompobacion) {
                while ($row2 = $resultadoCompobacion->fetch_assoc()) {
                    $icMuestra = $row2['ic_dispositivo'];
                }
                $valido['success']=true;
                $valido['mensaje']="El IC del equipo es: " . $icMuestra;
    }   
        }else {
            $valido['success']=false;
            $valido['mensaje']="Fallo al ingresar el equipo.";
        }
    
}else {
    $valido['success']=false;
        $valido['mensaje']="Data no enviada.";
}

echo json_encode($valido);

    ?>