<?php


require '../conexion/conexion.php';


$descripcion = $conn->real_escape_string($_POST['descripcion']);
$archivo = $conn->real_escape_string($_POST['archivo']);
$entradaDoc = $conn->real_escape_string($_POST['entradaDoc']);
$fechaRegistro = date("Y-m-d H:i:s");

$sql = "INSERT INTO decretos (Descripcion,Fecha,Archivo,DocEntrada)
    VALUES ('$descripcion','$fechaRegistro','$archivo','$entradaDoc')";
$conn->query($sql);
$idDecreto = mysqli_insert_id($conn);

if ($_POST['miembro'] != "") {

    $arregloMiembro = $_POST['miembro'];
    $num = count($arregloMiembro);
    echo $num . "</br>";
    print_r("Valores: <br>");

    for ($i = 0; $i < $num; $i++) {
        $q = "INSERT INTO destino (Miembro, Decreto) VALUES ('$arregloMiembro[$i]','$idDecreto')";
        $qDestino =  mysqli_query($conn, $q);

        if ( $qDestino) {
            header('Location: ../users/decretos.php?mensaje=insertado');
        } else {
            header('Location: ../users/decretos.php?mensaje=error');
        }
    }
}
