<?php
session_start();
require '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_POST['id_usuario'];
    $nuevo_estado = (int)$_POST['nuevo_estado'];

    $stmt = $conn->prepare("UPDATE usuarios SET activo = ? WHERE Id = ?");
    $stmt->bind_param("ii", $nuevo_estado, $id);

    if ($stmt->execute()) {
        $_SESSION['mensaje'] = $nuevo_estado ? "Usuario activado correctamente." : "Usuario desactivado correctamente.";
        $_SESSION['mensaje_tipo'] = "success";
    } else {
        $_SESSION['mensaje'] = "Error al cambiar el estado del usuario.";
        $_SESSION['mensaje_tipo'] = "danger";
    }

    $stmt->close();
    header('Location: ../admin/usuarios.php');
    exit;
}
