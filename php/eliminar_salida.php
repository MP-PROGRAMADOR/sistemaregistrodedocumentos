<?php
session_start(); // Asegúrate de iniciar la sesión

require '../conexion/conexion.php';

$Id = $conn->real_escape_string($_POST['id_salida']);

$sql = "DELETE FROM salidas WHERE Id = $Id";

if ($conn->query($sql)) {
    $_SESSION['mensaje'] = "Salida eliminada correctamente.";
    $_SESSION['mensaje_tipo'] = "success";
} else {
    $_SESSION['mensaje'] = "Error al eliminar la Salida.";
    $_SESSION['mensaje_tipo'] = "danger";
}

$conn->close();
header('Location: ../admin/salidas.php');
exit;
?>

