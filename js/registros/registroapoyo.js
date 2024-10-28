const registroApoyo = async() => {
    var tipo_documento = document.querySelector("#tipo_documentoApoyo").value;
    var rif = document.querySelector("#documentoApoyo").value;
    var nombreInstitucion = document.querySelector("#nombre_de_institucionApoyo").value;
    var correo = document.querySelector("#correoApoyo").value;
    var telefono = document.querySelector("#phoneApoyo").value;
    var estado = document.querySelector("#estadoApoyo").value;
    var municipio = document.querySelector("#municipioApoyo").value;
    var direccion = document.querySelector("#direccionApoyo").value;
    var origen = document.querySelector("#origenApoyo").value;

    if (tipo_documento.trim() === ''||
        rif.trim() === '' ||
        nombreInstitucion.trim() === '' ||
        correo.trim() === '' ||
        telefono.trim() === '' ||
        estado.trim() === '' ||
        municipio.trim() === '' ||
        direccion.trim() === '' ||
        origen.trim() === '') {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Faltan Campos por completar",
              });
            return;
    }
    if (!validarTipoDeDocumento(tipo_documento)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El tipo de documento no cumple con los caracteres.",
          });
        return;
    }
    if (!validarRIF(rif)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El RIF no cumple con la cantidad de digitos necesarios. (Recuerde que debe ingresarse sin '-')",
          });
        return;
    }
    if (!validarInstitucion(nombreInstitucion)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El nombre de la institucion no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarcorreo(correo)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El correo no cumple con el formato establecido.",
          });
        return;
    }
    if (!validarTelefono(telefono)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El telefono no cumple con los caracteres permitidos. Ejemplo: 02123453456",
          });
        return;
    }
    if (!validarMunicipio(municipio)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El municipio no cumple con los caracteres solicitados.",
          });
        return;
    }
    if (!validarDireccion(direccion)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "La dirección ingresada no cumple con los caracteres solicitados.",
          });
        return;
    }

    // Envio de datos al backend
    const datos = new FormData();
    datos.append("tipo_documento", tipo_documento);
    datos.append("documento", rif);
    datos.append("nombre_de_institucion", nombreInstitucion);
    datos.append("correoApoyo", correo);
    datos.append("phone", telefono);
    datos.append("estado", estado);
    datos.append("municipio", municipio);
    datos.append("direccion", direccion);
    datos.append("origen", origen);

    var respuesta = await fetch("php/registro/registroApoyoInst.php", {
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
        document.querySelector("#formularioApoyoRegistro").reset();
        window.location.reload();
      }else{
        Swal.fire({
          icon: "error",
          title: "ERROR",
          text: resultado.mensaje,
        });
      }
}