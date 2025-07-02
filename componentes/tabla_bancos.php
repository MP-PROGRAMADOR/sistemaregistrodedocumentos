<div class="row">
    <div class="col-lg-6 mb-2">
        <a href="../admin/nuevoBanco.php" class="btn btn-primary"><i class="mdi mdi-account-plus"></i></a>
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
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>EDITAR</th>
                            <!-- <th>ELIMINAR</th> -->
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
                                <td>
                                    <a href="../admin/editarBanco.php?id=<?php echo $row_pacientes['Id'];  ?>" class="btn btn-warning me-2">EDITAR</a>

                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmarEliminarModal" onclick="setIdEliminar(<?= $row_pacientes['Id']; ?>)">
                                        ELIMINAR
                                    </button>
                                </td>
                                <!-- <td>
                               
                                <a href="#" onclick="agregarForm('<?php echo $datos; ?>');" class="btn btn-danger me-2"  data-bs-toggle="modal" data-bs-target="#eliminaModalInstitucion"><i class="mdi mdi-archive"></i></a>
                                </td> -->
                            </tr>


                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Modal de Confirmación -->
<div class="modal fade" id="confirmarEliminarModal" tabindex="-1" aria-labelledby="confirmarEliminarModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="confirmarEliminarModalLabel">Confirmar Eliminación</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de que deseas eliminar este registro?
      </div>
      <div class="modal-footer">
        <form action="../php/eliminar_banco.php" method="POST">
          <input type="hidden" name="id_eliminar" id="idEliminar">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Sí, Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  function setIdEliminar(id) {
    document.getElementById('idEliminar').value = id;
  }
</script>






<script>
    $('#example').DataTable();
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