<?php
require "../function.php";
require "../config/conexion.php";

if ($_GET) {
    $rol = limpiarDatos($_GET['r']);
    if (!preg_match("/\b/", $rol)) {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Rol no valido.',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 35000
                    }).then(() => {
                        location.assign('404.php');
                    });
            });
                </script>";
    } else {
        switch ($rol) {
            case 1:
                $ruta = "../admin.php";
                break;
            case 2:
                $ruta = "../presidencia.php";
                break;
            case 3:
                $ruta = "../analista.php";
                break;
            case 4:
                $ruta = "../tecnico.php";
                break;
            case 5:
                $ruta = "../verificador.php";
                break;
            case 6:
                $ruta = "../coordinador.php";
                break;
            case 7:
                $ruta = "../superadmin.php";
                break;
            default:
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Rol no valido.',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 35000
                    }).then(() => {
                        location.assign('404.php');
                    });
            });
                </script>";
                break;
        }
    }
    $primeraFecha = limpiarDatos($_GET['fd']);
    if ($primeraFecha == "") {
        header("location: $ruta");
    }elseif ($primeraFecha == "0000-00-00") {
        header("location: $ruta");
    }
    $segundaFecha = limpiarDatos($_GET['fh']);
    if ($segundaFecha == "") {
        header("location: $ruta");
    }elseif ($segundaFecha == "0000-00-00") {
        header("location: $ruta");
    }
    $beneficiario = limpiarDatos($_GET['orb']);
    if (!preg_match("/\b/", $beneficiario)) {
        header("location: $ruta");
    }elseif (!preg_match("/[0-9]{1}/", $beneficiario)) {
        header("location: $ruta");
    }
    switch ($beneficiario) {
        case 1:
            require "plantillaapoyo.php";
                    $sql = "SELECT e.id_datos_del_entregante, e.nombre_del_beneficiario, d.tipo_documento, e.cedula, e.nombre_del_representante, e.correo, e.telefono, e.municipio, e.direccion, e.fecha_ingreso, o.origen, v.estado_nombre FROM datos_del_entregante AS e 
                    INNER JOIN origen AS o ON o.id_origen = e.id_origen
                    INNER JOIN estados_venezuela AS v ON v.id_estados = e.estado
                    INNER JOIN tipo_documento AS d ON d.id_documento = e.tipo_documento WHERE e.fecha_ingreso BETWEEN '$primeraFecha' AND '$segundaFecha' AND e.id_origen = '$beneficiario' ";
                    $resultado = $mysqli->query($sql);
                    $pdf = new PDF("L", "mm", array(300,440));
                    $pdf->AliasNbPages();
                    $pdf->AddPage();
                    $pdf->SetFont("Arial", "B", 12);
                    $pdf->Cell(50, 5,"Instituciones", 1, 0, "C");
                    $pdf->Cell(20, 5,"T.D", 1, 0, "C");
                    $pdf->Cell(30, 5,"Documento", 1, 0, "C");
                    $pdf->Cell(50, 5,"Correo", 1, 0, "C");
                    $pdf->Cell(30, 5,"Telefono", 1, 0, "C");
                    $pdf->Cell(30, 5,"Estado", 1, 0, "C");
                    $pdf->Cell(30, 5,"Municipio", 1, 0, "C");
                    $pdf->Cell(90, 5,"Direccion", 1, 0, "C");
                    $pdf->Cell(50, 5,"Origen", 1, 1, "C");
                    $pdf->SetFont("Arial", "", 9);
                    while ($row = $resultado->fetch_assoc()) {
                    $pdf->Cell(50, 5,utf8_decode($row['nombre_del_beneficiario']), 1, 0, "C");
                    $pdf->Cell(20, 5,$row['tipo_documento'], 1, 0, "C");
                    $pdf->Cell(30, 5,$row['cedula'], 1, 0, "C");
                    $pdf->Cell(50, 5,$row['correo'], 1, 0, "C");
                    $pdf->Cell(30, 5,$row['telefono'], 1, 0, "C");
                    $pdf->Cell(30, 5,$row['estado_nombre'], 1, 0, "C");
                    $pdf->Cell(30, 5,$row['municipio'], 1, 0, "C");
                    $pdf->Cell(90, 5,$row['direccion'], 1, 0, "C");
                    $pdf->Cell(50, 5,$row['origen'], 1, 1, "C");
                    }
                    $pdf-> Output();
            break;
            case 2:
                require "plantillabeneficiario.php";
                $sql = "SELECT e.nombre_del_beneficiario, e.cedula, e.edad, e.fecha_de_nacimiento,e.nombre_del_representante, e.correo, e.telefono, e.municipio, e.direccion, e.posee_discapacidad_o_condicion, e.descripcion_discapacidad_condicion, g.genero, a.nombre_del_area, c.tipo_de_cargo, o.origen, v.estado_nombre FROM datos_del_entregante AS e 
                INNER JOIN genero AS g ON  g.id_genero=e.id_genero
                INNER JOIN area AS a ON a.id_area = e.id_area
                INNER JOIN cargo AS c ON c.id_cargo = e.id_cargo
                INNER JOIN origen AS o ON o.id_origen = e.id_origen
                INNER JOIN estados_venezuela AS v ON v.id_estados = e.estado WHERE e.fecha_ingreso BETWEEN '$primeraFecha' AND '$segundaFecha' AND e.id_origen = '$beneficiario'";
                $resultado = $mysqli->query($sql);
                $pdf = new PDF("L", "mm", array(300,580));
                $pdf->AliasNbPages();
                $pdf->AddPage();
                $pdf->SetFont("Arial", "B", 12);
                $pdf->Cell(30, 5,"Beneficiario", 1, 0, "C");
                $pdf->Cell(20, 5,"Cedula", 1, 0, "C");
                $pdf->Cell(20, 5,"Edad", 1, 0, "C");
                $pdf->Cell(20, 5,"Genero", 1, 0, "C");
                $pdf->Cell(50, 5,"Fecha de nacimiento", 1, 0, "C");
                $pdf->Cell(30, 5,"Area", 1, 0, "C");
                $pdf->Cell(30, 5,"Cargo", 1, 0, "C");
                $pdf->Cell(40, 5,"Representante", 1, 0, "C");
                $pdf->Cell(70, 5,"Correo", 1, 0, "C");
                $pdf->Cell(30, 5,"Telefono", 1, 0, "C");
                $pdf->Cell(30, 5,"Estado", 1, 0, "C");
                $pdf->Cell(30, 5,"Municipio", 1, 0, "C");
                $pdf->Cell(90, 5,"Direccion", 1, 0, "C");
                $pdf->Cell(50, 5,"Origen", 1, 1, "C");
                $pdf->SetFont("Arial", "", 9);
                while ($row = $resultado->fetch_assoc()) {
                $pdf->Cell(30, 5,$row['nombre_del_beneficiario'], 1, 0, "C");
                $pdf->Cell(20, 5,$row['cedula'], 1, 0, "C");
                $pdf->Cell(20, 5,$row['edad'], 1, 0, "C");
                $pdf->Cell(20, 5,$row['genero'], 1, 0, "C");
                $pdf->Cell(50, 5,$row['fecha_de_nacimiento'], 1, 0, "C");
                $pdf->Cell(30, 5,utf8_decode($row['nombre_del_area']), 1, 0, "C");
                $pdf->Cell(30, 5,utf8_decode($row['tipo_de_cargo']), 1, 0, "C");
                $pdf->Cell(40, 5,$row['nombre_del_representante'], 1, 0, "C");
                $pdf->Cell(70, 5,$row['correo'], 1, 0, "C");
                $pdf->Cell(30, 5,$row['telefono'], 1, 0, "C");
                $pdf->Cell(30, 5,$row['estado_nombre'], 1, 0, "C");
                $pdf->Cell(30, 5,$row['municipio'], 1, 0, "C");
                $pdf->Cell(90, 5,$row['direccion'], 1, 0, "C");
                $pdf->Cell(50, 5,$row['origen'], 1, 1, "C");
                
                }
                $pdf-> Output();
                break;
                case 3:
                    require "plantillatrabajador.php";
                    $sql = "SELECT e.id_datos_del_entregante, e.nombre_del_beneficiario,d.tipo_documento, e.cedula, e.nombre_del_representante, e.id_cargo, e.correo, e.telefono, e.municipio, e.direccion, a.nombre_del_area, o.origen, v.estado_nombre FROM datos_del_entregante AS e 
                    INNER JOIN area AS a ON a.id_area = e.id_area
                    INNER JOIN origen AS o ON o.id_origen = e.id_origen
                    INNER JOIN estados_venezuela AS v ON v.id_estados = e.estado
                    INNER JOIN tipo_documento AS d ON d.id_documento = e.tipo_documento WHERE e.fecha_ingreso BETWEEN '$primeraFecha' AND '$segundaFecha' AND e.id_origen = $beneficiario";
                    $resultado = $mysqli->query($sql);
                    $pdf = new PDF("L", "mm", array(300,500));
                    $pdf->AliasNbPages();
                    $pdf->AddPage();
                    $pdf->SetFont("Arial", "B", 12);
                    $pdf->Cell(20, 5,"T.D", 1, 0, "C");
                    $pdf->Cell(30, 5,"Documento", 1, 0, "C");
                    $pdf->Cell(40, 5,"Beneficiario", 1, 0, "C");
                    $pdf->Cell(30, 5,"Area", 1, 0, "C");
                    $pdf->Cell(50, 5,"Cargo", 1, 0, "C");
                    $pdf->Cell(70, 5,"Correo", 1, 0, "C");
                    $pdf->Cell(30, 5,"Telefono", 1, 0, "C");
                    $pdf->Cell(30, 5,"Estado", 1, 0, "C");
                    $pdf->Cell(30, 5,"Municipio", 1, 0, "C");
                    $pdf->Cell(100, 5,"Direccion", 1, 0, "C");
                    $pdf->Cell(50, 5,"Origen", 1, 1, "C");
                    $pdf->SetFont("Arial", "", 9);
                    while ($row = $resultado->fetch_assoc()) {
                    $pdf->Cell(20, 5,$row['tipo_documento'], 1, 0, "C");
                    $pdf->Cell(30, 5,$row['cedula'], 1, 0, "C");
                    $pdf->Cell(40, 5,$row['nombre_del_beneficiario'], 1, 0, "C");
                    $pdf->Cell(30, 5,utf8_decode($row['nombre_del_area']), 1, 0, "C");
                    $pdf->Cell(50, 5,utf8_decode($row['id_cargo']), 1, 0, "C");
                    $pdf->Cell(70, 5,$row['correo'], 1, 0, "C");
                    $pdf->Cell(30, 5,$row['telefono'], 1, 0, "C");
                    $pdf->Cell(30, 5,$row['estado_nombre'], 1, 0, "C");
                    $pdf->Cell(30, 5,$row['municipio'], 1, 0, "C");
                    $pdf->Cell(100, 5,$row['direccion'], 1, 0, "C");
                    $pdf->Cell(50, 5,$row['origen'], 1, 1, "C");
                    }
                    $pdf-> Output();
                    break;
    }
}