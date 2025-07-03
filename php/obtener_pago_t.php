<?php
require '../conexion/conexion.php';

header('Content-Type: application/json');

if (!isset($_GET['id'])) {
    echo json_encode(['success' => false, 'msg' => 'No se recibió ID']);
    exit;
}

$id = intval($_GET['id']);

// Consulta para obtener pago con nombre banco
$sql = "SELECT p.*, b.Nombre AS banco_nombre
        FROM pagos p
        LEFT JOIN bancos b ON p.id_banco = b.Id
        WHERE p.Id = $id LIMIT 1";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $pago = $result->fetch_assoc();
    echo json_encode(['success' => true, 'pago' => $pago]);
} else {
    echo json_encode(['success' => false, 'msg' => 'Pago no encontrado']);
}
