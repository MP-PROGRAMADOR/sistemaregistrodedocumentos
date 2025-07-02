<?php 

require '../conexion/conexion.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];




$sql= "UPDATE  bancos SET Nombre='$nombre' WHERE Id=$id";


if($conn->query($sql)){
    $id=$conn->insert_id;

    header('Location: ../admin/bancos.php?mensaje=actualizado'); 
}else{
    header('Location: ../bancos.php?mensaje=error');
}