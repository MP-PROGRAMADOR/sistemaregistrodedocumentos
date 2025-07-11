<?php
session_start();
require '../conexion/conexion.php';
 $id_usuario=$_SESSION['codigo'];

// Recoger y sanitizar datos
$numero_registro = $conn->real_escape_string($_POST['numero_registro']);
$confin = $conn->real_escape_string($_POST['confin']);
$procedencia = $conn->real_escape_string($_POST['procedencia']);
$r_documento = $conn->real_escape_string($_POST['r_documento']);
$id_banco = $conn->real_escape_string($_POST['id_banco']);
$beneficiario = $conn->real_escape_string($_POST['beneficiario']);
$importe = $conn->real_escape_string($_POST['importe']);
$concepto = $conn->real_escape_string($_POST['concepto']);
$iva = $conn->real_escape_string($_POST['iva']);
$fecha_entrada = $conn->real_escape_string($_POST['fecha_entrada']);

// Manejo de archivo PDF
if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
    $ruta_temp = $_FILES['archivo']['tmp_name'];
    $nombre_archivo = basename($_FILES['archivo']['name']);
    $ext = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

    if ($ext !== 'pdf') {
        $_SESSION['mensaje'] = "Solo se permiten archivos PDF.";
        $_SESSION['mensaje_tipo'] = "danger";
        header("Location: ../admin/cheques.php");
        exit;
    }

    $carpetaDestino = '../documentos/cheques/';
    if (!is_dir($carpetaDestino)) {
        mkdir($carpetaDestino, 0755, true);
    }

    $nombreArchivoFinal = uniqid() . '-' . $nombre_archivo;
    $destino = $carpetaDestino . $nombreArchivoFinal;

    if (!move_uploaded_file($ruta_temp, $destino)) {
        $_SESSION['mensaje'] = "Error al subir el archivo.";
        $_SESSION['mensaje_tipo'] = "danger";
        header("Location: ../admin/cheques.php");
        exit;
    }
} else {
    $_SESSION['mensaje'] = "Debe subir un archivo PDF.";
    $_SESSION['mensaje_tipo'] = "danger";
    header("Location: ../admin/cheques.php");
    exit;
}

// Insertar en BD
$sql = "INSERT INTO cheques (n_registro, confin, procedencia, r_documento, id_banco, beneficiario, importe, concepto, iva, fecha_entrada, archivo, Usuario)
        VALUES ('$numero_registro', '$confin', '$procedencia', '$r_documento', '$id_banco', '$beneficiario', '$importe', '$concepto', '$iva', '$fecha_entrada', '$nombreArchivoFinal', '$id_usuario')";

if ($conn->query($sql)) {
    $_SESSION['mensaje'] = "Cheque guardado correctamente.";
    $_SESSION['mensaje_tipo'] = "success";
} else {
    $_SESSION['mensaje'] = "Error al guardar el cheque.";
    $_SESSION['mensaje_tipo'] = "danger";
}

$conn->close();
header("Location: ../admin/cheques.php");
exit;
