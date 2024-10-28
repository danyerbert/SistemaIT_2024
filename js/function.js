// FUNCIONES PARA REGISTRAR EL USUARIO Y VALIDAR LOS DATOS QUE SE INGRESAN


// Validacion de correo con los caracteres solicitados.
const validarcorreo=(correo)=>{    
    return /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(correo.trim());
}
// Validacion de contraseña de 12 - 16 caracteres, al menos 1 digito, al menos 1 minuscula y al menos 1 mayuscula
const validarpassword=(password)=>{
    // return /^([a-zA-Z0-9]{8,16})/.test(password.trim());
    return /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{12,16}$/.test(password.trim());
}
// Validacion de nombre, que comprende solo letras, y con espacio para que pueda escribir el apellido
const validarnombre = (nombre)=>{
    // return /^([a-zA-Z\s]{2,60})/.test(nombre.trim());
    return /^([A-ZÑa-zñáéíóúÁÉÍÓÚ'° ])+$/.test(nombre.trim());
}
// Validacion de usuario, que comprende solo letras, (Estructura por definir)
const validarusuario = (usuario) =>{
    return /^([a-zA-Z]{4,30})/.test(usuario.trim());
}
// Validacion de cedula, que comprende los 8 digitos que tiene la cedula
const validarcedula = (cedula) =>{
    return /^[0-9]{8}/.test(cedula.trim());
}


// FUNCIONES PARA VALIDAR EL REGISTRO DE BENEFICIARIOS Y LOS VALORES QUE INGRESAN

// FUNCIONES DE REGISTRO DE APOYO INSTITUCIONAL
// 
const validarTipoDeDocumento = (tipo_documento) =>{
    return /\b/.test(tipo_documento.trim())
}
// Validacion de cedula, que comprende los 8 digitos que tiene la cedula
const validarRIF = (rif) =>{
    return /^[0-9]{9}/.test(rif.trim());
}

// Validacion de nombre, que comprende solo letras, y con espacio para que pueda escribir el apellido
const validarInstitucion = (institucion)=>{
    return /^([A-ZÑa-zñáéíóúÁÉÍÓÚ'° ])+$/.test(institucion.trim());
}

// Validacion de nombre, que comprende solo letras, y con espacio para que pueda escribir el apellido
const validarMunicipio = (municipio)=>{
    return /^([A-ZÑa-zñáéíóúÁÉÍÓÚ'° ])+$/.test(municipio.trim());
}

// Validacion de nombre, que comprende solo letras, y con espacio para que pueda escribir el apellido
const validarDireccion = (direccion)=>{
    return /^[a-zA-Z\s]{4,60}/.test(direccion.trim());
}

const validarTelefono = (telefono)=>{
    return /^[0-9]{10,11}/.test(telefono.trim());
}

// FUNCIONES DE VALIDACION PARA EL REGISTRO DEL BENEFICIARIO
// 

// Validar nombre de representante
const validarRepresentante = (representante)=>{
    return /^([A-ZÑa-zñáéíóúÁÉÍÓÚ'° ])+$/.test(representante.trim());
}

// Validar Edad del beneficiario
const validarEdadBene = (edadBene) =>{
    return /^[0-9]/.test(edadBene.trim());
}

// Validar entrada de datos del consejo comunal
const validarConsejoComunal = (consejoComunal)=>{
    return /^[a-zA-Z\s]{4,60}/.test(consejoComunal.trim());
}
// Validar entrada de datos de la mesa de telecomunicaciones
const validarMesaTelecomunicaciones = (mesaTelecomunicaciones)=>{
    return /^[a-zA-Z\s]{4,60}/.test(mesaTelecomunicaciones.trim());
}
// Validar entrada de datos de institucion educativa, tanto como la entrada y estudia actualmente
const validarInstitucionEducativa = (institucionEducativa)=>{
    return /^[a-zA-Z\s]{4,60}/.test(institucionEducativa.trim());
}
// Validar entrada de datos de responsable de entrega
const validarResponsableEntrega = (responsableEntrega)=>{
    return /^[a-zA-Z\s]{4,60}/.test(responsableEntrega.trim());
}



// FUNCIONES DE VALIDACION PARA EL REGISTRO DEL DISPOSITIVO
// 

// FUNCION DE VALIDACIÓN DE SERIAL DEL EQUIPO

const validarSerialEquipo = (serialEquipo)=>{
    return /[A-Za-z0-9\s]{8,18}/.test(serialEquipo.trim());
}


// FUNCION DE VALIDACIÓN DE SERIAL DEL CARGADOR
const validarSerialCargador = (serialCargador)=>{
    return /[A-Za-z0-9\s]{8,21}/.test(serialCargador.trim());
}

// Validacion de nombre, que comprende solo letras, y con espacio para que pueda escribir el apellido
const validarObservacion = (observacion)=>{
    return /^[a-zA-Z\s]{4,60}/.test(observacion.trim());
}




// FUNCIONES DE VALIDACION PARA EL REGISTRO DEL DISPOSITIVO EN REPARACION
// 

// VALIDACION DE TARJETA MADRE
const validarTarjetaMadre = (tarjetaMadre) => {
    return /[A-Za-z0-9\s]{8,30}/.test(tarjetaMadre.trim());
}

// VALIDACION DE BATERIA
const validarBateria = (bateria) => {
    return /[A-Za-z0-9\s]{8,25}/.test(bateria.trim());
}

// VALIDACION DE TARJETA IOS
const validarTarjetaIOS = (tarjetaIOS) => {
    return /[A-Za-z0-9\s]{8,25}/.test(tarjetaIOS.trim());
}

// VALIDACION DE DISCO DURO

const validarDiscoDuro = (discoDuro) =>{
    return /[A-Za-z0-9\s]{8,15}/.test(discoDuro.trim());
}


// VALIDAR SERIAL DE CARA A

const validarSerialDeCaraA = (serialCaraA) =>{
    return /[A-Za-z0-9\s]{8,18}/.test(serialCaraA.trim());
}

// VALIDAR MEMORIA RAM

const validarMemoriaRam = (memoriaRam) =>{
    return /[A-Za-z0-9\s]{8,15}/.test(memoriaRam.trim());
}

// VALIDAR TECLADO 

const validarTeclado = (teclado) =>{
    return /[A-Za-z0-9\s]{8,22}/.test(teclado.trim());
} 

// VALIDAR PANTALLA

const validarPantalla = (pantalla) =>{
    return /[A-Za-z0-9\s]{8,25}/.test(pantalla.trim());
}

// VALIDAR TARJETA DE RED

const vailidarTarjetaRed = (tarjetaRed) =>{
    return /[A-Za-z0-9\s]{8,18}/.test(tarjetaRed.trim());
}