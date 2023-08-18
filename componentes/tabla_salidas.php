<div class="row">
    <div class="col-lg-6 mb-2">
        <a href="../users/nuevaEntrada.php" class="btn btn-primary"><span class="mdi mdi-plus"></span> Nueva Salida</a>
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


<!-- alerta de emilinar -->
<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
?>

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle"></i>
        <strong> Hola!</strong> Se Elimino su Registro.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php

}

?>





<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="card-title">Todas las entradas</h4>
                </div>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="buscador" name="buscador" placeholder="BUSCAR">
                </div>

            </div>


            <div class="table-responsive">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nº Registro</th>
                            <th>Fecha Registro</th>
                            <th>Tipo de Documento</th>
                            <th>Descripción</th>
                            <th>Destino</th>
                            <th>Fecha Firma</th>
                            <th>Importe</th>
                            <th>Archivo</th>
                            <td>ACCIONES</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row_departamentos = $departamentos->fetch_assoc()) {  ?>

                            <?php 
                            $datos = $row_departamentos['Id'];

                            ?>
                            <tr>
                                <td> <?= $row_departamentos['Id']; ?></td>
                                <td> <?= $row_departamentos['Nombre']; ?></td>
                                <td> <?= $row_departamentos['Telefono']; ?></td>
                                <td> <?= $row_departamentos['Email']; ?></td>
                                <td> <?= $row_departamentos['Id']; ?></td>
                                <td> <?= $row_departamentos['Nombre']; ?></td>
                                <td> <?= $row_departamentos['Telefono']; ?></td>
                               

                                <?php  
                                
                                $id_institucion=$row_departamentos['Institucion'];
                                
                                $sql1="SELECT * FROM instituciones WHERE Id=$id_institucion";
                                
                                $resultado=mysqli_query($conn, $sql1);

                                $fila1=mysqli_fetch_assoc($resultado);
                                 
                                $institucion= $fila1['Nombre'];
                                
                                ?>


                                <td><?= $institucion ?></td>
                                <td>
                                    <a href="../admin/editarDepartamentos.php?id=<?php echo $row_departamentos['Id'];  ?>" class="btn btn-sm btn-warning" ">EDITAR</a>
                              
                                    <a href="#" onclick="agregarForm('<?php echo $datos; ?>');" class="btn btn-sm btn-danger"  data-bs-toggle="modal" data-bs-target="#eliminaModal">ELIMINAR</a>
                                 <td>
                                   
                              
                            </tr>


                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<?php    include '../admin/ModaleliminarDepartamento.php';         ?>




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