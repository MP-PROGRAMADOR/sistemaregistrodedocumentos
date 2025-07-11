<?php
session_start();
require '../conexion/conexion.php';

$id = (int)$_POST['id_usuario'];
$nombre = trim($_POST['nombre']);
$password = trim($_POST['password']);
$departamento = (int)$_POST['departamento'];
$tipo_usuario = $_POST['tipo_usuario'];
$activo = isset($_POST['activo']) ? 1 : 0;

$actualizar_foto = false;
$nueva_foto = null;

// Verificar si se ha subido una nueva imagen
if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === 0) {
    $nueva_foto = addslashes(file_get_contents($_FILES['archivo']['tmp_name']));
    $actualizar_foto = true;
}

// Empezar la construcción del SQL y parámetros
$sql = "UPDATE usuarios SET Nombre=?, Tipo_Usuario=?, Activo=?, Dpto=?";
$params = [$nombre, $tipo_usuario, $activo, $departamento];
$types = "ssii";

// Si se ha enviado contraseña, añadirla a la actualización
if (!empty($password)) {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $sql .= ", Pass=?";
    $params[] = $passwordHash;
    $types .= "s";
}

// Si se ha subido una nueva imagen, también se añade
if ($actualizar_foto) {
    $sql .= ", Foto=?";
    $params[] = $nueva_foto;
    $types .= "s";
}

// WHERE final
$sql .= " WHERE Id=?";
$params[] = $id;
$types .= "i";

// Preparar y ejecutar
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    $_SESSION['mensaje'] = "Error en la preparación de la consulta.";
    $_SESSION['mensaje_tipo'] = "danger";
    header("Location: ../admin/usuarios.php");
    exit;
}

$stmt->bind_param($types, ...$params);

if ($stmt->execute()) {
    $_SESSION['mensaje'] = "Usuario actualizado correctamente.";
    $_SESSION['mensaje_tipo'] = "success";
} else {
    $_SESSION['mensaje'] = "Error al actualizar el usuario.";
    $_SESSION['mensaje_tipo'] = "danger";
}

$stmt->close();
header("Location: ../admin/usuarios.php");
exit;
