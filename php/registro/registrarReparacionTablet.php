<?php
require "../../config/conexion.php";
require "../../function.php";

$valido['success']=array('success', false, 'mensaje'=>"");

if ($_POST) {
    $pinCarga = limpiarDatos($_POST['pin_carga']);
    if ($pinCarga == "") {
        $valido['success']=false;
        $valido['mensaje']="Debe realizar observaciones.";
    }
    $botonEncendido = limpiarDatos($_POST['boton_encendido']);
    if ($botonEncendido == "") {
        $valido['success']=false;
        $valido['mensaje']="Debe realizar observaciones.";
    }
    $serialBateriaEntrada = limpiarDatos($_POST['serial_entrada_bat']);
    if (!preg_match("/[A-Z0-9\s]{8,25}/", $serialBateriaEntrada)) {
        $valido['success']=false;
        $valido['mensaje']="El serial de entrada de la bateria no cumple con los caracteres establecidos.";
    }
    $serialBateriaSalida = limpiarDatos($_POST['serial_salida_bat']);
    if (!preg_match("/[A-Z0-9\s]{8,25}/", $serialBateriaSalida)) {
        $serialBateriaSalida = "N/A";
    }
    $serialEntradaCargador = limpiarDatos($_POST['serial_entrada_cargador']);
    if (!preg_match("/[A-Z0-9\s]{8,21}/", $serialEntradaCargador)) {
        $valido['success']=false;
        $valido['mensaje']="El serial de entrada de (Cargador) no cumple con los caracteres establecidos.";
    }
    $serialSalidaCargador = limpiarDatos($_POST['serial_salida_cargador']);
    if (!preg_match("/[A-Z0-9\s]{8,21}/", $serialSalidaCargador)) {
      $serialSalidaCargador = "N/A";
    }
    $serialEntradaPantalla = limpiarDatos($_POST['serial_entrada_pantalla']);
    if (!preg_match("/[A-Z0-9\s]{8,25}/", $serialEntradaPantalla)) {
        $valido['success']=false;
        $valido['mensaje']="El serial de entrada de (Pantalla) no cumple con los caracteres establecidos.";
    }
    $serialSalidaPantalla = limpiarDatos($_POST['serial_salida_pantalla']);
    if (!preg_match("/[A-Z0-9\s]{8,25}/", $serialSalidaPantalla)) {
      $serialSalidaPantalla = "N/A";  
    }
    $observacionT = limpiarDatos($_POST['observaciones']);
    if ($observacionT == "") {
        $valido['success']=false;
        $valido['mensaje']="Debe realizar observaciones.";
    }
    $estatus = limpiarDatos($_POST['id_status']);
    if ($estatus != 3) {
        $valido['success']=false;
        $valido['mensaje']="Estatus no enviado.";
    }
    $responsable = limpiarDatos($_POST['responsable']);
    if ($responsable == "") {
        $valido['success']=false;
        $valido['mensaje']="Responsable no enviado.";
    }
    $id_roles = limpiarDatos($_POST['id_roles']);
    if ($id_roles == "") {
        $valido['success']=false;
        $valido['mensaje']="Estatus no enviado.";
    }
    $idDispo = limpiarDatos($_POST['id_dispositivo']);
    if ($idDispo == "") {
        $valido['success']=false;
        $valido['mensaje']="Identificador de dispositivo no enviado.";
    }

    $id_tipo_de_dispositivo = limpiarDatos($_POST['tipo_de_dispositivo']);
    if ($id_tipo_de_dispositivo == "") {
        $valido['success']=false;
        $valido['mensaje']="Tipo de equipo no enviado.";
    }
    $responsableRecepcion = limpiarDatos($_POST['responsableRecepcion']);
    if ($responsableRecepcion=="") {
        $valido['success']=false;
        $valido['mensaje']="Responsable no enviado.";
    }
    $responsableTecnico = $responsableRecepcion;

    $ic_dispositivo = limpiarDatos($_POST['ic_dispositivo']);
    if ($ic_dispositivo == "") {
        $valido['success']=false;
        $valido['mensaje']="IC no enviado.";
    } 
    // Estandarizacion de envios.
    $serialTarjetaMadreEntrada = "N/A";
    $serialTarjetaMadreSalida = "N/A";
    $pilaBios = "N/A";
    $tarjetaIosEntrada = "N/A";
    $tarjetaIosSalida = "N/A";
    $serial_entrada_disco_duro = "N/A";
    $serial_salida_disco_duro = "N/A";
    $caraAserialEntrada = "N/A";
    $caraAserialSalida = "N/A";
    $cambio_cara_b = "N/A"; 
    $cambio_cara_c = "N/A";
    $cambio_cara_d = "N/A";
    $serialEntradaMemoriaRam = "N/A";
    $serialSalidaMemoriaRam = "N/A";
    $serialEntradaTeclado = "N/A";
    $serialSalidaTeclado = "N/A";
    $serialEntradaTarjetaRed = "N/A";
    $serialSalidaTarjetaRed = "N/A";
    $fanCooler = "N/A";

    $sqlValidation = "SELECT ic_dispositivo FROM reparacion WHERE ic_dispositivo = '$ic_dispositivo'";
    $resultadoValidation = $mysqli->query($sqlValidation);
    $n = $resultadoValidation->num_rows;

    if ($n == 0) {
        $sqlReparacion = "INSERT INTO reparacion (id_reparacion, ic_dispositivo, serial_entrada_tm, serial_salida_tm, cambio_pila_bios, serial_entrada_bat, serial_salida_bat, serial_entreda_tarj_ios, serial_salida_tarj_ios, serial_entreda_disco, serial_salida_disco, serial_entrada_cara_a, serial_entreda_cara_b, serial_entreda_cara_c, serial_entreda_cara_d,serial_salida_cara_a, serial_entrada_memoria_ram, serial_salida_memoria_ram, serial_entrada_teclado, serial_salida_teclado, serial_entrada_cargador, serial_salida_cargador, serial_entrada_pantalla, serial_salida_pantalla, serial_entrada_tarj_red, serial_salida_tarj_red, cambio_fan_cooler, id_status, id_dispositivo, id_tipo_de_dispositivo, responsable, pin_carga, boton_encendido) VALUES (NULL, '$ic_dispositivo', '$serialTarjetaMadreEntrada','$serialTarjetaMadreSalida', '$pilaBios', '$serialBateriaEntrada','$serialBateriaSalida','$tarjetaIosEntrada','$tarjetaIosSalida','$serial_entrada_disco_duro','$serial_salida_disco_duro','$caraAserialEntrada','$cambio_cara_b','$cambio_cara_c','$cambio_cara_d','$caraAserialSalida','$serialEntradaMemoriaRam','$serialSalidaMemoriaRam','$serialEntradaTeclado','$serialSalidaTeclado','$serialEntradaCargador','$serialSalidaCargador','$serialEntradaPantalla','$serialSalidaPantalla','$serialEntradaTarjetaRed','$serialSalidaTarjetaRed','$fanCooler','$estatus', '$idDispo', '$id_tipo_de_dispositivo', '$responsable', '$pinCarga', '$botonEncendido')";
        if ($mysqli->query($sqlReparacion)===true) {
            $sql = "UPDATE datos_del_dispotivo SET id_estatus = '$estatus',  observaciones_tecnico = '$observacionT', responsable = '$responsable', responsable_tecnico = '$responsableTecnico', coordinador = 6, id_roles = '$id_roles'  WHERE id_dispositivo = '$idDispo'"; 

            if ($mysqli->query($sql)=== true) {
                $valido['success']=true;
                $valido['mensaje']="El registro de reparacion se completo.";
            }else {
                $valido['success']=false;
                $valido['mensaje']="Registro de reparacion Fallo.";
            }
        }else {
            $valido['success']=false;
            $valido['mensaje']="Fallo de registro de reparacion.";
        }
    }else {
        $valido['success']=false;
        $valido['mensaje']="Reparacion ya realizada.";
    }

}else {
    $valido['success']=false;
    $valido['mensaje']="No se enviaron los datos.";
}

echo json_encode($valido);

?>