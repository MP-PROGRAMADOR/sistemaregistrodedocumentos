<div class="row">
    <div class="col-lg-6 mb-2">
        <a href="../admin/nuevoMiembro.php" class="btn btn-primary">AÑADIR</a>
    </div>
</div>



<!-- alerta -->

<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'insertado') {
?>

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle"></i>
        <strong> Hola!</strong> su registro ha tenido Exito.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php

}

?>

<!-- alerta -->

<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'actualizado') {
?>

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle"></i>
        <strong> Hola!</strong> su Actualizacion ha tenido Exito.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php

}

?>

<!-- alerta -->

<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle"></i>
        <strong> ERROR!</strong> Hubo un error.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php

}

?>


<!-- alerta -->

<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle"></i>
        <strong> Hola!</strong> Su Registro se ha Eliminado.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php

}

?>



<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>DEPARTAMENTOS</th>
                            <th>EDITAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php while ($row_pacientes = $pacientes->fetch_assoc()) {  ?>

                            <?php 
                            $datos = $row_pacientes['Id'];

                            ?>

                            <tr>
                                <td> <?= $row_pacientes['Id']; ?></td>
                                <td> <?= $row_pacientes['Nombre']; ?></td>


                                <?php  
                                
                                $id_departamento=$row_pacientes['Dpto'];
                                
                                $sql1="SELECT * FROM departementos WHERE Id=$id_departamento";
                                
                                $resultado=mysqli_query($conn, $sql1);

                                $fila1=mysqli_fetch_assoc($resultado);
                                 
                                $departamento= $fila1['Nombre'];
                                
                                ?>


                                <td> <?= $departamento; ?></td>
                                <td>
                                    <a href="../admin/editarMiembros.php?id=<?php echo $row_pacientes['Id'];  ?>" class="btn btn-sm btn-warning" ">EDITAR</a>
                                </td>
                                <td>
                               
                                <a href="#" onclick="agregarForm('<?php echo $datos; ?>');" class="btn btn-sm btn-danger"  data-bs-toggle="modal" data-bs-target="#eliminaModal">ELIMINAR</a>
                                </td>
                            </tr>


                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php  include '../admin/ModaleliminarMiembros.php'    ?>



<script>
    $('#example').DataTable();
</script>


<script>
    $(document).ready(function() {
        $("#buscador").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tablita tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });


        // boton eliminar codigo del modal..

    // agregar datos al formulario
    function agregarForm(datos) {
        var d = datos.split('||');
        // alert("los datos son: "+d);
        // return false;
        $('#Id').val(d[0]);

    }
   
</script>