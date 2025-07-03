<?php
require '../conexion/conexion.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT * FROM pagos WHERE Id = $id LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        $pago = $result->fetch_assoc();
        header('Content-Type: application/json');
        echo json_encode($pago);
    } else {
        http_response_code(404);
        echo json_encode(null);
    }
} else {
    http_response_code(400);
    echo json_encode(null);
}
?>
