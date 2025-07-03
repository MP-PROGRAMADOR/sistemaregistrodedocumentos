<?php
session_start();
require '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos
    $id = intval($_POST['id']);
    $confin = intval($_POST['confin']);
    $procedencia = $conn->real_escape_string($_POST['procedencia']);
    $r_documento = $conn->real_escape_string($_POST['r_documento']);
    $id_banco = intval($_POST['id_banco']);
    $beneficiario = $conn->real_escape_string($_POST['beneficiario']);
    $importe = intval($_POST['importe']);
    $concepto = $conn->real_escape_string($_POST['concepto']);
    $iva = $conn->real_escape_string($_POST['iva']);
    $fecha_entrada = $conn->real_escape_string($_POST['fecha_entrada']);
    $fecha_firma = $conn->real_escape_string($_POST['fecha_firma']);
    $fecha_retirada = $conn->real_escape_string($_POST['fecha_retirada']);
    $quien_retira = $conn->real_escape_string($_POST['quien_retira']);

    // Primero obtener nombre archivo anterior
    $sqlArchivoAnt = "SELECT archivo FROM cheques WHERE id = $id LIMIT 1";
    $resArchivo = $conn->query($sqlArchivoAnt);
    $archivoAnterior = null;
    if ($resArchivo && $resArchivo->num_rows > 0) {
        $row = $resArchivo->fetch_assoc();
        $archivoAnterior = $row['archivo'];
    }

    // Procesar archivo si se subió uno nuevo
    $archivoNuevoNombre = $archivoAnterior; // por defecto mantiene el antiguo
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['archivo']['tmp_name'];
        $fileName = $_FILES['archivo']['name'];
        $fileSize = $_FILES['archivo']['size'];
        $fileType = $_FILES['archivo']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Validar extensión pdf
        if ($fileExtension !== 'pdf') {
            $_SESSION['mensaje_error'] = "El archivo debe ser PDF.";
            header("Location: ../users/editarCheque.php?id=$id");
            exit;
        }

        // Crear nombre único para archivo
        $nuevoNombreArchivo = 'cheque_' . $id . '_' . time() . '.' . $fileExtension;
        $dest_path = realpath(__DIR__ . '/../documentos/cheques/') . DIRECTORY_SEPARATOR . $nuevoNombreArchivo;

        // Mover archivo subido
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            // Borrar archivo anterior si existe y es diferente
            if ($archivoAnterior && file_exists(realpath(__DIR__ . '/../documentos/cheques/') . DIRECTORY_SEPARATOR . $archivoAnterior)) {
                unlink(realpath(__DIR__ . '/../documentos/cheques/') . DIRECTORY_SEPARATOR . $archivoAnterior);
            }
            $archivoNuevoNombre = $nuevoNombreArchivo;
        } else {
            $_SESSION['mensaje_error'] = "Error al subir el archivo.";
            header("Location: ../users/editarCheque.php?id=$id");
            exit;
        }
    }

    // Actualizar registro
    $sqlUpdate = "UPDATE cheques SET 
        confin = $confin,
        procedencia = '$procedencia',
       r_documento = '$r_documento',
        id_banco = $id_banco,
        beneficiario = '$beneficiario',
        importe = $importe,
        concepto = '$concepto',
        iva = '$iva',
        fecha_entrada = '$fecha_entrada',
        fecha_firma = '$fecha_firma',
        fecha_retirada = '$fecha_retirada',
        quien_retira = '$quien_retira',
        archivo = '$archivoNuevoNombre'
        WHERE id = $id";

    if ($conn->query($sqlUpdate)) {
       // Mensaje de éxito en sesión
        $_SESSION['mensaje'] = "Cheque actualizado correctamente.";
        $_SESSION['mensaje_tipo'] = "success";
        header("Location: ../users/cheques.php");
        exit;
    } else {
       // Mensaje de error en sesión
        $_SESSION['mensaje'] = "Error al actualizar: " . $conn->error;
        $_SESSION['mensaje_tipo'] = "danger";
        header("Location: ../users/users.php?id=$id");
    }
} else {
    // No es POST, redirigir o mostrar error
    header("Location: ../users/cheques.php");
    exit;
}
