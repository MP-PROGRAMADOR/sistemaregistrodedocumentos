<?php


require '../conexion/conexion.php';

$nombre= $conn->real_escape_string($_POST['nombre']);


    $sql= "INSERT INTO bancos (Nombre)
    VALUES ('$nombre')";
   
    if($conn->query($sql)){
        $id=$conn->insert_id;

        header('Location: ../admin/bancos.php?mensaje=insertado'); 
    }else{
        header('Location: ../admin/bancos.php?mensaje=error'); 
    }
    
   




