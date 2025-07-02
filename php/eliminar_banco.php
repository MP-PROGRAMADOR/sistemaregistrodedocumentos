<?php

require '../conexion/conexion.php';

$Id = $conn->real_escape_string($_POST['id_eliminar']);

$sql = "DELETE FROM bancos WHERE Id = $Id";

if ($conn->query($sql)) {
    header('Location: ../admin/bancos.php?mensaje=eliminado');
} else {
    header('Location: ../admin/bancos.php?mensaje=error');
}

?>
