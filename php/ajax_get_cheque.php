<?php
require '../conexion/conexion.php';

header('Content-Type: application/json');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo json_encode(['error' => 'ID no válido']);
    exit;
}

$id = intval($_GET['id']);

$sql = "SELECT c.*, b.Nombre AS banco_nombre 
        FROM cheques c
        LEFT JOIN bancos b ON c.id_banco = b.Id
        WHERE c.id = $id LIMIT 1";

$result = $conn->query($sql);

if (!$result || $result->num_rows === 0) {
    echo json_encode(['error' => 'Cheque no encontrado']);
    exit;
}

$cheque = $result->fetch_assoc();

// Preparar datos para enviar como JSON
$data = [
    'id' => $cheque['id'],
    'confin' => $cheque['confin'],
    'procedencia' => htmlspecialchars($cheque['procedencia']),
    'r_documento' => htmlspecialchars($cheque['r_documento']),
    'banco_nombre' => htmlspecialchars($cheque['banco_nombre']),
    'beneficiario' => htmlspecialchars($cheque['beneficiario']),
    'importe' => $cheque['importe'],
    'importe_formateado' => number_format($cheque['importe'], 0, ',', '.'),
    'concepto' => $cheque['concepto'],
    'concepto_html' => nl2br(htmlspecialchars($cheque['concepto'])),
    'iva' => htmlspecialchars($cheque['iva']),
    'fecha_entrada' => $cheque['fecha_entrada'],
    'fecha_firma' => $cheque['fecha_firma'],
    'fecha_retirada' => $cheque['fecha_retirada'],
    'quien_retira' => htmlspecialchars($cheque['quien_retira']),
    'archivo' => $cheque['archivo'],
    'archivo_url' => !empty($cheque['archivo']) ? "../documentos/cheques/" . $cheque['archivo'] : null,
    'n_registro' => htmlspecialchars($cheque['n_registro']),
];

echo json_encode($data);
