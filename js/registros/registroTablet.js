const registrarReparacionTablet = async()=>{
    document.getElementById('registroReparacionTablet').onsubmit = function(e) {
        e.preventDefault();
    };
    var serialEntradaPantalla = document.querySelector("#serial_entrada_pantalla_tablet").value;
    var serialSalidaPantalla = document.querySelector("#serial_salida_pantalla_tablet").value;
    var pinCarga = document.querySelector("#pin_carga_tablet").value;
    var serialEntradaBat = document.querySelector("#serial_entrada_bat_tablet").value;
    var serialSalidaBat = document.querySelector("#serial_salida_bat_tablet").value;
    var serialEntradaCargador= document.querySelector("#serial_entrada_cargador_tablet").value;
    var serialSalidaCargador = document.querySelector("#serial_salida_cargador_tablet").value;
    var botonEncendido = document.querySelector("#boton_encendido_tablet").value;
    var observaciones = document.querySelector("#observaciones_tablet").value;
    var responsableRecepcion = document.querySelector("#responsableRecepcion_tablet").value;
    var responsable = document.querySelector("#responsable_tablet").value;
    var estatus = document.querySelector("#id_status_tablet").value;
    var rol = document.querySelector("#id_roles_tablet").value;
    var idDispositivo = document.querySelector("#id_dispositivo_tablet").value;
    var tipoDeEquipo = document.querySelector("#tipo_de_dispositivo_tablet").value;
    var icDispositivo = document.querySelector("#ic_dispositivo_tablet").value;
    
    if (
        serialEntradaPantalla === "" ||
        serialSalidaPantalla === "" ||
        pinCarga === "" ||
        serialEntradaBat === "" ||
        serialSalidaBat === "" ||
        serialEntradaCargador === "" ||
        serialSalidaCargador === "" ||
        botonEncendido === "" ||
        observaciones === "" ||
        responsableRecepcion === "" ||
        responsable === "" ||
        estatus === "" ||
        rol === "" ||
        idDispositivo === "" ||
        tipoDeEquipo === "" ||
        icDispositivo === "") {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Faltan Campos por completar",
              });
            return;
    }
   
    if (!validarBateria(serialEntradaBat)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El valor ingresado en campo de serial de entrada (bateria) no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarBateria(serialSalidaBat)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El valor ingresado en campo de serial de salida (bateria) no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarSerialCargador(serialEntradaCargador)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El valor ingresado en campo de serial de entrada (Cargador) no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarSerialCargador(serialSalidaCargador)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El valor ingresado en campo de serial de salida (Cargador) no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarPantalla(serialEntradaPantalla)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El valor ingresado en campo de serial de entrada (Pantalla) no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarPantalla(serialSalidaPantalla)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El valor ingresado en campo de serial de salida (Pantalla) no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarObservacion(observaciones)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El valor ingresado en campo de observaciones no cumple con los caracteres establecidos.",
          });
        return;
    }

    // 

    const datos = new FormData();
    datos.append("pin_carga", pinCarga);
    datos.append("boton_encendido", botonEncendido);
    datos.append("serial_entrada_bat", serialEntradaBat);
    datos.append("serial_salida_bat", serialSalidaBat);
    datos.append("serial_entrada_cargador", serialEntradaCargador);
    datos.append("serial_salida_cargador", serialSalidaCargador);
    datos.append("serial_entrada_pantalla", serialEntradaPantalla);
    datos.append("serial_salida_pantalla", serialSalidaPantalla);
    datos.append("observaciones", observaciones);
    datos.append("id_status", estatus);
    datos.append("responsable", responsable);
    datos.append("responsableRecepcion", responsableRecepcion);
    datos.append("id_roles", rol);
    datos.append("id_dispositivo", idDispositivo);
    datos.append("tipo_de_dispositivo", tipoDeEquipo);
    datos.append("ic_dispositivo", icDispositivo);
    // Envio al backend.
    var respuesta = await fetch("php/registro/registrarReparacionTablet.php", {
        method: 'POST',
        body: datos
      });
    var resultado=await respuesta.json();
    if (resultado.success == true) {
        Swal.fire({
          icon: "success",
          title: "EXITO",
          text: resultado.mensaje,
        });
        document.querySelector("#registroReparacionTablet").reset();
        window.location.reload();
      }else{
        Swal.fire({
          icon: "error",
          title: "ERROR",
          text: resultado.mensaje,
        });
      }
}