<?php
session_start();
require '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $password = $_POST['password'];
    $departamento = (int) $_POST['departamento'];
    $tipo_usuario = $_POST['Tipo_Usuario'];
    $activo = isset($_POST['estado']) ? 1 : 0;

    if (empty($nombre) || empty($password) || empty($tipo_usuario) || empty($departamento)) {
        $_SESSION['mensaje'] = "Por favor completa todos los campos requeridos.";
        $_SESSION['mensaje_tipo'] = "warning";
        header('Location: ../admin/usuarios.php');
        exit;
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === 0) {
        $permitidos = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        $limite_kb = 500;

        if (in_array($_FILES['archivo']['type'], $permitidos) && $_FILES['archivo']['size'] <= $limite_kb * 1024) {
            $imagen = file_get_contents($_FILES['archivo']['tmp_name']);
        } else {
            $_SESSION['mensaje'] = "La imagen no es válida o excede el tamaño permitido.";
            $_SESSION['mensaje_tipo'] = "danger";
            header('Location: ../admin/usuarios.php');
            exit;
        }
    } else {
        $_SESSION['mensaje'] = "No se ha seleccionado ninguna imagen.";
        $_SESSION['mensaje_tipo'] = "danger";
        header('Location: ../admin/usuarios.php');
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO usuarios (Nombre, Pass, Foto, Dpto, Tipo_Usuario, activo) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisi", $nombre, $passwordHash, $imagen, $departamento, $tipo_usuario, $activo);

    if ($stmt->execute()) {
        $_SESSION['mensaje'] = "Usuario registrado exitosamente.";
        $_SESSION['mensaje_tipo'] = "success";
    } else {
        $_SESSION['mensaje'] = "Error al guardar el usuario.";
        $_SESSION['mensaje_tipo'] = "danger";
    }

    $stmt->close();
    header('Location: ../admin/usuarios.php');
    exit;
} else {
    $_SESSION['mensaje'] = "Método de solicitud inválido.";
    $_SESSION['mensaje_tipo'] = "danger";
    header('Location: ../admin/usuarios.php');
    exit;
}
