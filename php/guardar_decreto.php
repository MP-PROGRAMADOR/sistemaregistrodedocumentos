<?php


require '../conexion/conexion.php';


$descripcion= $conn->real_escape_string($_POST['descripcion']);
$archivo= $conn->real_escape_string($_POST['archivo']);
$entradaDoc=$conn->real_escape_string($_POST['entradaDoc']);
$fechaRegistro = date("Y-m-d H:i:s");

    $sql= "INSERT INTO decretos (Descripcion,Fecha,Archivo,DocEntrada)
    VALUES ('$descripcion','$fechaRegistro','$archivo','$entradaDoc')";
   
    if($conn->query($sql)){
        $id=$conn->insert_id;

        header('Location: ../users/decretos.php?mensaje=insertado'); 
    }else{
        header('Location: ../users/decretos.php?mensaje=error'); 
    }
    
   




