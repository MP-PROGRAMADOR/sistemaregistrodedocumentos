<?php


require '../conexion/conexion.php';

$TipoDoc= $conn->real_escape_string($_POST['TipoDoc']);
$descripcion= $conn->real_escape_string($_POST['descripcion']);
$palabrasClaves= $conn->real_escape_string($_POST['palabrasClaves']);
$fechaFirma= $conn->real_escape_string($_POST['fechaFirma']);
$importe= $conn->real_escape_string($_POST['importe']);
$archivo= $conn->real_escape_string($_POST['archivo']);
$institucion=$conn->real_escape_string($_POST['institucion']);
$numRegistro = "1-2023";
$usuario = 1;
$fechaRegistro = date("Y-m-d H:i:s");

    $sql= "INSERT INTO entradas (NumRegistro,FechaRegistro,TipoDoc,Archivo, Descripcion, PalabrasClaves, FechaFirma, Importe, Procedencia, Usuario)
    VALUES ('$numRegistro','$fechaRegistro','$TipoDoc','$archivo','$descripcion','$palabrasClaves','$fechaFirma','$importe','$institucion','$usuario')";
   
    if($conn->query($sql)){
        $id=$conn->insert_id;

        header('Location: ../users/entradas.php?mensaje=insertado'); 
    }else{
        header('Location: ../users/entradas.php?mensaje=error'); 
    }
    
   




