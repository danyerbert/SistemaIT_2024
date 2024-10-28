const registrarDispositivo = async () =>{
    document.getElementById('registroDispositivo').onsubmit = function(e) {
        e.preventDefault();
    };
    var tipoDeEquipo = document.querySelector("#tipo_De_equipo").value;
    var serialEquipo = document.getElementById("serial_del_equipo").value;
    var serialCargador = document.getElementById("serial_cargador").value;
    var fechaRecepcion = document.querySelector("#fecha_de_recepcion").value;
    var EstadoRecepcion = document.querySelector("#estado_recepcion").value;
    var fallaDelEquipo = document.querySelector("#falla").value;
    var observaciones = document.querySelector("#observaciones").value;
    var motivoIngreso = document.querySelector("#motivoIngreso").value;
    var origen = document.querySelector("#origen").value;
    var rol = document.querySelector("#id_roles").value;
    var estatus = document.querySelector("#estatus").value;
    var beneficiario = document.querySelector("#beneficiario").value;
    var responsable = document.querySelector("#responsable").value;
    var coordinador = document.querySelector("#coordinador").value;
    var responsableRecepcion = document.querySelector("#responsableRecepcion").value;
    // Validacion de campos vacios
    if (tipoDeEquipo.trim() === "" ||
    serialEquipo.trim() === "" ||    
    serialCargador.trim() === "" ||
    fechaRecepcion.trim() === "" ||
    EstadoRecepcion.trim() === "" ||
    fallaDelEquipo.trim() === ""  ||
    observaciones.trim() === "" ||
    motivoIngreso.trim() === "" ||
    origen.trim() === "" ||
    rol.trim() === ""  ||
    estatus.trim() === "" ||
    beneficiario.trim() === "" ||
    responsable.trim() === "" ||
    coordinador.trim() === "" ||
    responsableRecepcion.trim() === ""
        ) {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Faltan Campos por completar",
              });
            return;
    }
    if (!validarSerialEquipo(serialEquipo)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El serial del equipo no cumple con las caracteristicas establecidas.",
          });
        return;
    }
    if (!validarSerialCargador(serialCargador)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El serial del cargador no cumple con las caracteristicas establecidas.",
          });
        return;
    }
    if (!validarObservacion(observaciones)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Debe ingresar alguna observacion.",
          });
        return;
    }

    // Envio al backend 
    
    const datos = new FormData();
    datos.append("tipo_de_equipo", tipoDeEquipo);
    datos.append("serial_del_equipo", serialEquipo);
    datos.append("serial_cargador", serialCargador);
    datos.append("fecha_de_recepcion", fechaRecepcion);
    datos.append("estado_recepcion", EstadoRecepcion);
    datos.append("observaciones", observaciones);
    datos.append("id_roles", rol);
    datos.append("origen", origen);
    datos.append("estatus", estatus);
    datos.append("falla", fallaDelEquipo);
    datos.append("beneficiario", beneficiario);
    datos.append("responsable", responsable);
    datos.append("motivo_ingreso", motivoIngreso);
    datos.append("coordinador", coordinador);
    datos.append("responsableRecepcion", responsableRecepcion);
    var respuesta = await fetch("php/registro/registrarDispositivo.php", {
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
        document.querySelector("#registroDispositivo").reset();
        window.location.reload();
      }else{
        Swal.fire({
          icon: "error",
          title: "ERROR",
          text: resultado.mensaje,
        });
      }
}

console.log("Enlace de dispositivo");