<div class="row">
    <div class="col-lg-6 mb-2">
        <a href="../admin/nuevaInstitucion.php" class="btn btn-primary">AÑADIR</a>
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

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>EDITAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php while ($row_pacientes = $pacientes->fetch_assoc()) {  ?>

                            <tr>
                                <td> <?= $row_pacientes['Id']; ?></td>
                                <td> <?= $row_pacientes['Nombre']; ?></td>
                                <td>
                                    <a href="../admin/editarInstitucion.php?id=<?php echo $row_pacientes['Id'];  ?>" class="btn btn-sm btn-warning" ">EDITAR</a>
                                </td>
                                <td>
                                <a href=" #" onclick="alertarEliminar('<?php echo $row_pacientes['Id']; ?>');" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#eliminaModalusuario" data-bs-id_usuario="<?= $row_pacientes['Id'];   ?>">ELIMINAR</a>
                                </td>
                            </tr>


                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




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


    //aqui empieza la funcion eliminar
    function EliminarSala(id) {
        // alert("el id recibido es: "+id);  
        parametro = {
            "id": id
        }
        $.ajax({
            data: parametro,
            url: '../php/eliminarInstitucion.php',
            type: 'POST',
            beforeSend: function() {},
            success: function() {
                Swal.fire(
                    '¡Eliminado!',
                    'La carrera ha sido eliminado exitosamente',
                    'success'

                )
                // location.reload();            
            }

        })

    }


    // *********************
    function alertarEliminar(id) {
        // e.preventDefault();
        // alert("Estas seguro que quieres eliminar");
        var codigo = id;
        Swal.fire({
            title: '¿Realmente quieres eliminar esa Facultad?',
            text: "¡Esa Facultad será eliminada permanentemente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, Eliminar',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                EliminarSala(id);
            }
        })
    }
</script>