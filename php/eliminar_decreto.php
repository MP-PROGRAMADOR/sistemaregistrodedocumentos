<?php
session_start(); // Asegúrate de iniciar la sesión

require '../conexion/conexion.php';

$Id = $conn->real_escape_string($_POST['id_decreto']);

$sql = "DELETE FROM decretos WHERE Id = $Id";

if ($conn->query($sql)) {
    $_SESSION['mensaje'] = "Cheque eliminado correctamente.";
    $_SESSION['mensaje_tipo'] = "success";
} else {
    $_SESSION['mensaje'] = "Error al eliminar el cheque.";
    $_SESSION['mensaje_tipo'] = "danger";
}

$conn->close();
header('Location: ../admin/decretos.php');
exit;
?>

