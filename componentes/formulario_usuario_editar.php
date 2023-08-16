<?php

require '../conexion/conexion.php';

$sqlDepartamentos = " SELECT * FROM departementos";

$departamentos1 = $conn->query($sqlDepartamentos);


?>

<?php

require '../conexion/conexion.php';

$sqlUsuarios = " SELECT * FROM usuarios";

$usuarios = $conn->query($sqlUsuarios);


$id = $_GET['id'];

$sqlusuarios = " SELECT * FROM usuarios WHERE Id=$id";

$usuarios = $conn->query($sqlusuarios);
$fila2 = mysqli_fetch_assoc($usuarios);
$id=$fila2['Id'];

?>



<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">FORMULARIO DE REGISTRO</h4>
            <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" value="<?php echo $fila2['Id']; ?>" name="id" id="id">
                    <label for="nombre">NOMBRE DE USUARIO</label>
                    <input type="text" class="form-control" value="<?php echo $fila2['Nombre']; ?>" id="nombre" name="nombre" placeholder="NOMBRE DE USUARIO" required>
                </div>
                <div class="form-group">
                    <label for="password">PASSWORD</label>
                    <input type="password" class="form-control" value="<?php echo $fila2['Pass']; ?>" id="password" name="password" placeholder="PASSWORD" required>
                </div>
                <div class="form-group">
                    <label for="institucion"> DEPARTAMENTO</label>
                    <select class="form-control" aria-label=".form-select-lg example" id="departamento" name="departamento" required>
                        <option selected value="">seleccione una Institucion.....</option>
                        <?php while ($departamentos = mysqli_fetch_array($departamentos1)) { ?>
                            <option value="<?php echo $departamentos['Id']; ?>"><?php echo $departamentos['Nombre']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="archivo">FOTO</label>
                    <input type="file" class="form-control" id="archivo" name="archivo" accept="image/*">

                    <?php
                    $path = "files/".$id;
                    if(file_exists($path)){
                        $directorio = opendir($path);
                        while ($archivo = readdir($directorio))
                        {
                            if(!is_dir($archivo)){
                                echo "<div data='".$path."/".$archivo.
                                "'><a href='".$path."/".$archivo."'
                                title='Ver Archivo Adjunto'><span 
                                class='glyphicon
                                glyphicon-picture'></span></a>";
                                echo "$archivo <a href='#' class='delete'
                                title='Ver Archivo Adjunto' ><span 
                                class='glyphicon glyphicon-trash'
                                aria-hidden='true'></span></a></div>";
                                echo "<img src='files/$id/$archivo'
                                width='300' />";
                            }
                        }
                    }



                    ?>






                </div>
                <button type="submit" class="btn btn-primary me-2">GUARDAR</button>
                <a href="../admin/miembros.php" class="btn btn-danger me-2">CANCELAR</a>
            </form>
        </div>
    </div>
</div>