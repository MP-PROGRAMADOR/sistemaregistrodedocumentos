<?php
session_start(); // Asegúrate de iniciar la sesión

require '../conexion/conexion.php';

$Id = $conn->real_escape_string($_POST['id_entrada']);

$sql = "DELETE FROM entradas WHERE Id = $Id";

if ($conn->query($sql)) {
    $_SESSION['mensaje'] = "Entrada eliminada correctamente.";
    $_SESSION['mensaje_tipo'] = "success";
} else {
    $_SESSION['mensaje'] = "Error al eliminar LA eNTRADA.";
    $_SESSION['mensaje_tipo'] = "danger";
}

$conn->close();
header('Location: ../admin/entradas.php');
exit;
?>

