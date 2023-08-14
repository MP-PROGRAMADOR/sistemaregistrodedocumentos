<?php


require '../conexion/conexion.php';

$nombre= $conn->real_escape_string($_POST['nombre']);

    $sql= "INSERT INTO instituciones (Nombre)
    VALUES ('$nombre')";
   
    if($conn->query($sql)){
        $id=$conn->insert_id;

        header('Location: ../admin/instituciones.php?mensaje=insertado'); 
    }else{
        header('Location: ../admin/instituciones.php?mensaje=error'); 
    }
    
   




