<?php


require '../conexion/conexion.php'; 
session_start();

$usuario = $_SESSION['codigo'];

$directorio = "../documentos/salidas/";
$archivo = $directorio . basename($_FILES["archivo"]["name"]);
$tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

//Validar que es imagen

//validar tamaño imagen
$size = $_FILES["archivo"]["size"];
if ($size > 1000000) {
    echo "El Documento pesa mas de 1000000KB";
} else {
    //validar tipo de imagen
    if ($tipoArchivo == "pdf" || $tipoArchivo == "docx") {
        // se validó el archivo correctamente
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo)) {
            echo " El archivo se subio correctamente";
        } else {
            echo "Hubo un error al subir el archivo";
        }
    } else {
        echo "Solo se admiten archivos pdf/docx";
    }
}


$qLastID = "SELECT MAX(entradas.Id) AS Codigo FROM entradas";
$ResultId = mysqli_query($conn, $qLastID);
$arrayId = mysqli_fetch_array($ResultId);
$datoId = $arrayId['Codigo'];
$idLast = $datoId + 1;
$YearActual = date('Y');

$TipoDoc = $conn->real_escape_string($_POST['TipoDoc']);
$descripcion = $conn->real_escape_string($_POST['descripcion']);
$palabrasClaves = $conn->real_escape_string($_POST['palabrasClaves']);
$fechaFirma = $conn->real_escape_string($_POST['fechaFirma']);
$importe = $conn->real_escape_string($_POST['importe']);
$archivo = $conn->real_escape_string($_FILES["archivo"]["name"]);
$institucion = $conn->real_escape_string($_POST['institucion']);
$numRegistro = $idLast . "-" . $YearActual;
$fechaRegistro = date("Y-m-d");

$sql = "INSERT INTO salidas (NumRegistro,FechaRegistro,TipoDoc,Archivo, Descripcion, PalabrasClaves, FechaFirma, Importe, Destino, Usuario)
    VALUES ('$numRegistro','$fechaRegistro','$TipoDoc','$archivo','$descripcion','$palabrasClaves','$fechaFirma','$importe','$institucion','$usuario')";

if ($conn->query($sql)) {
    $id = $conn->insert_id;

    header('Location: ../users/salidas.php?mensaje=insertado');
} else {
    header('Location: ../users/salidas.php?mensaje=error');
}
