<?php
session_start();
require '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos del formulario
    $n_registro = $conn->real_escape_string($_POST['n_registro']);
    $n_documento = $conn->real_escape_string($_POST['n_documento']);
    $confin = intval($_POST['confin']);
    $fecha_firma = $conn->real_escape_string($_POST['fecha_firma']);
    $fecha_entrada = $conn->real_escape_string($_POST['fecha_entrada_tesoreria']);
    $importe = intval($_POST['importe']);
    $Usuario = intval($_SESSION['codigo']);
    $Beneficiario = $conn->real_escape_string($_POST['beneficiario']);
    $id_banco = intval($_POST['id_banco']);
    $cuenta_tesoro = $conn->real_escape_string($_POST['cuenta_tesoro']);
    $iva = $conn->real_escape_string($_POST['iva']);
    $procedencia = $conn->real_escape_string($_POST['procedencia']);
    $concepto = $conn->real_escape_string($_POST['concepto']);

    // Verificar archivo adjunto
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
        $archivoTmp = $_FILES['archivo']['tmp_name'];
        $archivoNombreOriginal = $_FILES['archivo']['name'];
        $extension = strtolower(pathinfo($archivoNombreOriginal, PATHINFO_EXTENSION));

        // Validar que sea PDF
        if ($extension !== 'pdf') {
            $_SESSION['mensaje'] = "El archivo debe ser un PDF.";
            $_SESSION['mensaje_tipo'] = "danger";
            header("Location: ../users/pagos.php");
            exit;
        }

        // Crear carpeta si no existe
        $directorio = __DIR__ . '/../documentos/pagos/';
        if (!file_exists($directorio)) {
            if (!mkdir($directorio, 0755, true)) {
                $_SESSION['mensaje'] = "No se pudo crear la carpeta para subir archivos.";
                $_SESSION['mensaje_tipo'] = "danger";
                header("Location: ../users/pagos.php");
                exit;
            }
        }

        // Nombre único para el archivo
        $archivoFinal = 'pago_' . time() . '.' . $extension;
        $rutaFinal = $directorio . $archivoFinal;

        if (!move_uploaded_file($archivoTmp, $rutaFinal)) {
            $_SESSION['mensaje'] = "Error al subir el archivo.";
            $_SESSION['mensaje_tipo'] = "danger";
            header("Location: ../users/pagos.php");
            exit;
        }
    } else {
        $_SESSION['mensaje'] = "Debe adjuntar un documento PDF.";
        $_SESSION['mensaje_tipo'] = "danger";
        header("Location: ../users/pagos.php");
        exit;
    }

    // Insertar en la base de datos
    $sql = "INSERT INTO pagos (
                n_registro, Concepto, fecha_firma, importe,
                Archivo, Usuario, Beneficiario, id_banco, cuenta_tesoro,
                iva, n_documento, procedencia, fecha_entrada_tesoreria,
                fecha_entrada_banco, fecha_entrega, confin
            ) VALUES (
                '$n_registro', '$concepto', '$fecha_firma', $importe,
                '$archivoFinal', $Usuario, '$Beneficiario', $id_banco, '$cuenta_tesoro',
                '$iva', '$n_documento', '$procedencia', $fecha_entrada, NULL, NULL, $confin
            )";

    if ($conn->query($sql)) {
        $_SESSION['mensaje'] = "Pago registrado correctamente.";
        $_SESSION['mensaje_tipo'] = "success";
    } else {
        $_SESSION['mensaje'] = "Error al guardar: " . $conn->error;
        $_SESSION['mensaje_tipo'] = "danger";
    }

    header("Location: ../users/pagos.php");
    exit;
} else {
    header("Location: ../users/pagos.php");
    exit;
}
?>
