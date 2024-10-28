<?php

require "config/conexion.php";

$valido['success']=array('success', false, 'mensaje'=>"");


if ($_POST) {

    $usuario = $_POST['usuario'];
    if (!preg_match("/^[a-zA-Z]{4,30}/", $usuario || $usuario == "")) {
        $valido['success']=false;
        $valido['mensaje']="El usuario no cumple con los caracteres establecidos.";
    }
    
    $nombre = $_POST['nombre'];
    if (!preg_match("/^([A-ZÑa-zñáéíóúÁÉÍÓÚ'° ])+$/", $nombre || $nombre == "")) {
        $valido['success']=false;
        $valido['mensaje']="El nombre no cumple con los caracteres establecidos.";
    }
    $password = $_POST['password'];
    if (!preg_match("/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{12,16}$/", $password || $password == "")) {
        $valido['success']=false;
        $valido['mensaje']="La contraseña no cumple con los caracteres establecidos.";
    }
    $cedula = $_POST['cedula'];
    if (!preg_match("/\b/", $cedula || $cedula == "")) {
        $valido['success']=false;
        $valido['mensaje']="El usuario no cumple con los caracteres establecidos.";

        if (!preg_match("/^[0-9]{8}/", $cedula || $cedula == "")) {
            $valido['success']=false;
            $valido['mensaje']="El usuario no cumple con los caracteres establecidos.";
        }
    }
    $correo = $_POST['correo'];
    if (!preg_match("/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/", $correo || $correo == "")) {
        $valido['success']=false;
        $valido['mensaje']="El usuario no cumple con los caracteres establecidos.";
    }
    $perfil = $_POST['perfil'];
    if ($perfil == "") {
        $valido['success']=false;
        $valido['mensaje']="El usuario no cumple con los caracteres establecidos.";
    }
    
    $pass_c = sha1($password);
    $descontinuado = 2;
    $sql = "SELECT cedula FROM usuarios WHERE cedula = '$cedula'";
    $resultado = $mysqli->query($sql);
    $n = $resultado->num_rows;

    if ($n == 0) {
        $sql1 = "INSERT INTO usuarios (id_usuarios, usuario, nombre, cedula, password, correo, id_roles, descontinuado) VALUES (null, '$usuario', '$nombre', '$cedula', '$pass_c', '$correo', '$perfil', '$descontinuado')";
        if ($mysqli->query($sql1)===true) {
            $valido['success']=true;
            $valido['mensaje']="Registro exitoso";    
        }else {
            $valido['success']=false;
            $valido['mensaje']="Fallo el registro";
        }

    }else {
        $valido['success']=false;
        $valido['mensaje']="El correo esta en uso";    
    }

}else {
    $valido['success']=false;
    $valido['mensaje']="No se guardo correctamente";
}

echo json_encode($valido);
?>