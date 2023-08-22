<?php


require '../conexion/conexion.php';

$directorio = "../documentos/decretos/";
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


// $descripcion = $conn->real_escape_string($_POST['descripcion']);
// $archivo = $conn->real_escape_string($_FILES["archivo"]["name"]);
// $entradaDoc = $conn->real_escape_string($_POST['entradaDoc']);
// $fechaRegistro = date("Y-m-d H:i:s");

// $sql = "INSERT INTO decretos (Descripcion,Fecha,Archivo,DocEntrada)
//     VALUES ('$descripcion','$fechaRegistro','$archivo','$entradaDoc')";
// $conn->query($sql);
// $idDecreto = mysqli_insert_id($conn);

// if ($_POST['miembro'] != "") {

//     $arregloMiembro = $_POST['miembro']; 
//     $num = count($arregloMiembro);
//     echo $num . "</br>";
//     print_r("Valores: <br>");

//     for ($i = 0; $i < $num; $i++) {
//         $q = "INSERT INTO destino (Miembro, Decreto) VALUES ('$arregloMiembro[$i]','$idDecreto')";
//         $qDestino =  mysqli_query($conn, $q);

//         if ( $qDestino) {
//             header('Location: ../users/decretos.php?mensaje=insertado');
//         } else {
//             header('Location: ../users/decretos.php?mensaje=error');
//         }
//     }
// }
