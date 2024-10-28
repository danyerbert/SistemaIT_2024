const RegistroBeneficiario = async ()=>{
    var tipo_documento = document.querySelector("#tipo_documento").value;
    var cedula = document.querySelector("#documento").value;
    var nombreBene = document.querySelector("#nombre_del_beneficiario").value;
    var edadBene = document.querySelector("#edadBene").value;
    var genero = document.querySelector("#genero").value;
    var fechaDeNacimiento = document.querySelector("#fecha_de_nacimiento").value;
    var nombreDelRepresentante = document.querySelector("#nombre_del_representante").value;
    var correoBene = document.querySelector("#correoBene").value;
    var phone = document.querySelector("#phone").value;
    var estado = document.querySelector("#estado").value;
    var municipio = document.querySelector("#municipio").value;
    var direccion = document.querySelector("#direccion").value;
    var discapacidadOCondicion = document.querySelector("#discapacidad_o_condicion").value;
    var descripcionDiscapacidad = document.querySelector("#descripcionDiscapacidad").value;
    var consejoComunal = document.querySelector("#consejo_comunal").value;
    var mesaTelecomunicaciones = document.querySelector("#mesa_telecomunicaciones").value;
    var institucionEntrega = document.querySelector("#institucion_entrega").value;
    var institucionEstudia = document.querySelector("#institucion_estudia").value;
    var responsableEntrega = document.querySelector("#responsable_entrega").value;
    var origen = document.querySelector("#origen").value;

    if (tipo_documento.trim() === ''||
        cedula.trim() === '' ||
        nombreBene.trim() === '' ||
        edadBene.trim() === '' ||
        genero.trim() === '' ||
        fechaDeNacimiento.trim() === '' ||
        nombreDelRepresentante.trim() === '' ||
        correoBene.trim() === '' ||
        phone.trim() === '' ||
        estado.trim() === '' ||
        municipio.trim() === '' ||
        direccion.trim() === '' ||
        discapacidadOCondicion.trim() === '' ||
        consejoComunal.trim() === '' ||
        mesaTelecomunicaciones.trim() === '' ||
        institucionEntrega.trim() === '' ||
        institucionEstudia.trim() === '' ||
        responsableEntrega.trim() === '' ||
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
    if (!validarcedula(cedula)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "La cedula no cumple con la cantidad de digitos necesarios. (Recuerde que debe ingresarse sin '.')",
          });
        return;
    }
    if (!validarnombre(nombreBene)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El nombre no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarEdadBene(edadBene)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Ingrese solo numeros en la edad.",
          });
        return;
    }
    if (!validarnombre(nombreDelRepresentante)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El nombre del representante no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarcorreo(correoBene)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El correo ingreso no cumple con los caracteres especificados.",
          });
        return;
    }
    if (!validarTelefono(phone)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Ingrese el numero de telefono de la siguiente forma: (02123456765). Sin '-' o '.'",
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
    if (discapacidadOCondicion === '') {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Debe marcar alguna opción.",
          });
        return;
    }
    if (!validarConsejoComunal(consejoComunal)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El campo no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarMesaTelecomunicaciones(mesaTelecomunicaciones)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El campo de mesa de telecomunicaciones no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarInstitucionEducativa(institucionEntrega)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El campo de institucion de entrega, no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarInstitucionEducativa(institucionEstudia)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El campo de institucion donde estudia, no cumple con los caracteres establecidos.",
          });
        return;
    }
    if (!validarResponsableEntrega(responsableEntrega)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El campo de responsable de entrega, no cumple con los caracteres establecidos.",
          });
        return;
    }

    // Envio de datos al backend 
    const datos = new FormData();
    datos.append("tipo_documento", tipo_documento);
    datos.append("documento", cedula);
    datos.append("nombre_del_beneficiario", nombreBene);
    datos.append("edadBene", edadBene);
    datos.append("genero", genero);
    datos.append("fecha_de_nacimiento", fechaDeNacimiento);
    datos.append("nombre_del_representante", nombreDelRepresentante);
    datos.append("correoBene", correoBene);
    datos.append("phone", phone);
    datos.append("estado", estado);
    datos.append("municipio", municipio);
    datos.append("direccion", direccion);
    datos.append("discapacidad_o_condicion", discapacidadOCondicion);
    datos.append("descripcionDiscapacidad", descripcionDiscapacidad);
    datos.append("consejo_comunal", consejoComunal);
    datos.append("mesa_telecomunicaciones", mesaTelecomunicaciones);
    datos.append("institucion_entrega", institucionEntrega);
    datos.append("institucion_estudia", institucionEstudia);
    datos.append("responsable_entrega", responsableEntrega);
    datos.append("origen", origen);
    var respuesta = await fetch("php/registro/registrobene.php", {
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
        document.querySelector("#RegistroBeneficiario").reset();
        window.location.reload();
      }else{
        Swal.fire({
          icon: "error",
          title: "ERROR",
          text: resultado.mensaje,
        });
      }
}

console.log("Archivo conectado. ");