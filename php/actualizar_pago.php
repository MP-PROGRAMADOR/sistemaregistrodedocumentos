<?php
session_start();
require '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos y sanitizar
    $id = intval($_POST['Id']);
    $n_documento = $conn->real_escape_string($_POST['n_documento']);
    $confin = intval($_POST['confin']);
    $procedencia = $conn->real_escape_string($_POST['procedencia']);
    $id_banco = intval($_POST['id_banco']);
    $beneficiario = $conn->real_escape_string($_POST['Beneficiario']);
    $cuenta_tesoro = $conn->real_escape_string($_POST['cuenta_tesoro']);
    $importe = intval($_POST['importe']);
    $iva = $conn->real_escape_string($_POST['iva']);
    $fecha_firma = $conn->real_escape_string($_POST['fecha_firma']);
    $concepto = $conn->real_escape_string($_POST['Concepto']);
    $fecha_entrada_banco = !empty($_POST['fecha_entrada_banco']) ? $_POST['fecha_entrada_banco'] : null;
    $fecha_entrega = !empty($_POST['fecha_entrega']) ? $_POST['fecha_entrega'] : null;

    // Obtener archivo actual
    $sqlArchivo = "SELECT Archivo FROM pagos WHERE Id = ?";
    $stmtArchivo = $conn->prepare($sqlArchivo);
    $stmtArchivo->bind_param("i", $id);
    $stmtArchivo->execute();
    $resultArchivo = $stmtArchivo->get_result();
    if ($resultArchivo->num_rows === 0) {
        $_SESSION['mensaje'] = "Pago no encontrado.";
        $_SESSION['mensaje_tipo'] = "danger";
        header("Location: ../users/pagos.php");
        exit;
    }
    $rowArchivo = $resultArchivo->fetch_assoc();
    $archivoActual = $rowArchivo['Archivo'];

    $archivoFinal = $archivoActual;

    // Procesar archivo nuevo si existe
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
        $archivoTmp = $_FILES['archivo']['tmp_name'];
        $archivoNombreOriginal = $_FILES['archivo']['name'];
        $extension = strtolower(pathinfo($archivoNombreOriginal, PATHINFO_EXTENSION));

        if ($extension !== 'pdf') {
            $_SESSION['mensaje'] = "El archivo debe ser un PDF.";
            $_SESSION['mensaje_tipo'] = "danger";
            header("Location: ../users/pagos.php");
            exit;
        }

        $directorio = __DIR__ . '/../documentos/pagos/';
        if (!file_exists($directorio)) {
            mkdir($directorio, 0755, true);
        }

        $archivoFinal = 'pago_' . time() . '.' . $extension;
        $rutaFinal = $directorio . $archivoFinal;

        if (!move_uploaded_file($archivoTmp, $rutaFinal)) {
            $_SESSION['mensaje'] = "Error al subir el archivo.";
            $_SESSION['mensaje_tipo'] = "danger";
            header("Location: ../users/pagos.php");
            exit;
        }

        // Eliminar archivo anterior si existe y es distinto
        if ($archivoActual && file_exists($directorio . $archivoActual) && $archivoActual !== $archivoFinal) {
            unlink($directorio . $archivoActual);
        }
    }

    // Preparar query UPDATE con soporte para NULL en fechas
    $sql = "UPDATE pagos SET 
                n_documento = ?, 
                confin = ?, 
                procedencia = ?, 
                id_banco = ?, 
                Beneficiario = ?, 
                cuenta_tesoro = ?, 
                importe = ?, 
                iva = ?, 
                fecha_firma = ?, 
                Concepto = ?, 
                fecha_entrada_banco = ?, 
                fecha_entrega = ?, 
                Archivo = ?
            WHERE Id = ?";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        $_SESSION['mensaje'] = "Error en la consulta SQL: " . $conn->error;
        $_SESSION['mensaje_tipo'] = "danger";
        header("Location: ../users/pagos.php");
        exit;
    }

    // Bind params: fechas pueden ser NULL, usar variables temporales para mysqli
    $fechaEntradaBancoParam = $fecha_entrada_banco ?: null;
    $fechaEntregaParam = $fecha_entrega ?: null;

    // mysqli no acepta directamente NULL en bind_param, usamos bindValue con sentencia preparada manual (más complejo)
    // Alternativa: asignar NULL explícito con bind_param pasando string y manejando en SQL

    // En este caso, como los campos son DATE y puede aceptarse NULL en la BD,
    // Podemos pasar NULL como string y en la BD será NULL
    $stmt->bind_param(
        "sisiisissssssi",
        $n_documento,
        $confin,
        $procedencia,
        $id_banco,
        $beneficiario,
        $cuenta_tesoro,
        $importe,
        $iva,
        $fecha_firma,
        $concepto,
        $fechaEntradaBancoParam,
        $fechaEntregaParam,
        $archivoFinal,
        $id
    );

    if ($stmt->execute()) {
        $_SESSION['mensaje'] = "Pago actualizado correctamente.";
        $_SESSION['mensaje_tipo'] = "success";
    } else {
        $_SESSION['mensaje'] = "Error al actualizar: " . $stmt->error;
        $_SESSION['mensaje_tipo'] = "danger";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../users/pagos.php");
    exit;
} else {
    header("Location: ../users/pagos.php");
    exit;
}
?>
