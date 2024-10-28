const registrarReparacion = async()=>{
    document.getElementById('registroReparacion').onsubmit = function(e) {
        e.preventDefault();
    };
    var serialEntradaTarj = document.querySelector("#serial_entrada_tm").value;
    var serialSalidaTarj = document.querySelector("#serial_salida_tm").value;
    var pilaBios = document.querySelector("#pila_bios").value;
    var serialEntradaBat = document.querySelector("#serial_entrada_bat").value;
    var serialSalidaBat = document.querySelector("#serial_salida_bat").value;
    var serialEntradaTarjIOS = document.querySelector("#serial_entrada_tarj_aios").value;
    var serialSalidaTarjIOS = document.querySelector("#serial_salida_tarj_aios").value;
    var serialEntradaDiscoDuro = document.querySelector("#serial_entrada_disco_duro").value;
    var serialSalidaDiscoDuro = document.querySelector("#serial_salida_disco_duro").value;
    var serialEntradaCaraA = document.querySelector("#serial_entrada_cara_a").value;
    var serialSalidaCaraA = document.querySelector("#serial_salida_cara_a").value;
    var serialEntradaCaraB = document.querySelector("#serial_caraB").value;
    var serialEntradaCaraC = document.querySelector("#serial_caraC").value;
    var serialEntradaCaraD = document.querySelector("#serial_caraD").value;
    var serialEntradaMemoriaRam = document.querySelector("#serial_entrada_memoria_ram").value;
    var serialSalidaMemoriaRam = document.querySelector("#serial_salida_memoria_ram").value;
    var serialEntradaTeclado = document.querySelector("#serial_entrada_teclado").value;
    var serialSalidaTeclado= document.querySelector("#serial_salida_teclado").value;
    var serialEntradaCargador= document.querySelector("#serial_entrada_cargador").value;
    var serialSalidaCargador = document.querySelector("#serial_salida_cargador").value;
    var serialEntradaPantalla = document.querySelector("#serial_entrada_pantalla").value;
    var serialSalidaPantalla = document.querySelector("#serial_salida_pantalla").value;
    var serialEntradaTarjRed = document.querySelector("#serial_entrada_tarjeta_red").value;
    var serialSalidaTarjRed = document.querySelector("#serial_salida_tarjeta_red").value;
    var serialfanCooler = document.querySelector("#fan_cooler").value;
    var observaciones = document.querySelector("#observaciones").value;
    var responsableRecepcion = document.querySelector("#responsableRecepcion").value;
    var responsable = document.querySelector("#responsable").value;
    var estatus = document.querySelector("#id_status").value;
    var rol = document.querySelector("#id_roles").value;
    var idDispositivo = document.querySelector("#id_dispositivo").value;
    var tipoDeEquipo = document.querySelector("#tipo_de_dispositivo").value;
    var icDispositivo = document.querySelector("#ic_dispositivo").value;
    
    if (serialEntradaTarj === "" ||
        pilaBios === "" ||
        serialEntradaBat === "" ||
        serialEntradaTarjIOS === "" ||
        serialEntradaDiscoDuro === "" ||
        serialSalidaDiscoDuro === "" ||
        serialEntradaCaraA === "" ||
        serialSalidaCaraA === "" ||
        serialEntradaCaraB === "" ||
        serialEntradaCaraC === "" ||
        serialEntradaCaraD === "" ||
        serialEntradaMemoriaRam === "" ||
        serialSalidaMemoriaRam === "" ||
        serialEntradaTeclado === "" ||
        serialSalidaTeclado === "" ||
        serialEntradaCargador === "" ||
        serialSalidaCargador === "" ||
        serialEntradaPantalla === "" ||
        serialSalidaPantalla === "" ||
        serialEntradaTarjRed === "" ||
        serialSalidaTarjRed == "" ||
        serialfanCooler === "" ||
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
    if (!validarTarjetaMadre(serialEntradaTarj)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El valor ingresado en campo de serial de entrada (tarjeta madre) no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarTarjetaMadre(serialSalidaTarj)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El valor ingresado en campo de serial de salida (tarjeta madre) no cumple con los caracteres establecidos.",
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
    if (!validarTarjetaIOS(serialEntradaTarjIOS)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El valor ingresado en campo de serial de entrada (Tarjeta IOS) no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarTarjetaIOS(serialSalidaTarjIOS)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El valor ingresado en campo de serial de salida (Tarjeta IOS) no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarDiscoDuro(serialEntradaDiscoDuro)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El valor ingresado en campo de serial de entrada (Disco Duro) no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarDiscoDuro(serialSalidaDiscoDuro)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El valor ingresado en campo de serial de salida (Disco Duro) no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarSerialDeCaraA(serialEntradaCaraA)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El valor ingresado en campo de serial de entrada (Cara A) no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarSerialDeCaraA(serialSalidaCaraA)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El valor ingresado en campo de serial de salida (Cara A) no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarMemoriaRam(serialEntradaMemoriaRam)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El valor ingresado en campo de serial de entrada (Memoria Ram) no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarMemoriaRam(serialSalidaMemoriaRam)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El valor ingresado en campo de serial de salida (Memoria Ram) no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarTeclado(serialEntradaTeclado)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El valor ingresado en campo de serial de entrada (Teclado) no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarTeclado(serialSalidaTeclado)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El valor ingresado en campo de serial de salida (Teclado) no cumple con los caracteres establecidos.",
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
    if (!vailidarTarjetaRed(serialEntradaTarjRed)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El valor ingresado en campo de serial de entrada (Tarjeta Red) no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!vailidarTarjetaRed(serialEntradaTarjRed)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El valor ingresado en campo de serial de salida (Tarjeta Red) no cumple con los caracteres establecidos.",
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
    datos.append("serial_entrada_tm", serialEntradaTarj);
    datos.append("serial_salida_tm", serialSalidaTarj);
    datos.append("pila_bios", pilaBios);
    datos.append("serial_entrada_bat", serialEntradaBat);
    datos.append("serial_salida_bat", serialSalidaBat);
    datos.append("serial_entrada_tarj_ios", serialEntradaTarjIOS);
    datos.append("serial_salida_tarj_ios", serialSalidaTarjIOS);
    datos.append("serial_entrada_disco_duro", serialEntradaDiscoDuro);
    datos.append("serial_salida_disco_duro", serialSalidaDiscoDuro);
    datos.append("serial_entrada_cara_a", serialEntradaCaraA);
    datos.append("serial_salida_cara_a", serialSalidaCaraA);
    datos.append("cara_b", serialEntradaCaraB);
    datos.append("cara_c", serialEntradaCaraC);
    datos.append("cara_d", serialEntradaCaraD);
    datos.append("serial_entrada_memoria_ram", serialEntradaMemoriaRam);
    datos.append("serial_salida_memoria_ram", serialSalidaMemoriaRam);
    datos.append("serial_entrada_teclado", serialEntradaTeclado);
    datos.append("serial_salida_teclado", serialSalidaTeclado);
    datos.append("serial_entrada_cargador", serialEntradaCargador);
    datos.append("serial_salida_cargador", serialSalidaCargador);
    datos.append("serial_entrada_pantalla", serialEntradaPantalla);
    datos.append("serial_salida_pantalla", serialSalidaPantalla);
    datos.append("serial_entrada_tarjerta_red", serialEntradaTarjRed);
    datos.append("serial_salida_tarjeta_red", serialSalidaTarjRed);
    datos.append("fan_cooler", serialfanCooler);
    datos.append("observaciones", observaciones);
    datos.append("id_status", estatus);
    datos.append("responsable", responsable);
    datos.append("responsableRecepcion", responsableRecepcion);
    datos.append("id_roles", rol);
    datos.append("id_dispositivo", idDispositivo);
    datos.append("tipo_de_dispositivo", tipoDeEquipo);
    datos.append("ic_dispositivo", icDispositivo);
    // Envio al backend.
    var respuesta = await fetch("php/registro/registrarReparacion.php", {
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
        document.querySelector("#registroReparacion").reset();
        window.location.reload();
      }else{
        Swal.fire({
          icon: "error",
          title: "ERROR",
          text: resultado.mensaje,
        });
      }
}