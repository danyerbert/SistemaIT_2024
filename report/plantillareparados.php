<?php
session_start();
if (!isset($_SESSION['id_usuarios'])) {
    header("Location: index.php");
}
require('../fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../img/Canaima.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(380,10,'Dispositivos Reparados',0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
 // Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Formato de letra Negrita
    $this->SetFont('Arial','B',8);
    //Direccion de la compañia 
    $this->Cell(0,10,utf8_decode("Ubicado en: Base Área Generalisimo Francisco de Miranda (La Carlota) Caracas-Venezuela"),0,1,"C");
    $this->Cell(0,4,"Master: (+58 212) 234-67-46 - www.industriacanaima.gob.ve", 0,1, "C");
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,-30,'Page '.$this->PageNo().'/{nb}',0,1,'C');
}
}
?>