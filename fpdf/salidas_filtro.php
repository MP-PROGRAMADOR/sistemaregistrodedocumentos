<?php
session_start(); // Inicia la sesión para usar variables de sesión

require('./fpdf.php');

class PDF extends FPDF
{
   function Header()
   {
      include '../conexion/conexion.php';
      $fecha = $conn->real_escape_string($_POST['fecha']);
      $mes = $conn->real_escape_string($_POST['mes']);
      $ano = $conn->real_escape_string($_POST['ano']);

      $meses = [
         1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo',
         4 => 'Abril', 5 => 'Mayo', 6 => 'Junio',
         7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre',
         10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
      ];

      if ($fecha != "") {
         $titulo = "REPORTE DE SALIDAS DE FECHA: " . $fecha;
      } elseif ($mes != "") {
         $nombreMes = $meses[intval($mes)] ?? "Mes inválido";
         $titulo = "REPORTE DE SALIDAS DEL MES DE: " . $nombreMes;
         if ($ano != "") {
            $titulo .= " DE " . $ano;
         }
      } elseif ($ano != "") {
         $titulo = "REPORTE DE SALIDAS DEL AÑO: " . $ano;
      } else {
         $titulo = "REPORTE DE SALIDAS";
      }

      $this->Image('../images/2.png', 20, 5, 20);
      $this->SetFont('Arial', 'B', 19);
      $this->Cell(95);
      $this->SetTextColor(0, 0, 0);
      $this->Cell(110, 15, utf8_decode('TESORERIA GENERAL DEL ESTADO'), 0, 1, 'C', 0);
      $this->Ln(3);
      $this->SetTextColor(103);
      $this->Cell(1);
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación : "), 0, 0, '', 0);
      $this->Ln(5);
      $this->Cell(1);
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono : "), 0, 0, '', 0);
      $this->Ln(5);
      $this->Cell(1);
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : "), 0, 0, '', 0);
      $this->Ln(5);
      $this->Cell(1);
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Sucursal : "), 0, 0, '', 0);
      $this->Ln(10);
      $this->SetTextColor(228, 100, 0);
      $this->Cell(100);
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode($titulo), 0, 1, 'C', 0);
      $this->Ln(7);
      $this->SetFillColor(237, 189, 78);
      $this->SetTextColor(255, 255, 255);
      $this->SetDrawColor(163, 163, 163);
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(30, 10, utf8_decode('N° de Registro'), 1, 0, 'C', 1);
      $this->Cell(120, 10, utf8_decode('Tipo de Documento'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('IMPORTE'), 1, 0, 'C', 1);
      $this->Cell(45, 10, utf8_decode('FECHA DE REGISTRO'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('REFERENCIA'), 1, 1, 'C', 1);
   }

   function Footer()
   {
      $this->SetY(-15);
      $this->SetFont('Arial', 'I', 8);
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
      $this->SetY(-15);
      $this->SetFont('Arial', 'I', 8);
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C');
   }
}

include '../conexion/conexion.php';

$fecha = $conn->real_escape_string($_POST['fecha']);
$mes = $conn->real_escape_string($_POST['mes']);
$ano = $conn->real_escape_string($_POST['ano']);

if ($fecha != "") {
   $query = "SELECT * FROM salidas WHERE FechaRegistro = '$fecha'";
} elseif ($mes != "" && $ano != "") {
   $query = "SELECT * FROM salidas WHERE MONTH(FechaRegistro) = $mes AND YEAR(FechaRegistro) = $ano";
} elseif ($mes != "") {
   $query = "SELECT * FROM salidas WHERE MONTH(FechaRegistro) = $mes";
} elseif ($ano != "") {
   $query = "SELECT * FROM salidas WHERE YEAR(FechaRegistro) = $ano";
} else {
   $_SESSION['mensaje'] = "Debe seleccionar al menos un filtro válido para generar el reporte.";
   $_SESSION['tipo_mensaje'] = "warning"; // o success, danger, info...
   header("Location: ../admin/reportes.php");
   exit;
}

$resul = mysqli_query($conn, $query);

if (mysqli_num_rows($resul) == 0) {
   $_SESSION['mensaje'] = "No se encontraron registros para los filtros aplicados.";
   $_SESSION['tipo_mensaje'] = "info";
   header("Location: ../admin/reportes.php");
   exit;
}

$pdf = new PDF();
$pdf->AddPage("landscape");
$pdf->AliasNbPages();
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163);

while ($entradas = mysqli_fetch_array($resul)) {
   $pdf->Cell(30, 10, utf8_decode($entradas['NumRegistro']), 1, 0, 'C', 0);
   $pdf->Cell(120, 10, utf8_decode($entradas['TipoDoc']), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode($entradas['Importe']), 1, 0, 'C', 0);
   $pdf->Cell(45, 10, utf8_decode($entradas['FechaRegistro']), 1, 0, 'C', 0);

   $codRef = $entradas['Referencia'];
   $queryRef = "SELECT Codigo FROM referencias WHERE Id = $codRef";
   $resulRef = mysqli_query($conn, $queryRef);
   $RefCod = mysqli_fetch_array($resulRef);

   $pdf->Cell(40, 10, utf8_decode($RefCod['Codigo']), 1, 1, 'C', 0);
}

$pdf->Output('Reporte_Salidas.pdf', 'I');
