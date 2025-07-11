<?php
session_start();
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
            1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
            5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
            9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
        ];

        if ($fecha != "") {
            $titulo = "REPORTE DE CHEQUES DE FECHA: " . $fecha;
        } elseif ($mes != "") {
            $nombreMes = $meses[intval($mes)] ?? "Mes inválido";
            if ($ano != "") {
                $titulo = "REPORTE DE CHEQUES DEL MES DE $nombreMes DE $ano";
            } else {
                $titulo = "REPORTE DE CHEQUES DEL MES DE $nombreMes";
            }
        } elseif ($ano != "") {
            $titulo = "REPORTE DE CHEQUES DEL AÑO: " . $ano;
        } else {
            $titulo = "REPORTE DE CHEQUES";
        }

        $this->Image('../images/2.png', 20, 5, 20);
        $this->SetFont('Arial', 'B', 19);
        $this->Cell(95);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(110, 15, utf8_decode('TESORERIA GENERAL DEL ESTADO'), 0, 1, 'C');
        $this->Ln(3);
        $this->SetTextColor(103);
        $this->Cell(1);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(96, 10, utf8_decode("Ubicación : "), 0, 0);
        $this->Ln(5);
        $this->Cell(1);
        $this->Cell(59, 10, utf8_decode("Teléfono : "), 0, 0);
        $this->Ln(5);
        $this->Cell(1);
        $this->Cell(85, 10, utf8_decode("Correo : "), 0, 0);
        $this->Ln(5);
        $this->Cell(1);
        $this->Cell(85, 10, utf8_decode("Sucursal : "), 0, 0);
        $this->Ln(10);

        $this->SetTextColor(228, 100, 0);
        $this->Cell(100);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(100, 10, utf8_decode($titulo), 0, 1, 'C');
        $this->Ln(7);

        // Cabecera tabla
        $this->SetFillColor(237, 189, 78);
        $this->SetTextColor(255, 255, 255);
        $this->SetDrawColor(163, 163, 163);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(40, 10, utf8_decode('R. Documento'), 1, 0, 'C', 1);
        $this->Cell(35, 10, utf8_decode('Banco'), 1, 0, 'C', 1);
        $this->Cell(70, 10, utf8_decode('Beneficiario'), 1, 0, 'L', 1);
        $this->Cell(30, 10, utf8_decode('Importe'), 1, 0, 'R', 1);
        $this->Cell(40, 10, utf8_decode('Fecha Firma'), 1, 0, 'C', 1);
        $this->Cell(60, 10, utf8_decode('Quien Retira'), 1, 1, 'L', 1);
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

$where = [];
if ($fecha != "") {
    $where[] = "fecha_firma = '$fecha'";
}
if ($mes != "") {
    $where[] = "MONTH(fecha_firma) = $mes";
}
if ($ano != "") {
    $where[] = "YEAR(fecha_firma) = $ano";
}

if (count($where) === 0) {
    $_SESSION['mensaje'] = "Debe seleccionar al menos un filtro válido para generar el reporte.";
    $_SESSION['tipo_mensaje'] = "warning";
    header("Location: ../admin/reportes.php");
    exit;
}

$sqlWhere = implode(' AND ', $where);

// Consulta con JOIN para traer el nombre del banco
$query = "
    SELECT c.r_documento, b.Nombre AS banco, c.beneficiario, c.importe, c.fecha_firma, c.quien_retira 
    FROM cheques c 
    LEFT JOIN bancos b ON c.id_banco = b.Id 
    WHERE $sqlWhere
";

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

while ($fila = mysqli_fetch_assoc($resul)) {
    $pdf->Cell(40, 10, utf8_decode($fila['r_documento']), 1, 0, 'C');
    $pdf->Cell(35, 10, utf8_decode($fila['banco']), 1, 0, 'L');
    $pdf->Cell(70, 10, utf8_decode($fila['beneficiario']), 1, 0, 'L');
    $pdf->Cell(30, 10, number_format($fila['importe'], 2, ',', '.'), 1, 0, 'R');
    $pdf->Cell(40, 10, utf8_decode($fila['fecha_firma']), 1, 0, 'C');
    $pdf->Cell(60, 10, utf8_decode($fila['quien_retira']), 1, 1, 'L');
}

$pdf->Output('Reporte_Cheques.pdf', 'I');
