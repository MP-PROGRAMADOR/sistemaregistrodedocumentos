<?php
require '../conexion/conexion.php';

header('Content-Type: application/json');

if (!isset($_GET['id'])) {
  echo json_encode(['success' => false, 'message' => 'ID no proporcionado']);
  exit;
}

$id = (int) $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM cheques WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
  $cheque = $result->fetch_assoc();
  echo json_encode(['success' => true, 'cheque' => $cheque]);
} else {
  echo json_encode(['success' => false, 'message' => 'Cheque no encontrado']);
}
$stmt->close();
$conn->close();
?>
