<div class="row">
    <div class="col-lg-6 mb-2">
        <a href="../admin/nuevoDecreto.php" class="btn btn-primary"><i class="mdi mdi-folder-plus"></i></a>
        <a href="#../admin/nuevoDecreto.php" class="btn btn-success"><i class="mdi mdi-printer"></i></a>
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
                <table id="myTable" class="table table-hover"> 
                    <thead>
                        <tr>
                            <th>Entrada</th>
                            <!-- <th>Cantidad de Decretos</th> -->
                            <th>Fecha</th>
                            <th>Ver Todos los Decretos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php while ($row_entradas = $entradas->fetch_assoc()) {  ?>

                            <?php
                            $datos = $row_entradas['Id'];

                            ?>

                            <tr>

                                <?php
                                $procedencia = $row_entradas['DocEntrada'];
                                $buscarProcedencia = "SELECT * FROM entradas WHERE Id = '$procedencia'";
                                $Resultprocedencia = $conn->query($buscarProcedencia);
                                $candidadDecre = mysqli_num_rows($Resultprocedencia);

                                while ($filasEntradas = $Resultprocedencia->fetch_assoc()) {

                                ?>
                                    <td> <?= $filasEntradas['NumRegistro'] . "/" . $filasEntradas['TipoDoc']; ?></td>
                                <?php  } ?>


                               
                                <td> <?= $row_entradas['Fecha']; ?></td>

                               
                                <!-- <td>
                                    <a class="btn btn-success me-2" href="../admin/editarInstitucion.php?id=<?php echo $row_entradas['Id']; ?>" class="btn btn-sm btn-warning"><i class="mdi mdi-eye"></i></a>
                                </td> -->
                                <td>
                                    <a class="btn btn-success me-2" href="../admin/detallesEntradas.php?id=<?php echo $row_entradas['DocEntrada'];  ?>"><i class="mdi mdi-eye"></i></a>
                                </td>
                                <!-- <td>
                                    <a class="btn btn-danger me-2" href=" #" onclick="agregarForm('<?php echo $datos; ?>');" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#eliminaModalInstitucion"><i class="mdi mdi-delete"></i></a>
                                </td> -->

                                <td>
                                    <!-- <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal"
                                        onclick="setChequeToDelete(<?= $row_entradas['Id']; ?>)">
                                        <i class="bi bi-trash-fill"></i> Eliminar
                                    </button> -->
                                </td>
                            </tr>


                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header bg-light border-0">
                <div class="d-flex align-items-center">
                    <div class="bg-danger text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                        <i class="bi bi-exclamation-triangle-fill fs-4"></i>
                    </div>
                    <h5 class="modal-title ms-3 fw-bold text-danger" id="deleteConfirmModalLabel">¿Eliminar Registro?</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mb-2 fs-6">Esta acción no se puede deshacer.</p>
                <p class="fw-semibold text-danger mb-0">¿Estás seguro de que deseas eliminar este cheque?</p>
            </div>
            <div class="modal-footer justify-content-center border-0 pb-4">
                <form id="deleteChequeForm" method="POST" action="../php/eliminar_decreto.php">
                    <input type="hidden" name="id_decreto" id="chequeIdToDelete">
                    <button type="button" class="btn btn-outline-secondary px-4 me-2" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i> Cancelar
                    </button>
                    <button type="submit" class="btn btn-danger px-4">
                        <i class="bi bi-trash me-1"></i> Sí, Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    $('#tablaEntrada').DataTable();
</script>


<script>
    // boton eliminar codigo del modal..

    // agregar datos al formulario
    function agregarForm(datos) {
        var d = datos.split('||');
        // alert("los datos son: "+d);
        // return false;
        $('#Id').val(d[0]);

    }
</script>
<script>
   function setChequeToDelete(id) {
                    document.getElementById('chequeIdToDelete').value = id;
                }
            </script>